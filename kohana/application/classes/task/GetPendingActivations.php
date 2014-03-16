<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Output registered but inactive users activation (i.e. activation_date is null) to csv File
 * in the output directory specified by out parameter
 * @param out: output to directory
 */
class Task_GetPendingActivations extends Minion_Task
{
  protected $_options = array('out');

  protected function _execute(array $params)
  {
    $users = ORM::factory('User')
      ->where('activation_date', '=', null)
      ->find_all();

    $cnt = $users->count();
    Minion_CLI::write("Found $cnt inactive users");

    $date = new DateTime();
    $fname = rtrim($params['out'], '/\\') . DIRECTORY_SEPARATOR . 'inactive_users_' . $date->format('Ymd_His') . '.csv';
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
