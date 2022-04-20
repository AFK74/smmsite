<?php
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>SMMLiFE</title>
	<link rel="stylesheet" href="style.css">
	<script src="jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="main.js"></script>
</head>
<?php if( isset($_SESSION['logged_user'])): ?>
<script>
	document.location.href="newindex.php"
</script>
<?php else: ?>
<body class="index">
	<h1>SMMLiFE</h1>
	<div id="titletext">
		<a>
			SMMLiFE - Надежный и функциональный сервис для маркетологов!
		</a>
	</div>
	<div id="logotext">
		<a>
			Автоматизируем неавтоматизируемое.
		</a>
	</div>
	<div id="auth">
		<button class="btn-login" onclick="openForm1()">ВХОД</button>
		<button class="btn-register" onclick="openForm2()">РЕГИСТРАЦИЯ</a>
	</div>
	<div class="form-popup" id="myForm">
		<form class="form" id="form" action="login.php" method="post">
			<input type="text" name="login" placeholder="Введите логин" value="<?php echo @$data['login']; ?>">
			<input type="password" placeholder="Введите пароль" name="password">
			<input id="autbut" type="submit" value="Войти">
		</form>
	</div>
	<div class="form-popup" id="myForm1">
		<form class="form" id="form" action="signup.php" method="post">
			<input required type="text" name="login" placeholder="Придумайте логин" value="<?php echo @$data['login']; ?>">
			<input required type="email" name="email" placeholder="Введите почту" value="<?php echo @$data['email']; ?>">
			<input required type="password" name="password" placeholder="Придумайте пароль" value="<?php echo @$data['password']; ?>">
			<input required type="password" name="password2" placeholder="Повторите пароль" value="<?php echo @$data['password2']; ?>">
			<input id="autbut" type="submit" value="Зарегистрироваться">
		</form>
	</div>
	<img id="anim_block" class="slideUp" src="img/phone.png">
	<script>
		function openForm1(){
			document.getElementById("myForm").style.display = "block";
			document.getElementById("myForm1").style.display = "none";
		}
		function closeForm1() {
			document.getElementById("myForm").style.display = "none";
		}
		function openForm2(){
			document.getElementById("myForm1").style.display = "block";
			document.getElementById("myForm").style.display = "none";
		}
		function closeForm2() {
			document.getElementById("myForm1").style.display = "none";
		}
	</script>
</html>
<?php endif;?>