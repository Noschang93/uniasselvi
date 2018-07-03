<?php
	session_start();

	include "classes/Usuario/UsuarioDAO.class.php";
  	$Udao = new DAO();

	$Udao->salvarUltimoLogin($_POST['cod_user']) ; 

	session_destroy();
	header("Location: index.php");
?>