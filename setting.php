<?php
	require "db.php";
	$data = $_POST;
	$errors = array();
	$tok = $_SESSION['logged_user']->tok; 
	$sortok = substr($tok, 0,10);
	if (isset($data['do_login']))
	{	
		$us = $_SESSION['logged_user'];
		$user = R::findOne('users', $us->id);
		$user->login = $data['newlog'];
		R::store($user);
		$_SESSION['logged_user'] = $user;
	}
	if (isset($data['do_email']))
	{
		if( R::count('users','email = ?',array($data['newemail'])) > 0)
		{
			$errors = 'Пользователь с таким почтовым ящиком уже существует!';
			echo "<script>alert('Пользователь с таким почтовым ящиком уже существует!')</script>";
		}
		if( empty($errors))
		{
			$us = $_SESSION['logged_user'];
			$user = R::findOne('users', $us->id);
			$user->email = $data['newemail'];
			R::store($user);
			echo "<script>alert('Вы успешно сменили почту на)</script>";
		}
	}
	if (isset($data['do_pass']))
	{
		$us = $_SESSION['logged_user'];
		$user = R::findOne('users', $us->id);
		if( password_verify($data['oldpass'], $user->password))
		{	
			$user->password = password_hash($data['newpass'], PASSWORD_DEFAULT);
			R::store($user);
			unset($_SESSION['logged_user']);
			header('Location: /index.php');
		}
		else
		{
			echo "<script>alert('Старый пароль введен неверно!')</script>";
		}
	}
	if (isset($data['do_del'])){
		$us = $_SESSION['logged_user'];
		$user = R::findOne('users', $us->id);
		if( password_verify($data['checkpass'], $user->password)){
			$delete = R::load('users', $us->id);
			R::trash($delete);
			unset($_SESSION['logged_user']);
			header('Location: /index.php');
		}
		else
		{
			echo "<script>alert('Пароль введен неверно!')</script>";
		}
	}
	if (isset($data['do_token'])){
		$us = $_SESSION['logged_user'];
		$user = R::findOne('users', $us->id);
		$user->tok = $data['new_token'];
		R::store($user);
		echo "<script>alert('Ваш токен успешно обновлён')</script>";
		$_SESSION['logged_user'] = $user;
	}
?>


<title>SMMLife | Настройки</title>
<link rel="stylesheet" href="style.css">
<?php if( isset($_SESSION['logged_user'])): ?>
	<body>
		<div>
		<div class="leftpunkt">
			<a href="newindex.php" id="textologo">SMMLiFE</a>
			<div class="line"></div>
		<br>
		<div class="leftpunkttext">
			<a href="setting.php" class="testtext">Личный кабинет</a>
			<a href="newindex.php" class="testtext">Каталог</a>
		</div>
		<div class="line1"></div>
		<div class="leftpunkttext1">
			<li>
				<ul>
					<a href="calculate.php" class="testtext">Калькулятор ROI</a>
				</ul>
				<ul>
					<a href="pars.php" class="testtext">Парсер <br>подписчиков</a>
				</ul>
				<ul>
					<a href="short.php" class="testtext">Сокращатель</a>
				</ul>
				<ul>
					<a href="calcpodpis.php" class="testtext">Цена подписчика</a>
				</ul>
			</li>
		</div>
	</div>
	<div class="verhpunkt">
		<div class="verhtext">
			<a style="font-family: Roboto;font-size: 18px;">Логин: <?php echo $_SESSION['logged_user']->login;?><br>
			ID: <?php echo $_SESSION['logged_user']->id;?> </a>
		</div>
		<a href="logout.php" class="verhbutton">Выйти</a>
	</div>
		</div>
			<div class="barnas">
				<div class="upbarnas">
					<a class="settext">Настройки</a>
				</div>
				<div class="butreg">
					<button class="btnreg" onclick="openMenu1()">Сменить логин</button>
					<button class="btnreg" onclick="openMenu2()">Сменить почту</button></br>
					<button class="btnreg" onclick="openMenu3()">Сменить пароль</button>
					<button class="btnreg" onclick="openMenu4()">Удалить аккаунт</button>
					<button class="btnreg" onclick="openMenu5()">Добавить токен ВК</button>
					<button class="btnreg" onclick="openMenu6()">Информация</button>
				</div>
				<div class="forms">
					<form action="setting.php" method="POST" id="map1" onsubmit="return confirm('Вы уверены?');">
						<p><strong>Введите новый логин</strong>:</p>
						<input required type="text" name="newlog">
						<p><button type="submit" name="do_login">Изменить</button></p>
					</form>
					<form action="setting.php" method="POST" id="map2" onsubmit="return confirm('Вы уверены?');">
						<p><strong>Введите новую почту</strong>:</p>
						<input type="email" name="newemail">
						<p><button type="submit" name="do_email">Изменить</button></p>
					</form>
					<form action="setting.php" method="POST" id="map3" onsubmit="return confirm('Вы уверены?');">
						<p><strong>Введите старый пароль</strong>:</p>
						<input type="password" name="oldpass">
						<p><strong>Введите новый пароль</strong>:</p>
						<input type="password" name="newpass">
						<p><button type="submit" name="do_pass">Изменить</button></p>
					</form>
					<form action="setting.php" method="POST" id="map4" onsubmit="return confirm('Вы уверены?');">
						<p><strong>Удалить профиль</strong>:</p>
						<p><strong>Подтвердите пароль</strong>:</p>
						<input type="password" name="checkpass">
						<p><button type="submit" name="do_del">Удалить</button></p>
					</form>
					<form action="setting.php" method="POST" id="map5" onsubmit="return confirm('Вы уверены?');">
						<p><strong>Добавить токен ВК</strong>:</p>
						<a href="https://vkhost.github.io/" target="_blank">Получить токен</a></br></br>
						<input required type="text" name="new_token">
						<p><button type="submit" name="do_token">Сменить</button></p>
						<a>Текущий токен <?php echo $sortok ?></a>
					</form>
					<form id="map6">
						<p><strong>Информация об аккаунте</strong>:</p>
						<a>Логин - <?php echo $_SESSION['logged_user']->login; ?></a></br>
						<a>Почта - <?php echo $_SESSION['logged_user']->email; ?></a></br>
						<a>Номер сессии - <?php echo $_SESSION['logged_user']->id; ?></a></br>
						<a>Тип пользователя - <?php echo $_SESSION['logged_user']->permission; ?></a></br>
						<a>Текущий токен(первые 10) <?php echo $sortok ?></a>
					</form>
				</div>
			</div>
	    <script>
			function openMenu1(){
				document.getElementById("map1").style.display = "block";
				document.getElementById("map2").style.display = "none";
				document.getElementById("map3").style.display = "none";
				document.getElementById("map4").style.display = "none";
				document.getElementById("map5").style.display = "none";
				document.getElementById("map6").style.display = "none";
			}
			function openMenu2(){
				document.getElementById("map2").style.display = "block";
				document.getElementById("map1").style.display = "none";
				document.getElementById("map3").style.display = "none";
				document.getElementById("map4").style.display = "none";
				document.getElementById("map5").style.display = "none";
				document.getElementById("map6").style.display = "none";
			}
			function openMenu3(){
				document.getElementById("map3").style.display = "block";
				document.getElementById("map1").style.display = "none";
				document.getElementById("map2").style.display = "none";
				document.getElementById("map4").style.display = "none";
				document.getElementById("map5").style.display = "none";
				document.getElementById("map6").style.display = "none";
			}
			function openMenu4(){
				document.getElementById("map4").style.display = "block";
				document.getElementById("map1").style.display = "none";
				document.getElementById("map2").style.display = "none";
				document.getElementById("map3").style.display = "none";
				document.getElementById("map5").style.display = "none";
				document.getElementById("map6").style.display = "none";
			}
			function openMenu5(){
				document.getElementById("map5").style.display = "block";
				document.getElementById("map1").style.display = "none";
				document.getElementById("map2").style.display = "none";
				document.getElementById("map3").style.display = "none";
				document.getElementById("map4").style.display = "none";
				document.getElementById("map6").style.display = "none";
			}
			function openMenu6(){
				document.getElementById("map6").style.display = "block";
				document.getElementById("map1").style.display = "none";
				document.getElementById("map2").style.display = "none";
				document.getElementById("map3").style.display = "none";
				document.getElementById("map4").style.display = "none";
				document.getElementById("map5").style.display = "none";
			}
		</script>
	</body>
<?php else: ?>
	<h1>Ошибка!Необходимо <a href="index.php">войти или зарегистрироваться</a></h1>
	<a href="index.php">ПЕРЕЙТИ НА ГЛАВНУЮ</a>
<?php endif;?>