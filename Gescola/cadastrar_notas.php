<?php
require "validacao.php";

if(isset($_POST))
{

	//include "classes/Usuario.class.php";
	include "Classes/Professor/ProfessorDAO.class.php";

	//$notas_atualizar = $_POST['nota_atualizar'];

	if(!empty($_POST['nota_atualizar']) && is_array($_POST['nota_atualizar'])){
		foreach($_POST['nota_atualizar'] as $dados) {
		//	echo $item['matricula'], ' | ', $item['cod_avaliacao'], ' | nota ', $item['nota'], '<br />', PHP_EOL;
			$acoes = new DAO();
			$acoes->inserirNota( $dados['nota'], $dados['MATRICULA_ALUNO'], $dados['COD_AVALIACAO'], $_POST['cod_turma'], $_POST['cod_professor']);
		}
	}

	echo "<script language=javascript>alert( 'Dados atualizados com sucesso!' );</script>";
//	header("refresh:5; url=turma.php");	

}	
?>
<form method="post" action="cadastro_notas_turma.php" name="retorna_turma">
	<input type="hidden" name="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
	<input type="hidden" name="nome_turma" value=<?php echo $_POST['nome_turma'];?>> 
	<input type="hidden" name="cod_turma" value=<?php echo $_POST['cod_turma'];?>> 
</form>
<script language="JavaScript">document.retorna_turma.submit();</script>