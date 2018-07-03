<?php

class criptografia{
	public function base64($senha_usuario) { 

		try {			
			return base64_encode($senha_usuario);
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}
}
?>