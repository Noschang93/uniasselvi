<?php
require "validacao.php";
include "Classes/Professor/ProfessorDAO.class.php";

$dao = new DAO();
$dadosProfessor = $dao->buscaDadosProfessor($_SESSION['cod_user']);
$data = $dao->getDate(0)->DATA; 
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
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <link href="assets/css/table-responsive.css" rel="stylesheet">

  <script src="assets/js/chart-master/Chart.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <script type="text/javascript" src="assets/js/relogio.js"></script>
    <script type="text/javascript" src="assets/js/filtro.tabela.js"></script>
    <script type="text/javascript" src="assets/js/seleciona_diario_classe.js"></script>
    <script type="text/javascript" src="assets/js/janela_flutuante.js"></script>    
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
          <h3><i class="fa fa-angle-right"></i> Turma: <?php echo $_POST['nome_turma'];?></h3>
          <form action="turmas_disciplina.php" method="post" name="retorno">
            <div>
              <input type="hidden" name="cod_disciplina" value="<?php echo $_POST['cod_disciplina']?>" />
              <script type="text/javascript">
              document.write('<h5><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> <a href="#" onclick="document.forms[\'retorno\'].submit(); return false;">Voltar a página anterior </a></h5>');
              </script>
              <noscript>
                <input type="submit" name="submit" value="submit" />
              </noscript>
            </div>
          </form>           
        <div class="form-panel" id="div_tabela_alunos">
          <section id="unseen">              
            <div class="showback">
              <h5><i class="fa fa-angle-right"></i> Diário de Classe</h5>
              <h4><strong><?php echo $data;?></strong></h4> 
              <div class="btn-group">
                <input type="text" id="filtro-alunos" class="form-control" onkeyup="filtraAlunos()" placeholder="Nome do aluno" autofocus>
              </div> 
              <div class="btn-group">              
                <input type="hidden" id="cod_turma" value=<?php echo $_POST['cod_turma'];?>>
                <input type="hidden" id="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
                <input type="hidden" id="nome_turma" value=<?php echo $_POST['nome_turma'];?>>
                <input type="hidden" id="cod_professor" value=<?php echo $dadosProfessor->COD_PROFESSOR;?>>             
                <button type="submit" id="diario_previous" onclick="diario_classe_previous('<?php echo $data; ?>','<?php echo 1;?>')" class="btn btn-theme02" ><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> Voltar </button>
                <button type="submit" id="diario_next" onclick="diario_classe_next('<?php echo $data; ?>','<?php echo 1;?>')" class="btn btn-theme02" > Avançar <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
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
                    </tr>
                </thead>
                <tbody class="modal-content">
                  <?php
                  $arrDiarioClasse = $dao->buscaAlunosTurma($dadosProfessor->COD_PROFESSOR, $_POST['cod_turma']);
                  $posição = 01;
                  if ($arrDiarioClasse == null) {

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
                          Periodos:
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
                        
                        <button id=""class="btn btn-success btn-xs fa fa-check"></button>
                        <button id="" class="btn btn-primary btn-xs fa fa-pencil"></button>
                      </div>
                    </td> 
                                     
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
        <!-- <input type="hidden" name="data" value="<span id='dataNumber'></span>"> -->
        <input type="hidden" name="data_diario_classe" value=<?php echo $data;?>> 
        <input type="hidden" name="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
        <input type="hidden" name="nome_turma" value=<?php echo $_POST['nome_turma'];?>> 
        <input type="hidden" name="cod_turma" value=<?php echo $_POST['cod_turma'];?>>
        <input type="hidden" name="cod_professor" value=<?php echo $dadosProfessor->COD_PROFESSOR;?>> 

        <button type="submit" class="btn btn-theme02" id="salvar" onClick="return confirm('Deseja atualizar o diário de classe da turma?')"><i class="fa fa-check"></i> Atualizar Diario de Classe</button>
        <?php
        if ($arrDiarioClasse == null) {
        ?>  
          <script type="text/javascript">
            document.getElementById("diario_previous").disabled = true;
            document.getElementById("diario_next").disabled = true;
            document.getElementById("salvar").disabled = true;
          </script>
        <?php
        }
        ?>
      </form>
    </section><!--/wrapper -->
  </div><!-- /row --> 

</section><!-- /MAIN CONTENT -->
<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
    2018 - Gescola.
    <a href="index.php#" class="go-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
</footer>
<!--footer end-->
</section>
<!-- mascara para cobrir o site --> 

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
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>  

<script type="application/javascript">
$(document).ready(function () {
  $("#date-popover").popover({html: true, trigger: "manual"});
  $("#date-popover").hide();
  $("#date-popover").click(function (e) {
    $(this).hide();
  });


</script>


</body>
</html>
