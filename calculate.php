<?php
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SMMLife | Калькулятор CPM</title>
	<link rel="stylesheet" href="style.css">
	<script src="calculate.js"></script>
</head>
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
	<div class="calc">
		<a id="loader"><img src="load.gif"></a>
		<form>
			<input type="number" id="potrac" value="" placeholder="Потрачено">
			<input type="number" id="dohod" value="" placeholder="Доходы">
			<input type="number" id="prosmotr" value="" placeholder="Просмотры">
			<input type="number" id="tranz" value="" placeholder="Транзакции">
			<input type="number" id="click" value="" placeholder="Клики">
		</form><br>
		<button id="butrascit" onclick="raschitat();">Рассчитать</button><br><br>
		<table>
			<tbody>
				<tr>
					<td class="aboutcol1">
						<div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="info-box">
			                    <span class="info-box-icon bg-yellow">ROI</span>
			                    <div class="info-box-content">
			                        <span class="info-box-text">Окупаемость инвестиций</span>
			                        <span class="info-box-number"><span id="roi"></span> %</span>
			                    </div>
			                </div>
			            </div>
			            <div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="info-box">
			                    <span class="info-box-icon bg-red">CTR</span>
			                    <div class="info-box-content">
			                        <span class="info-box-text">Из показов в клики</span>
			                        <span class="info-box-number"><span id="ctr"></span> %</span>
			                    </div>
			                </div>
			            </div>
			        </div>
					</td>
					<td class="aboutcol2">
						<div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="info-box">
			                    <span class="info-box-icon bg-green">CPM</span>
			                    <div class="info-box-content">
			                        <span class="info-box-text">Цена за 1000 показов</span>
			                        <span class="info-box-number"><span id="cpm"></span> &#8381</span>
			                    </div>
			                </div>
			            </div>
			            <div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="info-box">
			                    <span class="info-box-icon bg-green">CPC</span>
			                    <div class="info-box-content">
			                        <span class="info-box-text">Цена за 1 клик</span>
			                        <span class="info-box-number"><span id="cpc"></span> &#8381</span>
			                    </div>
			                </div>
			            </div>
			            <div class="col-lg-3 col-sm-6 col-xs-12">
		                	<div class="info-box">
		                    	<span class="info-box-icon bg-green">CPS</span>
		                    	<div class="info-box-content">
		                        	<span class="info-box-text">Цена за 1 транзакцию</span>
		                        	<span class="info-box-number"><span id="cps"></span> &#8381</span>
		                    	</div>
		                	</div>
		            	</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>