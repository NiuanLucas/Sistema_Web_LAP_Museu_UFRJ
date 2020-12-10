
<?php require_once "../include.php";  ?>
<?php require_once "../functions.php";  ?>

<!DOCTYPE html>
<html>
<head>
  <title> Laboratório de Arqueobotânica e Paisagem – MN/UFRJ  </title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../assets/css/blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
 </head>

  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/bootnavbar.css"> 

  <link rel="icon" href="../../assets/images/favicon.png">
  <meta name="theme-color" content="#3c3c3c">
  <meta name="apple-mobile-web-app-status-bar-style" content="#3c3c3c">
  <meta name="apple-mobile-web-app-status-bar-style" content="#3c3c3c">

</head>
<body>

<?php
    //adicionar variavel sessão
    session_start();    

    // Determinar localidade BR
      setlocale(LC_ALL, 'pt_BR');

    //Testando Login
      if ( !isset($_SESSION["user_portal"])) {
      echo "<script>alert('$_SESSION não iniciada!);</script>";
      sleep(5);
      header("location: ../../index.php");
      }

    //Consulta Tabela Usuarios
      if ( isset($_SESSION["user_portal"]) ) {
        $user = $_SESSION["user_portal"];

        $dados = "SELECT * ";
        $dados .= "FROM usuarios ";
        $dados .= "WHERE usuario_id = '{$user}' ";
        $dados_usuario = mysqli_query($conecta, $dados);
                if( !$dados_usuario ) {
                die(" Falha na Base de Dados! Header Dash ");
                }

        $dados_usuario = mysqli_fetch_assoc($dados_usuario);

        //$nome = $dados_usuario["nomecompleto"];

      }

    // Consulta a Tabela Paginas Fixas
    $tr = "SELECT * ";
    $tr .= "FROM paginas_fixas ORDER BY pagina_titulo ASC ";
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("Falha na consulta ao banco Paginas Fixas Header | Paginas Fixas");   
    }

    // Consulta a Tabela Paginas Modulares
    $tr2 = "SELECT * ";
    $tr2 .= "FROM paginas_modulares ORDER BY pagina_modular_titulo ASC ";
    $consulta_tr2 = mysqli_query($conecta, $tr2);
    if(!$consulta_tr2) {
        die("Falha na consulta ao banco Paginas Modulares Header | Paginas Modulares");   
    }

    // Consulta a Tabela Usuarios
    $tr3 = "SELECT * ";
    $tr3 .= "FROM usuarios ";
    $consulta_tr3 = mysqli_query($conecta, $tr3);
    if(!$consulta_tr3) {
        die("Falha na consulta ao banco Usuarios Header | Usuarios ");   
    }

        // Consulta a Tabela Slides
    $tr4 = "SELECT * ";
    $tr4 .= "FROM slides ";
    $consulta_tr4 = mysqli_query($conecta, $tr4);
    if(!$consulta_tr4) {
        die("Falha na consulta ao banco Slides Header | Slides");   
    }

            // Consulta a Tabela Contato
    $tr5 = "SELECT * ";
    $tr5 .= "FROM contato ";
    $consulta_tr5 = mysqli_query($conecta, $tr5);
    if(!$consulta_tr5) {
        die("Falha na consulta ao banco Contato Header | Contato");   
    }

                // Consulta a Tabela Contato
    $tr6 = "SELECT * ";
    $tr6 .= "FROM cards ";
    $consulta_tr6 = mysqli_query($conecta, $tr6);
    if(!$consulta_tr6) {
        die("Falha na consulta ao banco Cards Header | Cards ");   
    }

           // Consulta a Tabela Contato
    $tr7 = "SELECT * ";
    $tr7 .= "FROM producao_academica_ufrj";
    $consulta_tr7 = mysqli_query($conecta, $tr7);
    if(!$consulta_tr7) {
        die("Falha na consulta ao banco Cards Header | Producao Academica UFRJ");   
    }


?>

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

          <div class="float-right d-none d-md-block" style="position: absolute; top: 80%; left: 40%;">
          <h4 class="font-arial" style="font-size: 20px !important;">
          Laboratório de Arqueobotânica e Paisagem, Museu Nacional, UFRJ
      	  </h4>
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

      <div class="collapse navbar-collapse" id="navbarsExample08">
        <ul class="navbar-nav">

          <?php
          //Não Existe Login
          if ( !isset($_SESSION["user_portal"])) {
          header("location: ../../index.php");
          ?>
          <li class="nav-item">
            <a class="nav-link" href="dash"><i class="fas fa-tools"></i> Painel do Administrador - Laboratório de Arqueobotânica e Paisagem </a>
          </li>

          <?php
          }
          //Existe Login
          else {
          ?>  


          <li class="nav-item">
            <a class="nav-link" href="paginas_fixas.php"><i class="fas fa-file"></i> Páginas fixas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="paginas_modulares.php"><i class="fas fa-scroll"></i> Páginas modulares</a>
          </li> 

           <li class="nav-item">
            <a class="nav-link" href="producao_academica.php"><i class="fas fa-file-signature"></i> Produção Acadêmica</a>
          </li>          

          <li class="nav-item">
            <a class="nav-link" href="cards.php"><i class="fas fa-grip-horizontal"></i> Cards</a>
          </li>

          <li class="nav-item" >
            <a class="nav-link" href="todos_usuarios.php"><i class="fas fa-users"></i> Todos os usuários</a>
          </li>

          <li class="nav-item" >
            <a class="nav-link" href="slides.php"><i class="fas fa-images"></i> Slides e Fotos</a>
          </li>

          <li class="nav-item" >
            <a class="nav-link" href="mensagens.php"><i class="fas fa-envelope-open-text"></i> Mensagens</a>
          </li>


          <?php

          } ?>



        </ul>
      </div>
    </nav>

