<?php

class Usuario {
 
	private $cod_usuario;
	private $senha_usuario;
	protected $login_usuario;
	public $status_usuario;
	public $tipo_usuario;
	public $ultimo_login;

	function __construct($cod_usuario="", $senha_usuario="", $login_usuario="", $status_usuario="", $tipo_usuario="", $ultimo_login="") {

		$this->COD_USUARIO= $cod_usuario;
		$this->SENHA_USUARIO = $senha_usuario;
		$this->LOGIN_USUARIO = $login_usuario;
		$this->STATUS_USUARIO = $status_usuario;
		$this->TIPO_USUARIO = $tipo_usuario;
		$this->ULTIMO_LOGIN = $ultimo_login;					
		// md5() faz a criptografia de dados

	}

	function __set($prop, $val) {
		$this->$prop = $val;
	}

	function __get($prop) {
		return $this->$prop;
	}
	
	function __toString() {
		return "O usuário ".
			   $this->LOGIN_USUARIO." logado. Ultimo login em ".$this->ULTIMO_LOGIN; 
	}
	
}
	

?>