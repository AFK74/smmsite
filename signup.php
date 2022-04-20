<?php
	require "db.php";

	$data = $_POST;
	
	$errors = array();
	if( trim($data['login']) == '')
	{
		$errors = 'Введите логин!';
	}

	if( trim($data['email']) == '')
	{
		$errors = 'Введите почту!';
	}

	
	if( $data['password'] == '')
	{
		$errors = 'Введите пароль!';
	}

	if( $data['password2'] != $data['password'] )
	{
		$errors = 'Повторный пароль введен неверно!';
		echo "<script>alert('Повторный пароль введен неверно!')</script>";
	}

	if( R::count('users','login = ?',array($data['login'])) > 0)
	{
		$errors = 'Пользователь с таким логином уже существует!';
		echo "Пользователь с таким логином уже существует!";
	}

	if( R::count('users','email = ?',array($data['email'])) > 0)
	{
		$errors = 'Пользователь с таким почтовым ящиком уже существует!';
		echo "<script>alert('Пользователь с таким почтовым ящиком уже существует!')</script>";
	}

	if( empty($errors))
	{
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);
		echo "<script>alert('Вы успешно зарегистрировались!')</script>";
	}
?>