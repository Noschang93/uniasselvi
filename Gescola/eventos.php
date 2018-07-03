<?php
include "Classes/eventos/eventosDAO.class.php";
$daoEvent = new eventDAO();

$daoEvent->consultarEventos();

?>