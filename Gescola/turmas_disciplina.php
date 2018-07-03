<?php
require "validacao.php";
//include "classes/Usuario.class.php";
include "Classes/Professor/ProfessorDAO.class.php";
$dao = new DAO();
$dadosProfessor = $dao->buscaDadosProfessor($_SESSION['cod_user']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Gescola - Administração Escolar</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-fullcalendar.css">
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <script src="assets/js/chart-master/Chart.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
    <script type="text/javascript" src="assets/js/relogio.js"></script>
    <body onload="relogio()">

      <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="professor.php" class="logo"><b>Gescola - Administração escolar</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu">
            <li id="header_inbox_bar" class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-theme">1</span>
              </a>
              <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                <li>
                  <p class="green">Você tem 1 mensagem nova</p>
                </li>
                <li>
                  <a href="chat/chat.php">
                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                    <span class="subject">
                      <span class="from">João</span>
                      <span class="time">Agora</span>
                    </span>
                    <span class="message">
                      Bom dia colega, esta por ai??
                    </span>
                  </a>
                </li>
               <li>
                <a href="/chat/chat.php">Acessar o chat</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="dados">
        <a><?php echo "LOGIN: ".$login =$_SESSION["login"]; ?></a><br>
        <a><?php echo "ÚLTIMO LOGIN: ".$_SESSION["ultimo_login"]?></a><br>
        <a><?php echo "TEMPO TOTAL LOGADO: ".$_SESSION["datahora"];?></a> 
      </div>     
      <div class="top-menu">
       <ul class="nav pull-right top-menu">
        <li>
          <form method="post" action="logout.php">
            <input type="hidden" name="cod_user" value=<?php echo $_SESSION["cod_user"]; ?>>
            <input type="submit" value="Logout" class="btn btn-theme">
          </form>
        </li>
      </ul>
    </div>


  </header>
  <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
     <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">

           <p class="centered"><a href="dados_pessoais.php"><img src="assets/img/avatar.jpg" class="img-circle" width="60"></a></p>
           <h5 class="centered">Olá 
            <?php 
            echo $dadosProfessor->NOME_PESSOA;
            ?>
          </h5>

          <li class="relogio">      
            <div class="relogio">
                <span id="titulo">Hora local</span><br />
                <span id="hora"></span><br />
                <span id="data"></span>
            </div>               
          </li>
          <li class="mt">
            <a class="active" href="professor.php">
              <i class="fa fa-dashboard"></i>
              <span>Início</span>
            </a>
          </li>
            <li class="sub-menu">
            <a href="dados_pessoais.php">
              <i class="fa fa-book"></i>
              <span>Dados Pessoais</span>
            </a>                      
          </li>


        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<section id="main-content">
<section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Turmas Cadastradas para a Disciplina:</h3>
          <h5><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> <a href="professor.php">Voltar a página anterior </a> </h5>
      <div class="row">
        <div class="col-lg-9 main-chart">

              <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                <?php
                $arrTurmaDisc = $dao->buscaTurmaDisciplinaProfessor($dadosProfessor->MATRICULA_FUNCIONARIO,$_POST['cod_disciplina']);

                if ($arrTurmaDisc == null) {
                  ?> 
                  <h4><i class="fa fa-angle-right"></i> Sem Turmas Cadastradas!</h4>
                  <?php 
                }else{

                  foreach ($arrTurmaDisc as $value => $turmas) {

                    $arrAlunosTurma = $dao->buscaAlunosTurma($dadosProfessor->COD_PROFESSOR,$turmas->COD_TURMA);
                    $cont = 0;
                    if ($arrAlunosTurma != null) {
                      foreach ($arrAlunosTurma as $key => $value) {
                        $cont++;
                      }
                    }

                    ?>

                <form method="post">
                  <div class="col-md-4 col-sm-4 mb">
                        <!-- Painel da turma B -->
                    <div class="white-panel pn donut-chart"> 
                      <div class="white-header">
                        <h5><?php echo $turmas->NOME_TURMA ?></h5>
                      </div>
                      <table border="0" class="table">

                        <tbody>
                          <tr>
                            <td>Turno:</td>
                            <td>
                                  <?php
                                  if ($turmas->TURNO == 1) {
                                    echo "Manhã";
                                  }
                                  if ($turmas->TURNO == 2) {
                                    echo "Tarde";
                                  }
                                  if ($turmas->TURNO == 3) {
                                    echo "Noite";
                                  }
                                  ?>
                            </td>

                          </tr>
                          <tr>
                            <td>Qtd Alunos:</td>
                            <td><?php echo $cont; ?></td>

                          </tr>
                          <tr>
                            <td>Série:</td>
                            <td><?php echo $turmas->COD_CURSO ?>°</td>

                          </tr>
                          <tr>
                              <td>
                                <input type="hidden" name="cod_user" value=<?php echo $_SESSION["cod_user"]; ?>>
                                <input type="hidden" name="cod_disciplina" value=<?php echo $_POST['cod_disciplina']?>> 
                                <input type="hidden" name="nome_turma" value=<?php echo $turmas->NOME_TURMA?>> 
                                <input type="hidden" name="cod_turma" value=<?php echo $turmas->COD_TURMA?>> 
                                <button type="submit" class="btn btn-theme02" formaction="cadastro_notas_turma.php">Notas <br>Avaliações</button>

                              </td>
                              <td>
                                <button type="submit" class="btn btn-theme02" formaction="diario_classe.php">Diário<br> de Classe</button>
                              </td>

                               <td>
                                <button type="submit" class="btn btn-theme02" formaction="cadastra_avaliacao.php">Cadastro<br> de Avaliações</button>
                              </td>


                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div><!-- /col-md-4-->
                  <?php


                  ?>
                </form>
                <?php
              }
            }
            ?>  
          </div><!-- /row -->

        </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  

     

<!-- CALENDAR-->
<div id="calendar" class="mb">
  <div class="panel blue-panel">
    <div class="panel-body">
      <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 10%; margin-top: -50px; width: 120px;">
        <div class="arrow"></div>
        <h3 class="popover-title" style="disadding: none;"></h3>
        <div id="date-popover-content" class="popover-content"></div>
      </div>
      <div id="my-calendar">
        
        <div id='calendario'>
        <br/>
        <form id="novo_evento" action="" method="post">
            Nome do Evento: <input type="text" name="nomeEvento" required/><br/><br/>            
            Data do Evento: <input type="date" name="dataEvento" required/><br/><br/>            
            <button class="btn btn-theme02" type="submit"> Cadastrar evento</button>
        </form>
    </div>


      </div>
      
    </div>
  </div>
</div><!-- / calendar -->

</div><!-- /col-lg-3 -->
</div><! --/row -->
</section>
</section>

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
    CALENDARIO ESCOLAR
    <a href="professor.php" class="go-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/fullcalendar/pt-br.js"></script>  
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>	
<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>  



<script type="application/javascript">
$(document).ready(function () {
  $("#date-popover").popover({html: true, trigger: "manual"});
  $("#date-popover").hide();
  $("#date-popover").click(function (e) {
    $(this).hide();
  });


  $("#my-calendar").fullCalendar({
 monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], 
monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'], 
dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
buttonText: {  prev: '&nbsp;&#9668;&nbsp;',
 next: '&nbsp;&#9658;&nbsp;',    
 prevYear: '&nbsp;&lt;&lt;&nbsp;', 
 nextYear: '&nbsp;&gt;&gt;&nbsp;',  
 today: 'Hoje',  month: 'Mês', 
 week: 'Semana', 
 day: 'Dia'  }, 
titleFormat: {  month: 'MMMM yyyy',
 week: "d [ yyyy]{ '&#8212;'[ MMM] d MMM yyyy}", 
 day: 'dddd, d MMM, yyyy'    }, 
columnFormat: { month: 'ddd',  
week: 'ddd d/M',  
day: 'dddd d/M' },  
allDayText: 'dia todo', 
axisFormat: 'H:mm', timeFormat: {   '': 'H(:mm)',   agenda: 'H:mm{ - H:mm}' },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2018-06-12',
                editable: true,
                eventLimit: true, 
                events: 'eventos.php',           
                eventColor: '#dd6777'
            });
});


$("#novo_evento").submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrar_eventos.php",
                    data: dados,
                    success: function(data)
                    {   
                        if(data == "1"){
                            alert("Evento cadastrado com sucesso! ");
                            //atualiza a página!
                            location.reload();
                        }else{

                            alert("Houve algum problema.."+ data);
                        }
                    }
                });                
                return false;
            }); 

function myNavFunction(id) {
  $("#date-popover").hide();
  var nav = $("#" + id).data("navigation");
  var to = $("#" + id).data("to");
  console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}


    </script>
<style>
        #my-calendar{
            color: black;
            position: absolute;
            margin-left: 0%;
            margin-top: 35%;
            width: 50%; 
            height:50%; 

        }        
    </style>

    <style>
        #novo_evento{
            color:black;
            margin-bottom: 5%;

        }        
    </style>

</body>
</html>
