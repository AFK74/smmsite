<?php
require "db.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SMMLife</title>
	<link rel="stylesheet" href="style.css">
	<script src="jquery-3.5.1.min.js"></script>
</head>
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
	<div class="content">
		<button id="start" onclick="loadinfo()">Спарсить</button>
		<a>Введите сообщества через ','</a>
		<div class="textareas">
			<input type="text" id="cit">
			<textarea id="int" rows="20" cols="80" maxlength="2000"></textarea>
			<textarea id="out" rows="20" cols="80" maxlength="2000" placeholder="Результат"></textarea>
		</div>
	</div>
<script>
	function loadinfo(){
		var count = $('#int').val();
		sendRequest('groups.getMembers',{group_id: count, fields: 'city'}, function(data){
			console.log(data);
			drawList(data.response['city']);
			alert('Готово');
		});
	}

	function getUrl(method, params){
		if (!method) throw new Error('Не указан метод');
		params = params || {};
		params['access_token'] = "<?php echo $_SESSION['logged_user']->tok;?>";

		return 'https://api.vk.com/method/' + method +'?'+ $.param(params)+'&v=5.21';
	}
	function sendRequest(method, params, func){
		$.ajax({
		url: getUrl(method, params),
		method: 'GET',
		dataType: 'JSONP',
		success: func
	});
	}
	
	function drawList(list){
		var html = '';

		for (var i = 0; i < list.length; i++){
			var l = list[i];

			html += l.city +' - Подписчиков: ' + l.count+'\n';
		}

		$('#out').html(html);
	}
</script>
</body>
<?php else:?>
	<h1>Ошибка!Необходимо <a href="index.php">войти или зарегистрироваться</a></h1>
	<a href="index.php">ПЕРЕЙТИ НА ГЛАВНУЮ</a>
<?php endif;?>
</html>