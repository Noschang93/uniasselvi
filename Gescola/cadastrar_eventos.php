<?php
include "Classes/eventos/eventosDAO.class.php";
$daoEvent = new eventDAO();

 $nome = $_POST["nomeEvento"];
 $data = $_POST["dataEvento"];


$daoEvent->inserirEvento('1',$nome, $data);

?>