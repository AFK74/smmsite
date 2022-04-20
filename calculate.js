function raschitat() {
	document.getElementById("loader").style.display = "block";
	setTimeout(function(){
	var potrac = document.getElementById('potrac').value;
	var prosmotr = document.getElementById('prosmotr').value;
	var click = document.getElementById('click').value;
	var dohod = document.getElementById('dohod').value;
	var tranz = document.getElementById('tranz').value;
	var cpm = potrac/prosmotr*1000;
	var cpc = potrac/click;
	var roi = (dohod-potrac)/potrac*100;
	var ctr = click/prosmotr*100;
	var cps = potrac/tranz;
	document.getElementById("loader").style.display = "none";
	document.getElementById("cpm").innerHTML=cpm.toFixed(2);
	document.getElementById("cpc").innerHTML=cpc.toFixed(2);
	document.getElementById("ctr").innerHTML=ctr.toFixed(2);
	document.getElementById("roi").innerHTML=roi.toFixed(2);
	document.getElementById("cps").innerHTML=cps.toFixed(2);
	},3000);
}