<?php
	require "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SMMLiFE | Главная</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
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
	<div class="containerblock">
		<a style="position: absolute; left: 35%; top: 50%; font-size: 64px; font-family: pusia-bold;">Скоро тут будет контент</a>
<!-- 		<div class="blocks1">
			<a href="pars.php"><img src="img/parse.png" style="width: 100%;"></a>
			<a href="pars.php" class="textblock">Парсер подписчиков ВК позволяет быстро собрать число участников</a>
			<a href="pars.php" class="blockbutton">Перейти</a>
		</div>
		<div class="blocks2">
			<a href="calc.php"><img src="img/parse.png" style="width: 100%;"></a>
			<a href="calc.php" class="textblock">Калькулятор ROI позволяет расчитать важные показатели результативности</a>
			<a href="calc.php" class="blockbutton">Перейти</a>
		</div>
		<div class="blocks3">
			<a href="pars.php"><img src="img/parse.png" style="width: 100%;"></a>
			<a href="pars.php" class="textblock">Массовый сокращатель ссылок на базе VK.CC</a>
			<a href="pars.php" class="blockbutton">Перейти</a>
		</div>
 -->	</div>
</body>
</html>