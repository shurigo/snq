<?php defined('SYSPATH') or die('No direct script access.');
class Controller_User extends Controller_Template {

	public function action_index()
	{
		$this->template->content = View::factory('user/info')
			->bind('errors', $errors)
			->bind('message', $message)
			->bind('user', $user);
		// Load the user information
		$user = Auth::instance()->get_user();

		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}

		if (HTTP_Request::POST != $this->request->method())
		{
			return;
		}
		$_POST['subscribe_sms'] = array_key_exists('subscribe_sms', $_POST) ? 1 : 0;
		$_POST['subscribe_email'] = array_key_exists('subscribe_email', $_POST) ? 1 : 0;
		try
		{
			$user->update_user($_POST, array(
				'first_name',
				'last_name',
				'patronymic',
				'birthday',
				'phone',
				'subscribe_sms',
				'subscribe_email',
				'deliver_to',
				'deliver_to_shop',
				'deliver_to_address',
				'password'
			));
			$_POST = array(); // Reset values so form is not sticky
			$message = "������ ���������";
			if ($user)
			{
				Request::current()->redirect('user/index');
			}
			else
			{
				$message = '������������ �����/������';
			}
		}
		catch (ORM_Validation_Exception $e)
		{
			// Set failure message
			$message = '������ ��� ���������� ������';

			// Set errors using custom messages
			$errors = $e->errors('models');
		}
	}

	public function action_create()
	{
		$captcha = Captcha::instance();
		$this->template->content = View::factory('user/create')
			->bind('captcha', $captcha)
			->bind('errors', $errors)
			->bind('message', $message);

		if (HTTP_Request::POST != $this->request->method())
		{
			return;
		}
		try
		{
			if (!Captcha::valid($_POST['captcha'])) {
				$errors['captcha'] = '������� ���������� ��� � ��������';
				$message = '������ ��� �����������';
				return;
			}
			$_POST['subscribe_sms'] = array_key_exists('subscribe_sms', $_POST) ? 1 : 0;
			$_POST['subscribe_email'] = array_key_exists('subscribe_email', $_POST) ? 1 : 0;
			$user = ORM::factory('user')
				->create_user($_POST, array(
					'first_name',
					'last_name',
					'patronymic',
					'birthday',
					'phone',
					'subscribe_sms',
					'subscribe_email',
					'deliver_to',
					'deliver_to_shop',
					'deliver_to_address',
					'password',
					'email'));

			// Grant user login role
			$user->add('roles', ORM::factory('Role', array('name' => 'login')));

			// Reset values so form is not sticky
			$_POST = array();
			Session::instance()->delete('captcha');

			// Set success message
			$message = "����������� ������ �������";

			//$this->action_login();
		}
		catch (ORM_Validation_Exception $e)
		{
			// Set failure message
			$message = '������ ��� �����������';

			// Set errors using custom messages
			$errors = $e->errors('models');
		}
	}

	public function action_login()
	{
		$this->template->content = View::factory('user/login')
			->bind('message', $message);

		$user = Auth::instance()->get_user();
		if($user)
		{
			Request::current()->redirect('user/index');
		}
		if (HTTP_Request::POST != $this->request->method())
		{
			return;
		}

		if ($this->request->post('create'))
		{
			Request::current()->redirect('user/create');
		}

		// Attempt to login user
		$remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
		$user = Auth::instance()->login($this->request->post('email'), $this->request->post('password'), $remember);

		error_log('p1', 0);
		// If successful, redirect user
		if ($user)
		{
			error_log('p2',0);
			Request::current()->redirect('user/index');
		}
		else
		{
			$message = '������������ �����/������';
		}
	}

	public function action_logout()
	{
		// Log user out
		Auth::instance()->logout();

		// Redirect to login page
		Request::current()->redirect('user/login');
	}

	public function action_resetpwd()
	{
		$this->template->content = View::factory('user/resetpwd')
			->bind('message', $message);
		if(HTTP_Request::POST != $this->request->method())
		{
			return;
		}
		$user = ORM::factory('user')
			->where('email', '=', HTML::chars($this->request->post('email')))
			->find();
		$_POST = array();
    if(!$user->loaded())
		{
      $message = '������������ �� ������';
      return;
		}
    $password_reset = $this->reset_password($user);
    if($password_reset === true)
		{
      $message = '������ � ������������ �� ������ ������ ���������� �� ��������� email �����';
		}
		else
		{
			$errors = $password_reset;
		}
	}

	public function reset_password($user)
	{
		$update['email']    = $user->email;
		$update['password'] = substr(uniqid(), 0, 8);

		try
		{
			$user->password = $update['password'];
			$user->update();
		 
			//$msg_body = file_get_contents('media/templates/forgot_password.txt');
			$msg_body = '��� ����� ������: {@PASSWORD}';
			$msg_body = str_replace('{@PASSWORD}', $update['password'], $msg_body);

			if(!mail($user->email, '����� ������', $msg_body))
			{
				$errors['email'] = '������ �������� email';
			}
		}
		catch (ORM_Validation_Exception $e)
		{
			$errors = $e->errors('controllers');
		}
		return (isset($errors)) ? $errors : TRUE;
	}
}
