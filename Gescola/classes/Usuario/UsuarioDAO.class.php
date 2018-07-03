<?php
include "classes/Conexao/BancoPDO.class.php";

class DAO extends BancoPDO {

	public function __construct() {
		$this->conexao = BancoPDO::conexao();
	}

//************************************************************************************************************	   
	public function autenticar($usuario) {

		try {

			$stm = $this->conexao->prepare("SELECT * FROM USUARIO
				WHERE SENHA_USUARIO = ? 
				AND  LOGIN_USUARIO = ?");

			$user = $usuario->LOGIN_USUARIO;
			$senha = $usuario->SENHA_USUARIO;

			$stm->bindValue(1, $senha);
			$stm->bindValue(2, $user);

			$stm->execute();
			
			if($stm->rowCount() == 0) {
				return null;

			} else {
				$dados = $stm->fetch(PDO::FETCH_OBJ);
				return $dados; 
			}

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}

//************************************************************************************************************	
	public function salvarUltimoLogin($cod_user) { 

		try {
			$stm2 = $this->conexao->prepare("UPDATE USUARIO SET ULTIMO_LOGIN = (SELECT NOW()) 
				WHERE COD_USUARIO = ? ");
			$stm2->bindValue(1, $cod_user);
			$stm2->execute();

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}

	}

	?>