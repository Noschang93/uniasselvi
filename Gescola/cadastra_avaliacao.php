<?php
require "validacao.php";
 // include "classes/Usuario.class.php";
include "classes/Professor/ProfessorDAO.class.php";
$dao = new DAO();
$dadosProfessor = $dao->buscaDadosProfessor($_SESSION['cod_user']);
$arrDisc = $dao->buscaDisciplinasProfessor($dadosProfessor->COD_PROFESSOR);
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
            <a href="cadastra_avaliacao.php">
              <i class="fa fa-dashboard"></i>
              <span>Cadastrar Avaliação</span>
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
          <h3><i class="fa fa-angle-right"></i> Cadastro de avaliação</h3>
          <h5><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> <a href="professor.php">Voltar ao inicio</a> </h5>
          <div class="row">

            <div class="row mt">
               <div class="col-lg-12">
                <div class="form-panel">

                   <?php
                        $arrTurmaDisc = $dao->buscaTurmaDisciplinaProfessor($dadosProfessor->MATRICULA_FUNCIONARIO,$_POST['cod_disciplina']);
                      
                    ?>

           <form action="" id="cadastrar_avaliacao" method="post" name="">
            <table border="1" class="table table-bordered table-striped table-condensed" id="tabelaAlunos">
              <tbody class="modal-content">
                <tr> 
                  <td>Nome avaliação: </td> 
                  <td><input type="text" name="nome_avaliacao" value="" style="width: 20em"></td>                                
                </tr>  
                <tr>
                  <td>Turma: </td> 
                  <td>
                   <select class="form-control" name="turma" >
                          <option value="" selected>Selecione a turma..</option>
                          <?php
                            
                             foreach ($arrTurmaDisc as $value => $turmas)
                            {

                             echo "<option value=".$turmas->COD_TURMA.">".$turmas->NOME_TURMA."</option>";

                            }
                         ?> 

                       </select>
                  </td>  
                  </td> 
               </tr>  

                 <tr>
                  <td>Disciplina: </td> 
                  <td>
                      <select name="disciplina" class="form-control">
                          <option value="" selected>Selecione a Disciplina...</option>
                          <?php
                            
                            foreach ($arrDisc as $value => $disciplina) 
                            {

                             echo "<option value=".$disciplina->COD_DISCIPLINA.">".$disciplina->NOME_DISCIPLINA."</option>";

                            }
                         ?> 

                       </select>
                   </td> 

               
                  </td> 
               </tr> 
              
              </tbody>
            </table>
            
             <button type="submit" class="btn btn-theme02">Cadastar</button>
          </form>           



                  </div>
                </div>
              </div>
          
</section>
</section>

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
        2018 - Gescola.
    <a href="index.html#" class="go-top">
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

<script type="text/javascript">
$(document).ready(function () {
  var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bem vindo ao Gescola!',
            // (string | mandatory) the text inside the notification
            text: 'Aqui você pode editar suas informações, gerenciar turmas e etc...',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '0,5',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
          });

  return false;
});
</script>

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


$("#cadastrar_avaliacao").submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "script_cadastro.php",
                    data: dados,
                    success: function(data)
                    {   
                        if(data == "1"){
                            alert("Avaliação cadastrada com sucesso! ");
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


</body>
</html>
