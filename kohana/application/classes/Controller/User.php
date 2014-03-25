<?php defined('SYSPATH') or die('No direct script access.');
class Controller_User extends Controller_Template 
{
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
		if ($user->where('id', '=', $user->id)->count_all() <= 0)
		{
			$this->action_logout();
		}
		if (!$user->is_active())
		{
			$message = 
				((int)((string)$user->logins)) < 2
				? 'Ваша заявка на получения карты "Королевский Клуб" создана. Обратитесь в ближайший магазин для оформления дисконтной карты. После активации карты Вам станет доступен вход в личный кабинет.'
				: $message = 'Ваша карта еще не активирована или информация об активации еще не передана на сайт.';
		}
		if (HTTP_Request::POST != $this->request->method())
		{
			return;
		}
		$_POST['subscribe_sms'] = array_key_exists('subscribe_sms', $_POST) ? 1 : 0;
		$_POST['subscribe_email'] = array_key_exists('subscribe_email', $_POST) ? 1 : 0;
		try
		{
			$extra_props = array(
				'ip_address' => Request::$client_ip,
				'city_name' => iconv('cp1251', 'utf-8', $_SESSION['city_name'])
			);

			$user->update_user(
				array_merge($_POST, $extra_props),
				array(
					'first_name',
					'last_name',
					'patronymic',
					'gender',
					'birthday',
					'phone',
					'city_name',
					'subscribe_sms',
					'subscribe_email',
					'password',
					'ip_address'));
			$_POST = array(); // Reset values so form is not sticky
			$message = "Данные сохранены";
			if ($user)
			{
				Request::current()->redirect('user/index');
			}
			else
			{
				$message = 'Не удалось сохранить данные';
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
			if (!Captcha::valid($_POST['captcha'])) 
			{
				$errors['captcha'] = 'Введите правильный код с картинки';
				$message = 'Ошибки при регистрации';
				return;
			}

			$extra_props = array(
				'ip_address' => Request::$client_ip,
				'registration_date' => date(Date::$timestamp_format),
				'city_name' => iconv('cp1251', 'utf-8', $_SESSION['city_name'])
			);

			$user = ORM::factory('User')
				->create_user(
					array_merge($_POST, $extra_props), 
					array(
						'first_name',
						'last_name',
						'patronymic',
						'gender',
						'birthday',
						'phone',
						'subscribe_sms',
						'subscribe_email',
						'password',
						'email',
						'ip_address',
						'registration_date',
						'city_name'));
			//$_POST = array(); // Reset values so form is not sticky
			// Grant user login role
			$user->add('roles', ORM::factory('Role', array('name' => 'login')));

			Session::instance()->delete('captcha');

			// Set success message
			$message = "Регистрация прошла успешно";

			//$msg_body = file_get_contents('media/templates/new_user.txt');
			$msg_body = 'Добро пожаловать в Королевский Клуб';
			if(!mail($user->email, 'Королевский Клуб!', $msg_body))
			{
				$errors['email'] = 'Ошибка отправки email';
			}

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

	public function action_login()
	{
		$this->template->content = View::factory('user/login')
			->bind('message', $message);

		$user = Auth::instance()->get_user();
		if($user)
		{
			$this->action_index();
			return;
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

		$_POST = array();
		// If successful, redirect user
		if ($user)
		{
			$this->action_index();
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

	public function action_resetpwd()
	{
		$this->template->content = View::factory('user/resetpwd')
			->bind('message', $message);
		if(HTTP_Request::POST != $this->request->method())
		{
			return;
		}
		$user = ORM::factory('User')
			->where('email', '=', HTML::chars($this->request->post('email')))
			->find();
		$_POST = array();
    if(!$user->loaded())
		{
      $message = 'Пользователь не найден';
      return;
		}
    $password_reset = $this->reset_password($user);
    if($password_reset === true)
		{
      $message = 'Новый пароль отправлен на указанный email адрес';
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
			$msg_body = 'Ваш новый пароль: {@PASSWORD}';
			$msg_body = str_replace('{@PASSWORD}', $update['password'], $msg_body);

			if(!mail($user->email, 'Новый пароль', $msg_body))
			{
				$errors['email'] = 'Ошибка отправки email';
			}
		}
		catch (ORM_Validation_Exception $e)
		{
			$errors = $e->errors('controllers');
		}
		return (isset($errors)) ? $errors : TRUE;
	}
}
