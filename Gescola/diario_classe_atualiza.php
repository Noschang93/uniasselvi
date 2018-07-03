<?php
require "validacao.php";
include "Classes/Professor/ProfessorDAO.class.php";

$dao = new DAO();
$dadosProfessor = $dao->buscaDadosProfessor($_SESSION['cod_user']);
$dia = $_POST['dia']; 
$data = $_POST['data'];               
?>
<div class="showback" id="div_tabela_alunos">
	<h5><i class="fa fa-angle-right"></i> Diário de Classe</h5>
	<h4><strong><?php echo $data;?></strong></h4> 
	<div class="btn-group">
		<input type="text" id="filtro-alunos" class="form-control" onkeyup="filtraAlunos()" placeholder="Nome do aluno" autofocus>
	</div> 
	<div class="btn-group">
		<input type="hidden" id="data_diario_classe" value=<?php echo $data;?>>
		<input type="hidden" id="cod_turma" value=<?php echo $_POST['cod_turma'];?>>
		<input type="hidden" id="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
		<input type="hidden" id="nome_turma" value=<?php echo $_POST['nome_turma'];?>>
		<input type="hidden" id="cod_professor" value=<?php echo $dadosProfessor->COD_PROFESSOR;?>>
		<input type="hidden" id="dia" value=<?php echo $data;?>>                   
		<button type="submit" onclick="diario_classe_previous('<?php echo $data ?>','<?php echo $dia;?>')" class="btn btn-theme02"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> Voltar </button>
		<button type="submit" onclick="diario_classe_next('<?php echo $data ?>','<?php echo $dia;?>')" class="btn btn-theme02"> Avançar <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
	</div>                                    
</div><!-- /showback -->	
<form name="salva_diario_classe" method="post" action="salvar_diario_classe.php">
	<table border="1" class="table table-bordered table-striped table-condensed" id="tabelaAlunos">
		<thead>
			<tr>
				<th classe="posicao">N°</th>
				<th>Matrícula</th>
				<th>Nome Aluno</th>
				<th>Presença</br><?php echo $data;?></th>
				<th>Ações</th>
				<th>Média </br>Presença X Mês</th>
			</tr>
		</thead>
		<tbody class="modal-content">
			<?php
			$arrDiarioClasse = $dao->buscaAlunosTurma($dadosProfessor->COD_PROFESSOR, $_POST['cod_turma']);
			$posição = 01;
			if ($arrDiarioClasse == null) {
                # code...
			}else{
				foreach ($arrDiarioClasse as $valueAluno => $aluno) { 
					$diarioClasseStatus = $dao->diarioClasseStatus($aluno->MATRICULA_ALUNO, $aluno->COD_TURMA_DISCIPLINA_PROFESSOR, $data); 

					?>
					<tr> 
						<td><?php echo $posição?></td> 
						<td><?php echo $aluno->MATRICULA_ALUNO ?></td>           
						<td><?php echo $aluno->NOME_COMPLETO ?></td>
						<?php

						?>
						<input type="hidden" value=<?php echo $aluno->MATRICULA_ALUNO?> name="presenca[<?php echo $aluno->MATRICULA_ALUNO?>][matricula]"> 
						<input type="hidden" value=<?php echo $aluno->COD_TURMA_DISCIPLINA_PROFESSOR?> name="presenca[<?php echo $aluno->MATRICULA_ALUNO?>][cod_turma_disc_professor]"> 
						<td>
							<?php
							$periodos = $dao->getParametro(1)->VALOR_INT;
							for ($i=1; $i <= $periodos; $i++) { 
								$status = 'STATUS'.$i;
								if ($diarioClasseStatus == null) {
									?>     
									<input class="input" type="checkbox" value="on" name="presenca[<?php echo $aluno->MATRICULA_ALUNO?>][<?php echo $status?>]">
									<?php   
								}else{
									if ($diarioClasseStatus->$status == 1) {
										?>     
										<input class="input" type="checkbox" checked value="on" name="presenca[<?php echo $aluno->MATRICULA_ALUNO?>][<?php echo $status?>]">
										<?php      
									}else if ($diarioClasseStatus->$status == 0) {
										?>     
										<input class="input" type="checkbox" value="on" name="presenca[<?php echo $aluno->MATRICULA_ALUNO?>][<?php echo $status?>]">
										<?php   
									}
								}
							}
							?>
						</td>
						<td>
							<div >
								<button class="btn btn-success btn-xs fa fa-check"></button>
								<button class="btn btn-primary btn-xs fa fa-pencil"></button>
							</div>
						</td> 
						<td>%</td>                       
						<?php

						?>
					</tr>      
					<?php
					$posição++;
				}     
			}
			?>
		</tbody>
	</table>
</section>
<input type="hidden" name="data_diario_classe" value=<?php echo $data;?>> 
<input type="hidden" name="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
<input type="hidden" name="nome_turma" value=<?php echo $_POST['nome_turma'];?>> 
<input type="hidden" name="cod_turma" value=<?php echo $_POST['cod_turma'];?>>
<input type="hidden" name="cod_professor" value=<?php echo $dadosProfessor->COD_PROFESSOR;?>> 
<?php
	if (strtotime($data) > strtotime($dao->getDate(0)->DATA)) {
?>	
<script type="text/javascript">document.getElementById("salvar").disabled = true;</script>
<?php
	}else{
?>
<script type="text/javascript">document.getElementById("salvar").disabled = false;</script>
<?php
}
?>
<button type="submit" class="btn btn-theme02" id="salvar" onClick="return confirm('Deseja atualizar o diário de classe da turma?')"><i class="fa fa-check"></i> Atualizar Diario de Classe</button>
</form>         