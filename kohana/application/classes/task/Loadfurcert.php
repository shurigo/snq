<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @param in: csv to read fur certificate data from
 */
class Task_UpdateFurCert extends Minion_Task
{
	const CERT_FIELD = 0;
	const NAME_FIELD = 1;
	const CARD_NO = 2;
	const ISSUE_DATE = 3;

  protected $_options = array('in');

  protected function _execute(array $params)
	{
		Minion_CLI::write('Loading fur certificates...');

		// Check if csv file exists
		$file = fopen($params['in'], 'r');
		if(!file_exists($params['in']))
		{
			Minion_CLI::write('ERROR: Missing input file: '.$params['in']);
			die();
		}

		// Read csv file line by line
		while(($csv_cert = fgetcsv($file)) !== FALSE)
		{
			// Skip if exists
			$db_cert = ORM::factory('FurCert')->where('cert', '=', $csv_cert[CERT_FIELD])->find();
			if(!$db_cert->loaded())
			{
				Minion_CLI::write('Certificate already exists: '.$csv_cert[CERT_FIELD]);
				continue;
			}

			// Write to dbs
			$update_fields = array();
			if(is_numeric($csv_cert->cert))
			{
				$db_cert->cert = $csv_cert[CERT_FIELD];
				$update_fields['cert'] = $db_cert->cert;
			}

			// name
			if($csv_cert[NAME_FIELD])
			{
				$db_cert->name = $csv_cert[NAME_FIELD];
				$update_fields['name'] = $db_cert->name;
			}

			// card_no
			if(is_numeric($csv_cert[CARD_NO]))
			{
				$db_cert->card_no = $csv_cert[CARD_NO];
				$update_fields['card_no'] = $db_cert->card_no;
			}

			// issue_date
			if($csv_cert[ISSUE_DATE])
			{
				$db_cert->issue_date = $csv_cert[ISSUE_DATE];
				$update_fields['activation_date'] = $db_cert->issue_date;
			}
			else
			{
				$db_cert->issue_date = date(Date::$timestamp_format);
			}
			$db_cert->save();
			
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
