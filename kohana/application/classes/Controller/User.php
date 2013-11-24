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

		if (HTTP_Request::POST == $this->request->method()) 
		{			
			try 
			{
				$user->update_user($_POST, array(
					'first_name',
					'last_name',
					'patronymic',
					'birthday',
					'phone',
					'password'
				));
				$_POST = array(); // Reset values so form is not sticky
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
				$user = ORM::factory('user')
					->create_user($_POST, array(
						'first_name',
						'last_name',
						'patronymic',
						'birthday',
						'phone',
						'password',
						'email'));

				// Grant user login role
				$user->add('roles', ORM::factory('Role', array('name' => 'login')));
				
				// Reset values so form is not sticky
				$_POST = array();
				Session::instance()->delete('captcha');
				
				// Set success message
				$message = "Вы зарегистрировались как '{$user->email}'";
				
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
			
		if (HTTP_Request::POST == $this->request->method()) 
		{
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
	}
	
	public function action_logout() 
	{
		// Log user out
		Auth::instance()->logout();
		
		// Redirect to login page
		Request::current()->redirect('user/login');
	}

}
