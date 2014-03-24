<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param in: csv to read user data from
 */
const EMAIL_FIELD = 0;
const CARD_NO_FIELD = 1;
const AMOUNT_FIELD = 2;

class Task_UpdateUsers extends Minion_Task
{
  protected $_options = array('in');

  protected function _execute(array $params)
	{
		$file = fopen($params['in'], 'r');
		while(($user = fgetcsv($file)) !== FALSE)
		{
			$db_user = ORM::factory('User')->where('email', '=', $user[EMAIL_FIELD])->find();
			if(!$db_user->loaded())
			{
				Minion_CLI::write('User not found: '.$user[EMAIL_FIELD]);
				continue;
			}
			$update_fields = array();
			if(!$db_user->activation_date)
			{
				$db_user->activation_date = date(Date::$timestamp_format);
				$update_fields['activation_date'] = $db_user->activation_date;
			}
			if(is_numeric($user[CARD_NO_FIELD]))
			{
				$db_user->card_no = $user[CARD_NO_FIELD];
				$update_fields['card_no'] = $db_user->card_no;
			}
			if(is_numeric($user[AMOUNT_FIELD]))
			{
				$db_user->card_balance = $user[AMOUNT_FIELD];
				$update_fields['card_balance'] = $user[AMOUNT_FIELD];
			}
			$db_user->update();
			print_r($update_fields);
		}
    fclose($file);

    $date = new DateTime();
  }

  public function build_validation(Validation $validation)
  {
        return parent::build_validation($validation)
                ->rule('in', 'not_empty');
  }
}
?>
