<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Output registered but inactive users activation (i.e. activation_date is null) to csv File
 * in the output directory specified by out parameter
 * @param date: filter inactive users by date (default: today - 1)
 * @param out: output to directory
 */
class Task_Getinactiveusers extends Minion_Task
{
  protected $_options = array('date', 'out');

  protected function _execute(array $params)
  {
		// Set default dates
		$in_to   = new DateTime();
		$in_from = new DateTime(); 
		$in_from->modify('-1 day');
		if(isset($params['date']))
		{
			$in_to   = DateTime::createFromFormat('Y-m-d', $params['date']);
			$in_from = DateTime::createFromFormat('Y-m-d', $params['date'])->modify('-1 day');
		}

		$from = $in_from->format('Y-m-d 23:59:59');
		$to   = $in_to->format('Y-m-d 23:59:59');

		Minion_CLI::write("Date from:\t$from");
		Minion_CLI::write("Date to:\t$to");

    $users = ORM::factory('User')
      ->where('activation_date', '=', null)
			->where('registration_date', '>=', $from) 
			->where('registration_date', '<=', $to) 
      ->find_all();

    $cnt = $users->count();
    Minion_CLI::write("Found $cnt inactive user(s)");

    $date = new DateTime();
    $fname = rtrim($params['out'], '/\\') . DIRECTORY_SEPARATOR . 'inactive_users_' . $date->format('Ymd') . '.csv';
    Minion_CLI::write("Writing to $fname");

    $file = fopen($fname, 'w+');
    foreach($users->as_array() as $user)
    {
      fputcsv($file, array(
        $user->first_name, 
        $user->last_name,
        $user->patronymic,
        $user->birthday,
        $user->gender,
        $user->phone,
        $user->registration_date,
        $user->ip_address));
    }
    fclose($file);
    Minion_CLI::write('Done');
  }

  public function build_validation(Validation $validation)
  {
        return parent::build_validation($validation)
                ->rule('out', 'not_empty');
  }
}
?>
