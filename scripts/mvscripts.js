// MVSCRIPT Javascript File - Written by Chi Hieu Nguyen for Mvideo Source Code

function getController()
{
	var x = window.location.href;
	var y = x.split('/')

	$("#"+y[4]).addClass('active')
}

getController();