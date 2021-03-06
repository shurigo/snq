<?php
  class Model_User extends Model_Auth_User
  {
		public function is_active() 
		{
			return $this->activation_date != null && 
						 $this->card_no > 0;
		}

		public function rules()
		{
			$rules = parent::rules();
			unset($rules['username']);
			$rules['first_name'] = array(
				array('not_empty'),
				array('min_length', array(':value', 2)),
				array('max_length', array(':value', 50))
			);
			$rules['last_name'] = array(
				array('not_empty'),
				array('min_length', array(':value', 2)),
				array('max_length', array(':value', 50))
			);
			$rules['patronymic'] = array(
				array('not_empty'),
				array('min_length', array(':value', 2)),
				array('max_length', array(':value', 50))
			);
			$rules['gender'] = array(
				array('not_empty'),
				array('regex', array(':value', '/^[FM]$/')),
			);
			$rules['birthday'] = array(
				array('not_empty'),
				array('date')
			);
			$rules['phone'] = array(
				array('not_empty'),
				//array('phone'),
				array('min_length', array(':value', 10)),
				array('max_length', array(':value', 14)),
			);
			return $rules;
		}
	}
?>
