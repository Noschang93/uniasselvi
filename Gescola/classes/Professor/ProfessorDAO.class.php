<?php
include "Classes/Conexao/BancoPDO.class.php";

class DAO extends BancoPDO {

	public function __construct() {
		$this->conexao = BancoPDO::conexao();
	}
//************************************************************************************************************	
	public function buscaDadosProfessor($cod_user) { 

		try {

			$stm = $this->conexao->prepare("SELECT DP.*,F.*,P.*,U.* FROM DADOS_PESSOAIS DP, FUNCIONARIO F, PROFESSOR P, USUARIO U
				WHERE DP.COD_DADOS_PESSOAIS = F.COD_DADOS_PESSOAIS
				AND P.MATRICULA_FUNCIONARIO = F.MATRICULA_FUNCIONARIO
				AND U.COD_USUARIO = P.COD_USUARIO
				AND U.COD_USUARIO = ?");

			$stm->bindParam(1, $cod_user, PDO::PARAM_INT);

			$stm->execute();
			
			if($stm->rowCount() == 0) {
				return null;

			} else {
				$dadosPessoais = $stm->fetch(PDO::FETCH_OBJ);
				return $dadosPessoais; 
			}

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}
//************************************************************************************************************
	public function buscaDisciplinasProfessor($cod_professor) {

		try {

			$stm = $this->conexao->prepare("SELECT *
				FROM DISCIPLINA D, DISCIPLINA_PROFESSOR DISCP
				WHERE D.COD_DISCIPLINA = DISCP.COD_DISCIPLINA
				AND DISCP.COD_PROFESSOR = ?
				ORDER BY D.COD_DISCIPLINA");

			$stm->bindParam(1, $cod_professor, PDO::PARAM_INT);
			
			$query = $stm->execute();

			if($stm->rowCount() == 0) {
				return null;

			} else {

				if($query) {
					while($dadosDisciplina = $stm->fetch(PDO::FETCH_OBJ)) {
						$arrDisc[$dadosDisciplina->COD_DISCIPLINA] = $dadosDisciplina ;

					}
					return $arrDisc;
				}
			}
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}	
//************************************************************************************************************	

	public function buscaAvaliacaoTurma($cod_professor, $cod_turma) {

		try {

			$stm = $this->conexao->prepare("SELECT * 
				FROM AVALIACAO_DISCIPLINA AD, TURMA_DISCIPLINA_PROFESSOR TDP, DISCIPLINA_PROFESSOR DP
				WHERE AD.COD_TURMA_DISCIPLINA_PROFESSOR = TDP.COD_TURMA_DISCIPLINA_PROFESSOR
				AND TDP.COD_DISC_PROFESSOR = DP.COD_DISC_PROFESSOR
				AND DP.COD_PROFESSOR = ?
				AND TDP.COD_TURMA = ?");

			$stm->bindParam(1, $cod_professor, PDO::PARAM_INT);
			$stm->bindParam(2, $cod_turma, PDO::PARAM_INT);
			
			$query = $stm->execute();

			if($stm->rowCount() == 0) {
				return null;

			} else {
				if($query) {
					while($avaliacao = $stm->fetch(PDO::FETCH_OBJ)) {
						$arrAvaliacaoTurma[$avaliacao->COD_AVALIACAO] = $avaliacao; 

					}
					return $arrAvaliacaoTurma;
				}
			}
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}

//************************************************************************************************************	
	public function buscaStatusAvaliacoesAluno($cod_aluno, $cod_avaliacao) {

		try {

			$stm = $this->conexao->prepare("SELECT * 
				FROM AVALIACAO_DISCIPLINA AD, TURMA_DISCIPLINA_PROFESSOR TDP, DISCIPLINA_PROFESSOR DP
				WHERE AD.COD_TURMA_DISCIPLINA_PROFESSOR = TDP.COD_TURMA_DISCIPLINA_PROFESSOR
				AND TDP.COD_DISC_PROFESSOR = DP.COD_DISC_PROFESSOR
				AND DP.COD_PROFESSOR = ?
				AND TDP.COD_TURMA = ?");

			$stm->bindParam(1, $cod_professor, PDO::PARAM_INT);
			$stm->bindParam(2, $cod_turma, PDO::PARAM_INT);
			
			$query = $stm->execute();

			if($stm->rowCount() == 0) {
				return null;

			} else {
				if($query) {
					while($avaliacao = $stm->fetch(PDO::FETCH_OBJ)) {
						$arrAvaliacaoTurma[$avaliacao->COD_AVALIACAO] = $avaliacao; 

					}
					return $arrAvaliacaoTurma;
				}
			}
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}

//************************************************************************************************************	
	public function buscaTurmaDisciplinaProfessor($cod_professor,$cod_disciplina) {

		try {

			$stm = $this->conexao->prepare("SELECT * FROM TURMA T, TURMA_DISCIPLINA_PROFESSOR TDP, DISCIPLINA_PROFESSOR DISCP
				WHERE T.COD_TURMA = TDP.COD_TURMA
				AND TDP.COD_DISC_PROFESSOR = DISCP.COD_DISC_PROFESSOR
				AND DISCP.COD_PROFESSOR = ?
				AND DISCP.COD_DISCIPLINA = ?
				AND TDP.ATIVO = 1");

			$stm->bindParam(1, $cod_professor, PDO::PARAM_INT);
			$stm->bindParam(2, $cod_disciplina, PDO::PARAM_INT);

			$query = $stm->execute();

			if($query) {
				while($dadosTurma = $stm->fetch(PDO::FETCH_OBJ)) {
					$arrTurmaDisc[$dadosTurma->COD_TURMA] = $dadosTurma; 

				}
				return $arrTurmaDisc;
			}

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}

		//************************************************************************************************************	
	public function buscaAlunosTurma($cod_professor,$cod_turma) {

		try {

			$stm = $this->conexao->prepare("SELECT DPA.*,A.*,TDP.*
				FROM
				DADOS_PESSOAIS DPA, ALUNO A, TURMA_ALUNO TA, TURMA_DISCIPLINA_PROFESSOR TDP, DISCIPLINA_PROFESSOR DP
				WHERE
				DPA.COD_DADOS_PESSOAIS = A.COD_DADOS_PESSOAIS
				AND A.MATRICULA_ALUNO = TA.MATRICULA_ALUNO
				AND TA.COD_TURMA = TDP.COD_TURMA
				AND TDP.COD_DISC_PROFESSOR = DP.COD_DISC_PROFESSOR
				AND DP.COD_PROFESSOR = ?
				AND TDP.COD_TURMA = ?");

			$stm->bindParam(1, $cod_professor, PDO::PARAM_INT);
			$stm->bindParam(2, $cod_turma, PDO::PARAM_INT);

			$query = $stm->execute();

			if($stm->rowCount() == 0) {
				return null;

			} else {

				if($query) {
					while($dadosAluno = $stm->fetch(PDO::FETCH_OBJ)) {
						$arrAlunosTurmaDisc[$dadosAluno->MATRICULA_ALUNO] = $dadosAluno; 

					}
					return $arrAlunosTurmaDisc;
				}
			}

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}
		//************************************************************************************************************	
	public function diarioClasseStatus($matricula_aluno, $cod_turma_disciplina_professor, $data_diario_classe) {

		try {


			$stm = $this->conexao->prepare("SELECT 	*
											FROM DIARIO_DE_CLASSE 
											WHERE MATRICULA_ALUNO = ?
											AND COD_TURMA_DISCIPLINA_PROFESSOR = ?
											AND DATE_FORMAT(DATA_DIARIO_CLASSE,'%d/%m/%Y') = ?/*(SELECT DATE_FORMAT(now(),'%d/%m/%Y') AS DATA)*/");
			$stm->bindParam(1, $matricula_aluno, PDO::PARAM_INT);
			$stm->bindParam(2, $cod_turma_disciplina_professor, PDO::PARAM_INT);
			$stm->bindValue(3, $data_diario_classe);	

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
	public function buscaAvaliacaoAluno($matricula_aluno,$cod_avaliacao,$cod_turma,$cod_professor) {

		try {

			$stm = $this->conexao->prepare("SELECT *
				FROM AVALIACAO_DISCIPLINA_ALUNO ADA, AVALIACAO_DISCIPLINA AD, TURMA_DISCIPLINA_PROFESSOR TDP, DISCIPLINA_PROFESSOR DP
				WHERE AD.COD_AVALIACAO = ADA.COD_AVALIACAO
				AND TDP.COD_TURMA_DISCIPLINA_PROFESSOR = AD.COD_TURMA_DISCIPLINA_PROFESSOR
				AND DP.COD_DISC_PROFESSOR = TDP.COD_DISC_PROFESSOR
				AND ADA.MATRICULA_ALUNO = ? 
				AND ADA.COD_AVALIACAO = ?
				AND TDP.COD_TURMA = ?
				AND DP.COD_PROFESSOR = ?");
			$stm->bindValue(1, $matricula_aluno);
			$stm->bindValue(2, $cod_avaliacao);
			$stm->bindValue(3, $cod_turma);
			$stm->bindValue(4, $cod_professor);									

			$stm->execute();
			
			if($stm->rowCount() == 0) {
				return null;
			} else {
				$dados = $stm->fetch(PDO::FETCH_OBJ);
				return $dados->RESULTADO; 
			}

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}
	
//************************************************************************************************************
	public function inserirNota($resultado, $matricula_aluno, $cod_avaliacao, $cod_turma, $cod_professor) {

		try {
			if ($resultado == '') {

				$stm = $this->conexao->prepare("DELETE
					FROM AVALIACAO_ALUNO 
					WHERE MATRICULA = ? AND COD_AVALIACAO = ?");
				$stm->bindValue(1, $matricula);
				$stm->bindValue(2, $cod_avaliacao);
				$stm->execute();

			}else{

				$stm = $this->conexao->prepare("SELECT *
					FROM AVALIACAO_DISCIPLINA_ALUNO ADA, AVALIACAO_DISCIPLINA AD, TURMA_DISCIPLINA_PROFESSOR TDP, DISCIPLINA_PROFESSOR DP
					WHERE AD.COD_AVALIACAO = ADA.COD_AVALIACAO
					AND TDP.COD_TURMA_DISCIPLINA_PROFESSOR = AD.COD_TURMA_DISCIPLINA_PROFESSOR
					AND DP.COD_DISC_PROFESSOR = TDP.COD_DISC_PROFESSOR
					AND ADA.MATRICULA_ALUNO = ? 
					AND ADA.COD_AVALIACAO = ?
					AND TDP.COD_TURMA = ?
					AND DP.COD_PROFESSOR = ?");
				$stm->bindValue(1, $matricula_aluno);
				$stm->bindValue(2, $cod_avaliacao);
				$stm->bindValue(3, $cod_turma);
				$stm->bindValue(4, $cod_professor);									
				$stm->execute();

				if($stm->rowCount() == 0) {

					$stm = $this->conexao->prepare("INSERT INTO AVALIACAO_DISCIPLINA_ALUNO (RESULTADO, MATRICULA_ALUNO, COD_AVALIACAO) 
						VALUES (?, ?, ?)");
					$stm->bindValue(1, $resultado);
					$stm->bindValue(2, $matricula_aluno);
					$stm->bindValue(3, $cod_avaliacao);

					$stm->execute();				
				} else {
					$stm = $this->conexao->prepare("UPDATE AVALIACAO_DISCIPLINA_ALUNO SET RESULTADO = ? 
						WHERE MATRICULA_ALUNO = ? AND COD_AVALIACAO = ?");
					$stm->bindValue(1, $resultado);
					$stm->bindValue(2, $matricula_aluno);
					$stm->bindValue(3, $cod_avaliacao);

					$stm->execute();	
				}
			}

		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}
	}
//************************************************************************************************************
	public function inserirDiarioClasse($matricula_aluno, $cod_turma_disciplina_professor, $status, $data_diario_classe) {
		$date = DateTime::createFromFormat('d/m/Y', $data_diario_classe);
	
		try {
			$stm = $this->conexao->prepare("SELECT 
				*
				FROM DIARIO_DE_CLASSE 
				WHERE DATE_FORMAT(DATA_DIARIO_CLASSE,'%d/%m/%Y') = ?/*(SELECT DATE_FORMAT(now(),'%d/%m/%Y') AS DATA)*/
				AND COD_TURMA_DISCIPLINA_PROFESSOR = ?
				AND MATRICULA_ALUNO = ?");
			$stm->bindValue(1, $data_diario_classe);
			$stm->bindValue(2, $cod_turma_disciplina_professor);
			$stm->bindValue(3, $matricula_aluno);

			$stm->execute();

			if($stm->rowCount() == 0) {
				
					$stm = $this->conexao->prepare("INSERT INTO DIARIO_DE_CLASSE (
													STATUS1, STATUS2, STATUS3, STATUS4,STATUS5, MATRICULA_ALUNO, COD_TURMA_DISCIPLINA_PROFESSOR, DATA_DIARIO_CLASSE) 	
													VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");

					foreach ($status as $key => $value) {
						$stm->bindValue($key, $value, PDO::PARAM_BOOL);
					}
					$stm->bindValue(6, $matricula_aluno);
					$stm->bindValue(7, $cod_turma_disciplina_professor);
					$stm->bindValue(8, $date->format('Y-m-d'));
					$stm->execute();

				} else {
					$stm = $this->conexao->prepare("UPDATE DIARIO_DE_CLASSE SET
													STATUS1 = ?, STATUS2 = ?, STATUS3 = ?, STATUS4 = ?,STATUS5 = ?
													WHERE MATRICULA_ALUNO = ?
													AND COD_TURMA_DISCIPLINA_PROFESSOR = ?
													AND DATE_FORMAT(DATA_DIARIO_CLASSE,'%d/%m/%Y') = ?/*(SELECT DATE_FORMAT(now(),'%d/%m/%Y') AS DATA)*/");

					foreach ($status as $key => $value) {
						$stm->bindValue($key, $value, PDO::PARAM_BOOL);
					}
					$stm->bindValue(6, $matricula_aluno);
					$stm->bindValue(7, $cod_turma_disciplina_professor);
					$stm->bindValue(8, $data_diario_classe);

					$stm->execute();	
				}

			} catch(PDOException $e) {
				echo "Erro: ".$e->getMessage();
			}
		}	
	//************************************************************************************************************
		public function getParametro($cod_parametro) {

			try {
				$stm = $this->conexao->prepare("SELECT * FROM PARAMETROS WHERE COD_PARAMETRO = ?");
				$stm->bindValue(1, $cod_parametro);
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
		public function getDate($dia) {

			try {
				$stm = $this->conexao->prepare("SELECT DATE_FORMAT(NOW() + INTERVAL ? DAY,'%d/%m/%Y') AS DATA");
				$stm->bindParam(1, $dia, PDO::PARAM_INT);				
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

		public function inserirAvaliacao($cod_disciplina, $nomeAvaliacao)
{

	try {
					$stm = $this->conexao->prepare("INSERT INTO AVALIACAO_DISCIPLINA (COD_TURMA_DISCIPLINA_PROFESSOR, NOME_AVALIACAO, TIPO_AVALICAO) VALUES (?, ?, 1)");
					$stm->bindValue(1, $cod_disciplina);
					$stm->bindValue(2, $nomeAvaliacao);
				

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

			echo "Erro: Problemas para inserir avaliação! ".$e->getMessage();

		}


}


	}

	?>