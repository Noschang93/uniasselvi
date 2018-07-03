<?php
   require('classes/Usuario/UsuarioDAO.class.php');
?>

<!DOCTYPE html>
<head>
  
</script> 


    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sicredi</title>

 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>Gescola - Administração Escolar</title>
	 	
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	
	<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	
	<!--data tables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
	
	<!-- Jquery externos -->
	<script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
	
	
	        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">	
	

                </script>
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
            <a href="index.html" class="logo"><b>Gescola - Administração escolar</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <!-- <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Você tem 5 notificações</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">João</span>
                                    <span class="time">Há menos de um minuto</span>
                                    </span>
                                    <span class="message">
                                        Eai colega, como está?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Carla</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Oi prof, preciso de uma ajuda.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Rogério</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Gostei da sua nova pag...
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Prof Guilherme</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Por favor, assim que possível ver....
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">Ver todos os recados...</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
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
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Olá Professor Fulano</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Turmas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">Alunos</a></li>
                          <li><a  href="buttons.html">Notas</a></li>
                          <li><a  href="panels.html">Diário de Classe</a></li>
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
          		<div class="col-lg-12">
                  <div class="form-panel">
                  
                    <form class="form-horizontal style-form">
					            <div class="form-group">
                                   <div class="col-sm-10">
									
									 <select class="form-control"  id="disciplinas" name="disciplinas">
									 
									  <option value="" disabled="disabled" selected="selected">Selecione a Disciplina</option>

								 <?php 
    								
    									$materias = new UsuarioDAO();
    									 
                      $arrayMat =  $materias->buscaDisciplinas(1);

                       foreach ($arrayMat as $value => $disciplina) {

                        echo "<option value=" . $disciplina->cod_disciplina ." > ".  $disciplina->nome . "</option>";

                        
                       }
    									   									
    														
    									    mysqli_close($conexao);		
    									
    									?>
								</select>									
									
			               <div class="col-xs-1">
								          <br><button type="button" class="btn btn-theme" id="pesquisar">Pesquisar</button>
							       </div>
														
							
                              </div>
							 
                          </div>                  
							   
								
							</form>
							 
						  </div>
						                         
                          </div>
                     
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

<script>
$(document).ready(function() {
   //definir evento "onclick" do elemento (botao) ID butEnviar 
   $("#pesquisar").click(function() {

      //capturar o valor dos campos do fomulario
      var disciplinas  = $("#disciplinas").val();
      

      //usar o metodo ajax da biblioteca jquery para postar os dados em processar.php
      $.ajax({
         "url": "teste.php",
         "dataType": "html",
         "data": {
            "disciplinas" : disciplinas           
         },
         "success": function(response) {
            //em caso de sucesso, a div ID=saida recebe o response do post
            $("div#saida").html(response);
         }

      });
   });
});
</script>	
			
			
<div id="saida">
	

</div>
 

</div><!-- /row -->
<script>
$(document).ready(function(){
$("#formToggle").hide();
	$("#toggle").click(function(){
		$("#formToggle").toggle(500);
	});
});
</script>	
          	<!-- INLINE FORM ELELEMNTS -->
	
          	<div class="row mt">
			
          		<div class="col-lg-12">
					
          		<div class="form-panel">
				<button type="button" class="btn btn-theme" id="toggle"> > Enviar e-mail </button>
     
	 <h4> </h4>
					 
                      <form class="form" role="form" id="formToggle">
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
              2016 - Gescola
              <a href="form_component.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

   


    

  </body>
</html>