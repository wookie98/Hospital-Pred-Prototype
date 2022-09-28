$("modelo_button").onclick=function()
{
	var resp = ModelCall("05_modeloform", "modelo", "text");
	alert(resp);
	
	/*if(resp=="USER_OK")
	{
		Cambio();
		GetModule('02_header','header');
		GetModule('03_nav','nav');
		GetModule('04_main','main');
	}
	else
	{
		//$("login_msg").innerHTML="Usuario y password erroneo");
		//setTimeout("$('login_msg').innerHTML=''",3000);
	}
	//$("header").innerHTML=resp;*/
	return false;
}
