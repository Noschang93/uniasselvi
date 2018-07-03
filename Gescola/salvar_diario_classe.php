<?php
require "validacao.php";

if(isset($_POST))
{

	include "Classes/Professor/ProfessorDAO.class.php";
	$dao = new DAO();

	try {
		$periodos = $dao->getParametro(1)->VALOR_INT;;
		if(!empty($_POST['presenca']) && is_array($_POST['presenca'])){

			foreach($_POST['presenca'] as $aluno) {

				for ($i=1; $i <= $periodos; $i++) { 
					$status = 'STATUS'.$i;
					
					if(!empty($aluno[$status])){
						$statusDiarioClasse[$i] = 1;
		//				echo $statusDiarioClasse[$i];
					}else{

						$statusDiarioClasse[$i] = 0;
		//				echo $statusDiarioClasse[$i];
					}	
					
				}	
		//	echo "|",$aluno['matricula'],"|", $aluno['cod_turma_disc_professor']
		//	, '<br />', PHP_EOL;	
			echo $_POST['data_diario_classe'];
			$acoes = new DAO();
			$acoes->inserirDiarioClasse($aluno['matricula'], $aluno['cod_turma_disc_professor'], $statusDiarioClasse,  $_POST['data_diario_classe']);
			}
		}
		echo "<script language=javascript>alert( 'Diário de Classe atualizado com sucesso!' );</script>";
	} catch (Exception $e) {
		echo "Erro: ".$e->getMessage();
	}
}	
?>
<form method="post" action="diario_classe.php" name="retorna_diario_classe">
	<input type="hidden" name="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
	<input type="hidden" name="nome_turma" value=<?php echo $_POST['nome_turma'];?>> 
	<input type="hidden" name="cod_turma" value=<?php echo $_POST['cod_turma'];?>> 
</form>
<script language="JavaScript">document.retorna_diario_classe.submit();</script>