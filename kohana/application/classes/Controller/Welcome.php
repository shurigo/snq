<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!');
	}

	public function action_login() {
		//$success = Auth::instance()->login($post['email'], $post['password']);
		$success = Auth::instance()->login('dummy', 'pwd');
		 
		if ($success)
		{
      echo('success');
		}
		else
		{
      echo('fail');
		}
	}

} // End Welcome
