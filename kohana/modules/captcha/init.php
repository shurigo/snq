<?php defined('SYSPATH') OR die('No direct script access.');

if ( ! Route::cache())
{
	// Catch-all route for Captcha classes to run
	Route::set('captcha', 'captcha(/<group>)', array(
			'group' => '[\w]+',
		))
		->defaults(array(
			'controller' => 'Captcha',
			'action'     => 'index',
			'group'      => 'default',
		));
}