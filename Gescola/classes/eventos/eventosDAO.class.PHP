<?php
include "Classes/Conexao/BancoPDO.class.php";

class eventDAO extends BancoPDO {
	

public function __construct() {
		$this->conexao = BancoPDO::conexao();

}

public function inserirEvento($idEvento, $titEvento, $iniEvento)
{

	try {
					$stm = $this->conexao->prepare("INSERT INTO EVENTOS (ID, TITLE, START) VALUES (?, ?, ?)");
					$stm->bindValue(1, $idEvento);
					$stm->bindValue(2, $titEvento);
					$stm->bindValue(3, $iniEvento);

					$stm->execute();

					if($stm)
					{
					   echo "1";  
					}
					else
					{
						echo "0";
					}				


		} catch(PDOException $e) {

			echo "Erro: Problemas para inserir evento! ".$e->getMessage();

		}


}

public function consultarEventos()
{

try{

	$stm = $this->conexao->prepare("SELECT * FROM eventos");
	$stm->execute();
	

	while ($linha = $consulta = $stm->fetch(PDO::FETCH_ASSOC)) {
		
		$vetor[] = $linha;

	}

	echo json_encode($vetor);

}

catch(PDOException $e) {

			echo "Erro: Problemas ao consultar eventos! ".$e->getMessage();

		}




}

}


?>