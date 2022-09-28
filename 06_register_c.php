$("register_enviar").onclick=function()
{
	var isValidForm = document.forms['register_form'].checkValidity();
    if (isValidForm)
    {
	var resp = ModelCall("06_register", "register_form", "text");
	alert(resp);
	
	if(resp=="USER_OK")
	{
		Cambio();
		GetModule('02_header','header');
		GetModule('03_nav','nav');
		GetModule('04_main','main');
		GetModule('12_footer','footer');
	}
	}
	else
	{
		//$("login_msg").innerHTML="Usuario y password erroneo");
		//setTimeout("$('login_msg').innerHTML=''",3000);
		alert("rellene todos los campos");
	}
	//$("header").innerHTML=resp;
	return false;
}

