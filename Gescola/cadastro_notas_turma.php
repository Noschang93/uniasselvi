<?php
require "validacao.php";
include "Classes/Professor/ProfessorDAO.class.php";

$dao = new DAO();
$dadosProfessor = $dao->buscaDadosProfessor($_SESSION['cod_user']);
$arrAlunosTurma = $dao->buscaAlunosTurma($dadosProfessor->COD_PROFESSOR,$_POST['cod_turma']);
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
        <a href="index.php" class="logo"><b>Gescola - Administração escolar</b></a>
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
          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">                    
          </div>

        </div>
      </form>
    </div>
  </div><!-- col-lg-12-->       
</div><!-- /row -->

<div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">

      <form method="post" action="cadastrar_notas.php">
        <section id="unseen">
          <table border="1" class="table table-bordered table-striped table-condensed" id="tabelaAlunos">
            <thead>
              <tr>
                <div class="showback">
                  <h5><i class="fa fa-angle-right"></i> Avaliações</h5>  
                  <div class="btn-group">
                    <input type="text" id="filtro-alunos" class="form-control" onkeyup="filtraAlunos()" placeholder="Filtrar nome " autofocus>
                  </div>  
                  <div class="btn-group">
                    <p> Total de alunos na turma: 
                      <?php
                      if ($arrAlunosTurma != null) { 
                        $cont = 0; 
                        foreach ($arrAlunosTurma as $posicao => $dado) {
                          $cont++;
                        }
                        echo $cont;
                      } 
                      ?>
                    </p> 
                  </div>        
                </div><!-- /showback -->
              </tr>            
              <tr>
                <th>N°</th>
                <th>Matrícula</th>
                <th>Nome Aluno</th>
                <?php
                $arrAvaliacao = $dao->buscaAvaliacaoTurma($dadosProfessor->COD_PROFESSOR,$_POST['cod_turma']);
                if ($arrAvaliacao == null) {
                  ?>
                  <th><?php echo "SEM AVALIAÇÕES CADASTRADAS PARA A DISCIPLINA DA TURMA!" ?></th>
                  <?php
                }else{
                  foreach ($arrAvaliacao as $indice => $avaliacao) {

                    ?>
                    <th><?php echo $avaliacao->NOME_AVALIACAO ;
                    if ($avaliacao->TIPO_AVALIACAO == 2) {
                      echo "</br>(Adicional)";
                    }
                    ?></th>
                    <?php
                  }
                }

                ?>
                <th>Total alcançado / Soma peso </th>
                <th>Progresso </br>Notas</th>
              </tr>
            </thead>
            <tbody class="modal-content">
              <?php
              $posição = 01;

              if ($arrAlunosTurma == null) {
                # code...
              }else{
                foreach ($arrAlunosTurma as $valueAluno => $aluno) {
                  $somaAvaliacoes = 0;  
                  ?>
                  <tr>             
                    <td><?php echo $posição?></td> 
                    <td><?php echo $aluno->MATRICULA_ALUNO ?></td>           
                    <td><?php echo $aluno->NOME_COMPLETO ?></td>
                    <?php

                    if ($arrAvaliacao != null) {
                      $soma = 0.0;
                      foreach ($arrAvaliacao as $valueAvaliacao => $avaliacao) {
                        $resultado = $dao->buscaAvaliacaoAluno($aluno->MATRICULA_ALUNO, $avaliacao->COD_AVALIACAO,$avaliacao->COD_TURMA,$dadosProfessor->COD_PROFESSOR);
                        if ($resultado == null) {
                          ?>
                          <input type="hidden" value=<?php echo $aluno->MATRICULA_ALUNO?> name="nota_atualizar[<?php echo $aluno->MATRICULA_ALUNO.$avaliacao->COD_AVALIACAO?>][MATRICULA_ALUNO]"> 
                          <input type="hidden" value=<?php echo $avaliacao->COD_AVALIACAO?> name="nota_atualizar[<?php echo $aluno->MATRICULA_ALUNO.$avaliacao->COD_AVALIACAO?>][COD_AVALIACAO]"> 
                          <td>
                           Peso: 10 / 
                            <input class="input" type="number" step="0.1" style="border:0;" value="0.0" maxlength="4" max="<?php echo $avaliacao->PESO_AVALIACAO?>" min="0.0" name="nota_atualizar[<?php echo $aluno->MATRICULA_ALUNO.$avaliacao->COD_AVALIACAO?>][nota]">
                          </td>

                          <?php
                        }else{
                          ?>
                          <input type="hidden" value=<?php echo $aluno->MATRICULA_ALUNO?> name="nota_atualizar[<?php echo $aluno->MATRICULA_ALUNO.$avaliacao->COD_AVALIACAO?>][MATRICULA_ALUNO]"> 
                          <input type="hidden" value=<?php echo $avaliacao->COD_AVALIACAO?> name="nota_atualizar[<?php echo $aluno->MATRICULA_ALUNO.$avaliacao->COD_AVALIACAO?>][COD_AVALIACAO]"> 
                          <td>
                            <?php
                            $PESO_AVALIACAO=10; 
                            echo "Peso: 10 / ";
                            ?>  
                            <input class="input" type="number" step="0.1" style="border:0;" value="<?php echo $resultado; ?>" maxlength="4" max="10" min="0.0" name="nota_atualizar[<?php echo $aluno->MATRICULA_ALUNO.$avaliacao->COD_AVALIACAO?>][nota]">
                          </td>

                          <?php
                        }
                        $somaAvaliacoes = $somaAvaliacoes + $resultado;
                        if ($avaliacao->TIPO_AVALIACAO == 1) {
                          $soma = $soma + $PESO_AVALIACAO;                            
                        } 
                      }

                    ?>
                    <td>
                      <?php 
                      $porcentagem = ($somaAvaliacoes* 100) / $soma ;
                      echo $somaAvaliacoes." / ".$soma;
                      ?>
                    </td>
                    <td>
                      <div class="progress progress-striped active">
                        <?php
                        if ($porcentagem < 70) {
                          ?>
                          <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo $porcentagem ?>%">
                            <?php
                            echo $porcentagem."% ";
                            ?>
                          </div>
                          <?php
                        }else{
                          ?>
                          <div class="progress-bar"  role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo $porcentagem ?>%">
                            <?php
                            echo $porcentagem."% ";
                            ?>
                          </div>
                          <?php
                        }
                        ?>
                      </div>

                    </td>
                    <?php
                    }else{
                      ?>
                      <th></th>
                      <th></th>
                      <th></th>
                      <?php
                    } 
                    ?>                    
                  </tr>      
                  <?php
                }     
              }
              ?>
            </tbody>
          </table>
        </section>
        <input type="hidden" name="cod_disciplina" value=<?php echo $_POST['cod_disciplina'];?>> 
        <input type="hidden" name="nome_turma" value=<?php echo $_POST['nome_turma'];?>> 
        <input type="hidden" name="cod_turma" value=<?php echo $_POST['cod_turma'];?>>
        <input type="hidden" name="cod_professor" value=<?php echo $dadosProfessor->COD_PROFESSOR;?>> 
        <?php
        if ($arrAlunosTurma == null || $arrAvaliacao == null) {
          ?>  
          <button type="submit" class="btn btn-theme02" disabled><i class="fa fa-check"></i> Atualizar Notas</button>
          <?php
        }else{ 
          ?>
          <button type="submit" class="btn btn-theme02" onClick="return confirm('Deseja atualizar as notas dos alunos?')"><i class="fa fa-check"></i> Atualizar Notas</button>
          <?php
        }
        ?>       
      </form>
    </div><!-- /form-panel -->
  </div><!-- /col-lg-12 -->
</div><!-- /row -->


</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
    2016 - Gescola
    <a href="" class="go-top">
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
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>  

<script type="application/javascript">
$(document).ready(function () {
  $("#date-popover").popover({html: true, trigger: "manual"});
  $("#date-popover").hide();
  $("#date-popover").click(function (e) {
    $(this).hide();
  });

  $("#my-calendar").zabuto_calendar({
    action: function () {
      return myDateFunction(this.id, false);
    },
    action_nav: function () {
      return myNavFunction(this.id);
    },
    ajax: {
      url: "show_data.php?action=1",
      modal: true
    },
    legend: [
    {type: "text", label: "Special event", badge: "00"},
    {type: "block", label: "Regular event", }
    ]
  });
});


function myNavFunction(id) {
  $("#date-popover").hide();
  var nav = $("#" + id).data("navigation");
  var to = $("#" + id).data("to");
  console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
</script>

</body>
</html>
