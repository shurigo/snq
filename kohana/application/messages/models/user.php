<?php

return array(
	'email' => array(
		'not_empty' => 'Введите адрес email',
		'min_length' => 'Адрес email слишком короткий, должен быть не менее :param2 символов',
		'max_length' => 'Адрес email слишком длинный, не должен превышать :param2 символов',
		'email' =>	'Пожалуйста, введите правильный адрес email',
		'email_available' => 'Этот адрес email уже зарегистрирован',
		'unique' => 'Этот адрес email уже зарегистрирован',
	),
	'first_name' => array(
		'not_empty' => 'Пожалуйста, введите имя',
		'min_length' => 'Имя должно быть не менее :param2 символов',
    'max_length' => 'Имя не должно превышать :param2 символов'
	),
	'last_name' => array(
		'not_empty' => 'Пожалуйста, введите фамилию',
		'min_length' => 'Фамилия должна быть не менее :param2 символов',
    'max_length' => 'Фамилия не должна превышать :param2 символов'
	),
	'patronymic' => array(
		'not_empty' => 'Пожалуйста, введите отчество',
		'min_length' => 'Отчество должно быть не менее :param2 символов',
    'max_length' => 'Отчество не должно превышать :param2 символов'
	),
	'birthday' => array(
		'not_empty' => 'Пожалуйста, введите дату рождения',
		'date' => 'Неправильный формат даты'
	),
	'phone' => array(
		'not_empty' => 'Пожалуйста, введите номер телефона',
		'phone' => 'Пожалуйста, введите правильный номер телефона',
		'min_length' => 'Пожалуйста, введите :param2 цифр номера телефона',
	),
);
