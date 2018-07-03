<?php

class UsuarioDados extends Usuario {

	function __construct($id, $nome, $usuario, $senha) {

		parent::__construct($id, $nome, $usuario, $senha);

	}

	function __toString() {
		return "O usuário de id [".parent::$this->id."] se chama ".
			   $this->nome." com usuario ".parent::$this->usuario." e senha ".
			   $this->senha;// ." com telefone ".$this->tel." e endereço ".
			   //$this->end; 
	}
}

?>