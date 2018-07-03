<?php
require "validacao.php";
/*
include "classes/Usuario/Usuario.class.php";
include "classes/Usuario/UsuarioDAO.class.php";
*/
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

    <body>

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
                 </li>
          <!-- inbox dropdown end -->
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
                  <!--  notification end -->
                </div>
                <div class="top-menu">
                 <ul class="nav pull-right top-menu">
                  <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
              </div>
              <div class="dados">
                <a><?php echo "Login: ".$login =$_SESSION["login"]; ?></a><br>
                <a><?php echo "Último login: ".$_SESSION["ultimo_login"]?></a><br>
                <a><?php echo "Tempo total logado: ".$_SESSION["datahora"];?></a>        
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

           <p class="centered"><a href="profile.html"><img src="assets/img/avatar.jpg" class="img-circle" width="60"></a></p>
           <h5 class="centered">Olá </h5>
          <li class="mt">
            <a class="active" href="professor.php">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
            </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" >
              <i class="fa fa-desktop"></i>
              <span>Turmas</span>
            </a>
            <ul class="sub">
              <li><a  href="general.html">Alunos</a></li>
              <li><a  href="cadastro_notas.php">Notas</a></li>
              <li><a  href="">Diário de Classe</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" >
              <i class="fa fa-cogs"></i>
              <span>Mensagens</span>
            </a>                     
          </li>
          <li class="sub-menu">
            <a href="javascript:;" >
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
          <h3><i class="fa fa-angle-right"></i> Cadastro de Notas</h3>

          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">
            <form id="maskForm" method="post" class="form-horizontal">
              <div class="col-lg-12">
                <div class="form-panel">

                  <form class="form-horizontal style-form" method="get">
                    <div class="form-group">
                      <div class="col-sm-10">
                       <select class="form-control">
                        <option value="" selected>Selecione a Disciplina...</option>
                        <?php
                          
                          foreach ($arrDisc as $value => $disciplina) 
                          {

                           echo "<option value=".$disciplina->COD_DISCIPLINA.">".$disciplina->NOME_DISCIPLINA."</option>";

                          }
                       ?> 

                     </select>


                   </div>
                 </div>
                 <div class="col-sm-2 col-sm-2">
                  <button type="submit" class="btn btn-theme">Pesquisar</button>
                </div>
              </div>

              

              
              <div class='form-group'>

                <script language='JavaScript'>
                function SomenteNumero(e){
                  var tecla=(window.event)?event.keyCode:e.which;   
                  if((tecla>47 && tecla<58)) return true;
                  else{
                    if (tecla==8 || tecla==0) return true;
                    else  return false;
                  }
                }
                </script>



                
                
              </form>


              
              
              
            </div>


          </div>
        </form>
      </div>
    </div><!-- col-lg-12-->       
  </div><!-- /row -->

  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">

        <table border="1" class="table table-hover">
          <thead>
            <tr>
              <th>Alunos</th>
              <?php
              $arrDisc = $dao->buscaAvaliacaoTurma($dadosProfessor->COD_PROFESSOR, $dadosProfessor->COD_PROFESSOR);
              foreach ($arrDisc as $value => $name) {
               ?>
               <th><?php echo $name->nome ?></th>
               <tr>
                <td>Anthony</td>
                <td>0.0</td>
              </tr>
              <?php
            }
            ?>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>João</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
          </tr>
          <tr>
            <td>Glaucio</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
            <td>0.0</td>
          </tr>
        </tbody>
      </table>

    </div><!-- /form-panel -->
  </div><!-- /col-lg-12 -->
            </div><!-- /row -
      
            <!-- INLINE FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Enviar e-mail aos responsáveis</h4>
                  <form class="form" role="form">
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputEmail2">Endereço de E-mail</label>
                      <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Digite o Email">
                    </div>
                    <div class="form-group">

                      <textarea class="form-control" rows="7" id="comment" placeholder="Digite a mensagem"></textarea> 

                    </div>
                    <button type="submit" class="btn btn-theme">Enviar</button>
                  </form>
                </div><!-- /form-panel -->
              </div><!-- /col-lg-12 -->
            </div><!-- /row -->
            


            <!-- INPUT MESSAGES -->

            
          </section><! --/wrapper -->
        </section><!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
          <div class="text-center">
            2014 - Alvarez.is
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


      function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }
      </script>


    </body>
    </html>
    <?php
 
    ?>
