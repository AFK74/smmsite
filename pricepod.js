function raschitat() {
		var ztarget = parseInt(document.getElementById('ztarget').value);
		var zprizy = parseInt(document.getElementById('zprizy').value);
		var prrashody = parseInt(document.getElementById('prrashody').value);
		var prirost = parseInt(document.getElementById('prirost').value);
		var zatraty = ztarget+zprizy+prrashody;
		var itogo = zatraty/prirost;
		document.getElementById("zatraty").innerHTML=zatraty.toFixed(2);
		document.getElementById("itogo").innerHTML=itogo.toFixed(2);
}