
$("modelo_button").onclick=function()
{
	var resp = ModelCall("05_modeloformp", "modelo", "text");
	//alert(resp);
	$("secret").innerHTML="Resultado <h3>"+resp+"</h3>";
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
