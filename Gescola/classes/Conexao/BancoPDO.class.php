<?php

class BancoPDO {

	public $tipo = "mysql";
	public $host = "localhost"; 
	public $usuario = "root";
	public $senha = "";
	public $banco = "gescola";

	public $con = null;

	public function conexao() {

		try {
			
			$opcoes = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
			);

			$this->con = new PDO($this->tipo.
				                 ":host=".$this->host.
				                 ";dbname=".$this->banco.";charset=utf8",
				                 $this->usuario,
				                 $this->senha,
								 $opcoes);
			return $this->con;
		
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}

}

?>