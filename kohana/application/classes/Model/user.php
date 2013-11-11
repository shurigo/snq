<?php
  class Model_User extends Model_Auth_User 
  {
		public function rules() 
		{
			$rules = parent::rules();
			unset($rules['username']);
			return $rules;
		}
	}
?>
