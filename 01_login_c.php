$("login_enviar").onclick=function()
{
	var resp = ModelCall("01_login", "login_form", "text");
	alert(resp);
	
	if(resp=="USER_OK")
	{
		Cambio();
		GetModule('02_header','header');
		GetModule('03_nav','nav');
		GetModule('04_main','main');
		GetModule('12_footer','footer');
	}
	else
	{
		//$("login_msg").innerHTML="Usuario y password erroneo");
		//setTimeout("$('login_msg').innerHTML=''",3000);
	}
	//$("header").innerHTML=resp;
	return false;
}

$("registro").onclick=function()
{
		
	GetModule('06_register','main');
		
	return false;
}
