<?php
include "classes/Professor/ProfessorDAO.class.php";

$dao = new DAO();

 $nome_avalicao = $_POST["nome_avaliacao"];
 //$nome_turma = $_POST["nome_turma"];
 $disciplina = $_POST["disciplina"];

 $dao->inserirAvaliacao($disciplina, $nome_avalicao);



?>