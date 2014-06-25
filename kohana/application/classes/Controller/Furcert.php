<?php defined('SYSPATH') or die('No direct script access.');
class Controller_FurCert extends Controller_Template
{
	public function action_index()
	{
		// Bind the variables to the view
		$title = 'Проверка сертификата';
		$captcha = Captcha::instance();
		View::set_global('show_header', true);
		View::set_global('title', $title);
    $this->template->content = View::factory('fur_cert/info')
			->bind('errors', $errors)
			->bind('message', $message)
			->bind('captcha', $captcha)
			->bind('fur_cert', $fur_cert);

	  if(HTTP_Request::POST != $this->request->method())
		{
			return;
		}

		if(array_key_exists('index', $this->request->post()))
		{
			return;
		}

    try
		{
			// Validate captcha
			if(!Captcha::valid($_POST['captcha'])) 
			{
				$errors['captcha'] = 'Введите правильный код с картинки';
				$message = 'Ошибки при проверке сертификата';
				return;
			}

			$fur_cert = ORM::factory('FurCert')
				->where('cert', '=', HTML::chars($this->request->post('cert')))
				->find();

			$_POST = array();
			if(!$fur_cert->loaded())
			{
				$message = 'Cертификат не найден';
				return;
			}
			else
			{
				View::set_global('show_header', false);
			}
		}
		catch (ORM_Validation_Exception $e)
		{
			// Set failure message
			$message = 'Ошибки при проверке сертификата';

			// Set errors using custom messages
			$errors = $e->errors('models');
		}
	}
}
