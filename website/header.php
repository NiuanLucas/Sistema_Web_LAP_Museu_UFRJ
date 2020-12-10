<?php require_once "../../dashboard/include.php";  ?>
<?php require_once "../../dashboard/functions.php";  ?>

<?php
        if( isset($_GET["pg_id"]) ){
        $pagina_id = $_GET["pg_id"];
        } else {
          $pagina_id = 2;
        }

        //Consulta a tabela usuarios
        $pagina_info = "SELECT * ";
        $pagina_info .= "FROM paginas_fixas ";
        $pagina_info .= "WHERE pagina_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_info);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Header Pagina Fixa ");  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina); 
?>

<?php
    // Consulta a Tabela Paginas Modulares
    $tr2 = "SELECT * ";
    $tr2 .= "FROM paginas_modulares ";
    $tr2 .= "WHERE pagina_modular_categoria = 'especialidades' ";
    $consulta_tr2 = mysqli_query($conecta, $tr2);
    if(!$consulta_tr2) {
        die("Falha na consulta ao banco Especialidades | Home");   
    }
?>


<?php
    // Consulta a Tabela Paginas Modulares
    $tr3 = "SELECT * ";
    $tr3 .= "FROM paginas_modulares ";
    $tr3 .= "WHERE pagina_modular_categoria = 'producao_academica' ";
    $consulta_tr3 = mysqli_query($conecta, $tr3);
    if(!$consulta_tr3) {
        die("Falha na consulta ao banco Especialidades | Home");   
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title> Laboratório de Arqueobotânica e Paisagem – MN/UFRJ  </title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../assets/css/animate.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap-dropdownhover.min.css">

  <link rel="stylesheet" href="../../assets/css/blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/bootnavbar.css"> 

  <link rel="icon" href="../../assets/images/favicon.png">
  <meta name="theme-color" content="#3c3c3c">
  <meta name="apple-mobile-web-app-status-bar-style" content="#3c3c3c">
  <meta name="apple-mobile-web-app-status-bar-style" content="#3c3c3c">

</head>
<body>


  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>



<style type="text/css">
/* ============ desktop view ============ *
@media all and (min-width: 992px) {
  .navbar .nav-item .dropdown-menu hover-drop { display: none; }
  .navbar .nav-item:hover .nav-link{ color: #fff;  }
  .navbar .nav-item:hover .dropdown-menu hover-drop { display: block; }
  .navbar .nav-item .dropdown-menu hover-drop { margin-top:0; }
} 
/* ============ desktop view .end// ============ */
/* ============ desktop view ============ */
@media all and (min-width: 992px) {
  .navbar .nav-item .hover-drop{ display: none; }
  .navbar .nav-item:hover .hover-drop{ display: block; }
} 

@media all and (min-width: 992px) {
  .navbar .nav-item .nav-item .hover-drop-2{ display: none; }
  .navbar .nav-item .nav-item:hover .hover-drop-2{ display: block; }
} 
/* ============ desktop view .end// ============ */
/* ============ desktop view .end// ============ */

  .dropdown-menu {border-radius: 0px; background-color: rgba(35,35,35,1);}
  .dropdown-item {background-color:  rgba(0,0,0,0.05); color: #fff !important;}
  .my-2 {background-color: rgba(255,255,255,0.25);}
</style>


<center>
<div class="div-principal" >

<!-- SLIDE -->	
<div class="slide_topo d-none d-md-block"></div>
<div class="slide_topo-mobile d-block d-md-none"></div>

    <div class="container">
      <header class="blog-header mt-3  d-none d-md-block w-100 border-0 mb-2">
        <div class="row p-0">

          <div class="text-left d-none d-md-block justify-content-left mb-1">
            <img src="../../assets/images/logo_museu_ufrj.png" class="img-logo"> 
            <img src="../../assets/images/logo_laboratorio.png" class="img-logo">						
          </div>

          <div class="float-right d-none d-md-block" style="position: absolute; top: 80%; left: 37.5%;">
          <h6 class="font-arial" style="font-size: 22.5px !important;">
          Laboratório de Arqueobotânica e Paisagem, Museu Nacional, UFRJ
      	  </h6>
      	  </div>

        </div>
      </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-left" >
      <div class="navbar-brand d-block d-md-none">
      		<div class="">
      		<img src="../../assets/images/logo_laboratorio_texto.png" class="img-logo-mobile img-invert">	
      		</div>		
      </div>

      <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">

      	<!-- <style type="text/css">
      		 .navbar-toggler-icon {
  			background-image: url('../../assets/images/down-arrow.svg') !important;
  			background-size: 30px 15px;
			}
      	</style> -->

        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center text-left" id="navbarsExample08">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" target="_self" href="../home/inicio.php?pg_id=2">Home</a>
          </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quem somos
                </a>
                    <ul class="dropdown-menu hover-drop " aria-labelledby="navbarDropdown">

						<li><a class="dropdown-item" target="_self" href="../quem_somos/equipe.php?pg_id=4">Equipe</a></li>

                        <!-- <li class="nav-item dropdown">
	                        <a class="dropdown-item  target="_self"dropdown-toggle" href="" id="navbarDropdown1" role="button" data-toggle="dropdown"
	                            aria-haspopup="true" aria-expanded="false">
	                            Equipe
	                        </a>
	                        <ul class="dropdown-menu hover-drop " aria-labelledby="navbarDropdown1">
	                            <li><a class="dropdown-item" target="_self" href="../quem_somos/equipe_atual.php">Equipe atual</a></li><hr class="my-2">
	                            <li><a class="dropdown-item" target="_self" href="../quem_somos/antigos_membros.php">Antigos membros</a></li>
	                        </ul>   
                        </li> -->

                        <hr class="my-2"><li><a class="dropdown-item" target="_self" href="../quem_somos/infraestrutura.php?pg_id=5">Infraestrutura</a></li>

                        <hr class="my-2"><li><a class="dropdown-item" target="_self" href="../quem_somos/parceiros.php?pg_id=6">Parceiros e Financiadores</a></li>

                        <hr class="my-2"><li><a class="dropdown-item" target="_self" href="../quem_somos/historia_do_lap.php?pg_id=7">História do LAP</a></li>
                            
                    </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Pesquisa
                </a>
                    <ul class="dropdown-menu hover-drop " aria-labelledby="navbarDropdown">

                <li><a class="dropdown-item" target="_self" href="../pesquisa/linhas_de_pesquisa.php?pg_id=8">Linhas de Pesquisa</a></li><hr class="my-2">

 
            <li class="nav-item dropdown">
                <a class="dropdown-item dropdown-toggle"  onclick="location.href = '../pesquisa/especialidades.php?pg_id=10'" target="_self" href="../pesquisa/especialidades.php?pg_id=10" id="navbarDropdown1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Especialidades
                </a>

                <ul class="dropdown-menu hover-drop-2 " aria-labelledby="navbarDropdown3">
                  <?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>
                  <li>
                  <a class="dropdown-item" target="_self" href="../pesquisa/especialidade_mod.php?pg_id=<?php echo $linha['pagina_modular_id'] ?>"> <?php echo ($linha["pagina_modular_titulo"]) ?>
                  </a>
                  </li>
                  <hr class="my-2">
                  <?php } ?>
                </ul> 

              </li>


              </ul>

            </li>


           <li class="nav-item">
            <a class="nav-link" target="_self" href="../colecoes/colecoes.php?pg_id=11">Coleções</a>
          </li>



          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ensino </a>
            <div class="dropdown-menu hover-drop " aria-labelledby="dropdown04">
              <a class="dropdown-item" target="_self" href="../ensino/pos_graduacao.php?pg_id=12">Pós-Graduação</a><hr class="my-2">
              <a class="dropdown-item" target="_self" href="../ensino/iniciao_cientifica.php?pg_id=14">Iniciação Científica</a>
            </div>
          </li>


	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Produção Acadêmica
    </a>

      <ul class="dropdown-menu hover-drop " aria-labelledby="navbarDropdown">
         
 			<li class="nav-item dropdown">
                <a class="dropdown-item dropdown-toggle" target="_self" href="" id="navbarDropdown1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                   Arqueologia pré-colonial
                </a>
                <ul class="dropdown-menu hover-drop-2 " aria-labelledby="navbarDropdown3">
                    <li><a class="dropdown-item" target="_self" href="../producao_academica/producao_academica_mod.php?pg_id=54">Sambaquis</a></li><hr class="my-2">
                  <li><a class="dropdown-item" target="_self" href="../producao_academica/producao_academica_mod.php?pg_id=55">Ceramistas</a></li><hr class="my-2">
                    <li><a class="dropdown-item" target="_self" href="../producao_academica/producao_academica_mod.php?pg_id=56">Paleoíndios</a></li>
                </ul>   
            </li><hr class="my-2">

      	<?php while($linha = mysqli_fetch_assoc($consulta_tr3)) { ?>
      	<?php if ( $linha['pagina_modular_id'] > 56 ) { ?> 	
                  <li>
                  <a class="dropdown-item" target="_self" href="../producao_academica/producao_academica_mod.php?pg_id=<?php echo $linha['pagina_modular_id'] ?>"> <?php echo ($linha["pagina_modular_titulo"]) ?>
                  </a>
                  </li>
                  <hr class="my-2">
       	<?php } else { }  ?>  
        <?php } ?>


       </ul>

    </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Difusão do conhecimento
                </a>
                    <ul class="dropdown-menu hover-drop " aria-labelledby="navbarDropdown">

                        <li class="nav-item dropdown">
	                        <a class="dropdown-item dropdown-toggle" target="_self" href="" id="navbarDropdown1" role="button" data-toggle="dropdown"
	                            aria-haspopup="true" aria-expanded="false">
	                            Extensão
	                        </a>
	                        <ul class="dropdown-menu hover-drop-2" aria-labelledby="navbarDropdown3">
	                            <li><a class="dropdown-item" target="_self" href="../difusao_do_conhecimento/projeto_mod.php?pg_id=28">Projetos</a></li><hr class="my-2">
                              <li><a class="dropdown-item" target="_self" href="../difusao_do_conhecimento/cursos.php?pg_id=13">Cursos</a></li><hr class="my-2">
	                            <li><a class="dropdown-item" target="_self" href="../difusao_do_conhecimento/eventos.php?pg_id=16">Eventos</a></li>
	                        </ul>   
                        </li>

                        <hr class="my-2"><li class="nav-item dropdown">
	                        <a class="dropdown-item  dropdown-toggle" target="_self" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
	                            aria-haspopup="true" aria-expanded="false">
	                            Divulgação Científica
	                        </a>
	                        <ul class="dropdown-menu hover-drop-2 " aria-labelledby="navbarDropdown4">
	                            <li><a class="dropdown-item" target="_self" href="../difusao_do_conhecimento/lap_nas_midias.php?pg_id=17">LAP na Mídia</a></li><hr class="my-2">
	                            <li><a class="dropdown-item" target="_self" href="../difusao_do_conhecimento/redes_sociais.php?pg_id=19">Redes Sociais</a></li>
	                        </ul>   
                        </li>                        

                    </ul>
            </li>


          <li class="nav-item">
            <a class="nav-link" target="_self" href="../contato/contato.php?pg_id=18">Contato</a>
          </li>
        

        </ul>
      </div>
    </nav>

