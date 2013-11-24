<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Outputs the dynamic Captcha resource.
 * Usage: Call the Captcha controller from a view, e.g.
 *        <img src="<?php echo URL::site('captcha') ?>" />
 *
 * @package		Captcha
 * @subpackage	Controller_Captcha
 * @author		WinterSilence
 * @author		Michael Lavers
 * @author		Kohana Team
 * @copyright	(c) 2008-2013 Kohana Team
 * @license		http://kohanaphp.com/license.html
 */
class Controller_Captcha extends Controller
{
	/**
	 * Output the Captcha challenge resource (no html)
	 * Pull the config group name from the URL
	 * 
	 * @return void
	 */
	public function action_index()
	{
		Captcha::instance($this->request->param('group'))->render(FALSE, $this->request);
	}

	/**
	 * Automatically executed after the controller action. Can be used to apply
	 * transformation to the response, add extra output, and execute other custom code.
	 * 
	 * @return  void
	 */
	public function after()
	{
		Captcha::instance()->update_response_session();
	}

} // End Captcha_Controller