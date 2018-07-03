<?php

if(isset($_POST["acao"])) {

	include "classes/Usuario/Usuario.class.php";
	include "classes/Usuario/UsuarioDAO.class.php";
	//include "classes/Criptografia/Base64.class.php";

	//$criptografia = new criptografia();

	$login_usuario = $_POST["usuario"];
	$senha_usuario = $_POST["senha"];

	$usuario = new Usuario(null, $senha_usuario, $login_usuario, null, null , null);

	$dao = new DAO();

	if(($retorno = $dao->autenticar($usuario)) == null) {
		header("Location: index.php");
	} else {
		if ($retorno->TIPO_USUARIO == 1) {
			session_start();
			$_SESSION["id"] = session_id();
			$_SESSION["login"] = $retorno->LOGIN_USUARIO;
			$_SESSION["tipo_usuario"] = $retorno->TIPO_USUARIO;
			$_SESSION["ultimo_login"] = $retorno->ULTIMO_LOGIN;
			$_SESSION["cod_user"] = $retorno->COD_USUARIO;
			$_SESSION["datahora"] = date("H:i:s");
			header("Location: admin.php");	
		}else if ($retorno->TIPO_USUARIO == 2) {
			session_start();
			$_SESSION["id"] = session_id();
			$_SESSION["login"] = $retorno->LOGIN_USUARIO;
			$_SESSION["tipo_usuario"] = $retorno->TIPO_USUARIO;
			$_SESSION["ultimo_login"] = $retorno->ULTIMO_LOGIN;
			$_SESSION["cod_user"] = $retorno->COD_USUARIO;
			$_SESSION["datahora"] = date("H:i:s");
			header("Location: professor.php");	
		}
	}

}

?>