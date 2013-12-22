<?php defined('SYSPATH') or die('No direct script access.');
class Controller_User extends Controller_Template {

	public function action_index()
	{
		$this->template->content = View::factory('user/info')
			->bind('errors', $errors)
			->bind('message', $message)
			->bind('user', $user)
			->bind('dto', $dto)
			->bind('dto_0', $dto_0)
			->bind('dto_1', $dto_1)
			->bind('deliver_to', $deliver_to);
		// Load the user information
		$user = Auth::instance()->get_user();

		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}

		if (HTTP_Request::POST == $this->request->method())
		{
				//error_log(print_r($_POST, true),0);
			$dto = Arr::get($_POST, 'dto');
			$dto_0 = Arr::get($_POST, 'dto_0');
			$dto_1 = Arr::get($_POST, 'dto_1');
			$deliver_to = Arr::get($_POST, 'deliver_to');
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
					'password'
				));
				//$_POST = array(); // Reset values so form is not sticky
				$message = "Данные сохранены";
				if ($user)
				{
					Request::current()->redirect('user/index');
				}
				else
				{
					$message = 'Неправильный логин/пароль';
				}
			}
			catch (ORM_Validation_Exception $e)
			{
				// Set failure message
				$message = 'Ошибки при сохранении данных';

				// Set errors using custom messages
				$errors = $e->errors('models');
			}
		}
	}

	public function action_create()
	{
		$captcha = Captcha::instance();
		$this->template->content = View::factory('user/create')
			->bind('captcha', $captcha)
			->bind('errors', $errors)
			->bind('message', $message);

		if (HTTP_Request::POST == $this->request->method())
		{
			try
			{
				if(!Captcha::valid($_POST['captcha'])) {
					$errors['captcha'] = 'Введите правильный код с картинки';
					return;
				}
				error_log(print_r($_POST, true),0);
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
						'password',
						'email'));

				// Grant user login role
				$user->add('roles', ORM::factory('Role', array('name' => 'login')));

				// Reset values so form is not sticky
				$_POST = array();
				Session::instance()->delete('captcha');

				// Set success message
				$message = "Регистрация прошла успешно";

				$this->action_login();
			}
			catch (ORM_Validation_Exception $e)
			{
				// Set failure message
				$message = 'Ошибки при регистрации';

				// Set errors using custom messages
				$errors = $e->errors('models');
			}
		}
	}

	public function action_login()
	{
		$this->template->content = View::factory('user/login')
			->bind('message', $message);

		global $user;
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

		// If successful, redirect user
		if ($user)
		{
			Request::current()->redirect('user/index');
		}
		else
		{
			$message = 'Неправильный логин/пароль';
		}
	}

	public function action_logout()
	{
		// Log user out
		Auth::instance()->logout();

		// Redirect to login page
		Request::current()->redirect('user/login');
	}

	public function action_resetpassword()
	{
		$this->template->content = View::factory('user/password')
			->bind('message', $message);
		if (HTTP_Request::POST != $this->request->method())
		{
			return;
		}
		$user = ORM::factory('user')
			->where('username', '=', $this->request->post('username'))
			->where('email', '=', $this->request->post('email'))
			->find();
    if(!$user->loaded())
		{
      $message = 'Пользователь не найден';
      return;
		}
    $password_reset = $this->reset_password($user);
    if($password_reset === TRUE)
		{
      $message = 'Письмо с инструкциями по сбросу пароля отправлено на указанный email адрес';
		}
		else
		{
			$errors = $password_reset;
		}
	}
}
