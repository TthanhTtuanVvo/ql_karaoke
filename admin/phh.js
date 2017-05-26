function $(id) {
	return document.getElementById(id);
}
// AJAX INIT
function khoitao_ajax()
{
	var x;
	try 
	{
		x	=	new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
    	try 
		{
			x	=	new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(f) { x	=	null; }
  	}
	if	((!x)&&(typeof XMLHttpRequest!="undefined"))
	{
		x=new XMLHttpRequest();
  	}
	return  x;
}
//	Sieu thi dia oc function
function	Forward(url)
{
	window.location.href = url;
}
function	_postback()
{
	return void(1);
}