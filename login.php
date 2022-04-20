<?php
	require "db.php";

	$data = $_POST;

	$errors = '';
	$user = R::findOne('users','login = ?',array($data['login']));
	if( $user)
	{
		if( password_verify($data['password'], $user->password))
		{
			$_SESSION['logged_user'] = $user;
			exit('main');
		} else
		{
			echo "Ввёден неверный пароль!";
		}
	} else
	{
		echo "Ввёден неверный логин!";
	}
?>