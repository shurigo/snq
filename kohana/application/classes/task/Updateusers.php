<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param in: csv to read user data from
 */
class Task_UpdateUsers extends Minion_Task
{
	const EMAIL_FIELD = 0;
	const CARD_NO_FIELD = 1;
	const AMOUNT_FIELD = 2;

  protected $_options = array('in');

  protected function _execute(array $params)
	{
		Minion_CLI::write('Updating users...');

		$file = fopen($params['in'], 'r');
		if(!file_exists($params['in']))
		{
			Minion_CLI::write('ERROR: Missing input file: '.$params['in']);
			die();
		}

		while(($user = fgetcsv($file)) !== FALSE)
		{
			$db_user = ORM::factory('User')->where('email', '=', $user[EMAIL_FIELD])->find();
			if(!$db_user->loaded())
			{
				Minion_CLI::write('User not found: '.$user[EMAIL_FIELD]);
				continue;
			}
			Minion_CLI::write('Updating user: '.$db_user->email);
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
			Minion_CLI::write('Updated fields:');
			Minion_CLI::write(($update_fields);
		}
    fclose($file);
		Minion_CLI::write('Done');
  }

  public function build_validation(Validation $validation)
  {
        return parent::build_validation($validation)
                ->rule('in', 'not_empty');
  }
}
?>
