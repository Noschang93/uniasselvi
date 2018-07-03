<?php
require "validacao.php";
 // include "classes/Usuario.class.php";
include "classes/Professor/ProfessorDAO.class.php";

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
  <link rel="stylesheet" href="assets/css/estilo.css"/>
 <link href="assets/css/metro.css" rel="stylesheet">
 <link href="assets/css/metro-colors.css" rel="stylesheet">
 <link href="assets/css/metro-icons.css" rel="stylesheet">
 <link href="assets/css/metro-responsive.css" rel="stylesheet">
 <link href="assets/css/metro-rtl.css" rel="stylesheet">
 <link href="assets/css/metro-schemes.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

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
       <div class="dados">
        <a><?php echo "LOGIN: ".$login =$_SESSION["login"]; ?></a>
        <a><?php echo "ÚLTIMO LOGIN: ".$_SESSION["ultimo_login"]?></a>
        <a><?php echo "TEMPO TOTAL LOGADO: ".$_SESSION["datahora"];?></a> 
      </div> 
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
         
        <!--  notification end -->


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

           <p class="centered"><a href="profile.html"><img src="assets/img/avatar.jpg" class="img-circle" width="60"></a></p>
           <h5 class="centered">Olá 
          
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
        <section class="wrapper tile-area-scheme-dark fg-white padding10"> 
         
     <div class="row ">
            <div class="col-lg-9 main-chart ">

           <div class="row mt ">          
          
             <h2 class="titulo"> &nbsp;&nbsp;&nbsp;&nbsp; > Gerenciamento - Cadastros</h2>


  <div class="tile-group double">

 
           <div class="tile-wide bg-black fg-white" data-role="tile">
                              <div class="tile-content iconic">

                              <h4 class="tile-area-title padding5">Turmas</h4>   

                                 <img src="assets/img/icone_turma.png" class="icon">

                                  
                              </div>

                              <div class="tile-label">GEscola</div>


          </div>

          <div class="tile-large bg-orange fg-white" data-role="tile">
                              <div class="tile-content iconic">
                              <h4 class="tile-area-title padding5">Ano letivo</h4>   
                               <img src="assets/img/icone_calendario.png" class="icon">
                                  
                              </div>
                              <div class="tile-label">GEscola</div>


          </div>
                   

</div> <!-- GROUP -->


<div class="tile-group double">

 
           <div class="tile-wide bg-green fg-white" data-role="tile" >
                              <div class="tile-content iconic" >

                             <h4 class="tile-area-title padding5">Professores</h4>      
                              <img src="assets/img/icone_quadro.png" class="icon">             
                        
                                  
                              </div>

                              <div class="tile-label">GEscola</div>


          </div>

          <div class="tile-wide bg-blue fg-white" data-role="tile">
                              <div class="tile-content iconic">
                               <h4 class="tile-area-title padding5">Alunos</h4> 
                                <img src="assets/img/icone_estudante.png" class="icon">
                                  
                              </div>
                              <div class="tile-label">GEscola</div>


          </div>

          <div class="tile-wide bg-brown fg-white" data-role="tile">
                              <div class="tile-content iconic">
                               <h4 class="tile-area-title padding5">Disciplinas</h4> 
                                <img src="assets/img/icone_chapeu.png" class="icon">
                                  
                              </div>
                              <div class="tile-label">GEscola</div>


          </div>


            

       

</div> <!-- GROUP -->


</div>


             
    </div><!-- /row -->



            </div><!-- /col-lg-9 END SECTION MIDDLE -->              
            
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  

</section>

</section>

<!--main content end-->
<!--footer start-->
<footer class="tile-area-scheme-dark">
  <div class="text-center">
        2014 - Gescola.
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
