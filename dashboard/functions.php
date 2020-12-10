
<?php require_once "include.php";  ?>


<?php
function exibir_slide($slide, $folder, $width, $height){


//Passo 1 - Abrir conexao
$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 

$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

if($slide > 0) {
$slide = $slide;
} else {
$slide = $_GET["sl_id"];
}

// Consulta a Tabela Slides
    $consultar_slide = "SELECT * ";
    $consultar_slide .= "FROM slides ";
    $consultar_slide .= "WHERE  slide_id = $slide ";
    $consulta_slide = mysqli_query($conecta, $consultar_slide);
    if(!$consulta_slide) {
        die("</br>");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }

    $linha4 = mysqli_fetch_assoc($consulta_slide);

    $texto_html_slide =  
    "<div id='carouselExampleControls' data-interval='5000' class='carousel slide' 
    data-ride='carousel'>
    <div class='carousel-inner'>
    <div class='carousel-item active'>
    <img class='d-block image-slide-fix' style='width: ".$width." !important; max-height: ".$height." !important; '  src='"  .$folder.$linha4['slide_1']. "' >
    </div> "; 

    for ($i = 2; $i <= $linha4["slide_tamanho"]; $i++) {
    $slide  = "slide_".$i;
    $texto_html_slide .=  "<div class='carousel-item'>
      <img class='d-block image-slide-fix' style='width: ".$width." !important; max-height: ".$height." !important;'   src='" .$folder.$linha4['slide_'.$i]. "'>
    </div>" ;
    }

    if ($linha4["slide_tamanho"] > 1) {
        echo "<style type='text/css'>   
    .carousel .carousel-control-next{ opacity: 0; transition: 0.5s all; }
    .carousel:hover .carousel-control-next{ opacity: 1; transition: 0.5s  all;  }
    .carousel .carousel-control-prev{ opacity: 0; transition: 0.5s  all; }
    .carousel:hover .carousel-control-prev{ opacity: 1; transition: 0.5s  all; } </style>";   
    } else {
         echo "<style type='text/css'>   
    .carousel .carousel-control-next{ opacity: 0; transition: 0.5s all; }
    .carousel .carousel-control-prev{ opacity: 0; transition: 0.5s  all; } </style>"; 
    }

    $texto_html_slide .=   "</div>
    <a class='carousel-control-prev'
    href='#carouselExampleControls' role='button' data-slide='prev'>
      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
      <span class='sr-only'>Anterior</span>
    </a>
    <a class='carousel-control-next' href='#carouselExampleControls' role'button' data-slide='next'>
      <span class='carousel-control-next-icon' aria-hidden='true'></span>
      <span class='sr-only'>Próximo</span>
    </a> 
    </div>";

    return $texto_html_slide;
    
    }   



function exibir_galeria($slide, $folder, $class){

//Passo 1 - Abrir conexao
$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 

$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

if($slide > 0) {
$slide = $slide;
} else {
$slide = $_GET["sl_id"];
}

// Consulta a Tabela Slides
    $consultar_slide = "SELECT * ";
    $consultar_slide .= "FROM slides ";
    $consultar_slide .= "WHERE  slide_id = $slide ";
    $consulta_slide = mysqli_query($conecta, $consultar_slide);
    if(!$consulta_slide) {
        die("");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }

    $linha4 = mysqli_fetch_assoc($consulta_slide);

    $texto_html_slide =  "<div class='row'>";

    for ($i = 1; $i <= $linha4["slide_tamanho"]; $i++) {
        $slide  = "slide_".$i;

        $texto_html_slide .=  "
        <div class='".$class."'>
        <a href='' class='d-block h-100'> 
        <img class='img-fluid img-thumbnail' src='" .$folder.$linha4['slide_'.$i]."'>
        </a>
        </div>" ;
        
    }

    $texto_html_slide .=  "</div>";
    return $texto_html_slide;
    
    }      


function exibir_card_grande($card, $folder, $caminho){

$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 
$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);


// Consulta a Tabela Slides
    $consultar_card_1 = "SELECT * ";
    $consultar_card_1 .= "FROM cards ";
    $consultar_card_1 .= "WHERE  card_id = {$card} ";
    $consultar_card_1 = mysqli_query($conecta, $consultar_card_1);
    $dados_card = mysqli_fetch_assoc($consultar_card_1); 
    $card_pagina = $dados_card['card_pagina_id'];              
    if(!$consultar_card_1) {
        die("</br>");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }


// Consulta a Tabela Slides
    $consultar_card = "SELECT * ";
    $consultar_card .= "FROM paginas_modulares ";
    $consultar_card .= "WHERE  pagina_modular_id = {$card_pagina} ";
    $consulta_card = mysqli_query($conecta, $consultar_card);
    if(!$consulta_card) {
        die("</br>");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }

    $linha5 = mysqli_fetch_assoc($consulta_card);

    $texto_html_card =  

    "<div class='col-sm-7 mb-4 mt-3 border-0'>
        <div class='card'>
          <img class='card-img-top imag-card' src='"  .$folder.$linha5['pagina_modular_imagem_capa']. "'>
          <div class='card-body'>
            <h6 class='card-title-sub'> " .date('d/m/Y', strtotime($linha5["data"])).  " </h6>
            <h5 class='card-title'>" .$linha5['pagina_modular_titulo']. "</h5>";

            if ($linha5['pagina_modular_categoria'] == 'midias' ) {
                $texto_html_card .=   "<a  target='_blank' href=' " .$linha5['pagina_modular_descricao']. " '> Saiba mais </a>";
            } else {
                $texto_html_card .= "<p class='card-text'> " .$linha5['pagina_modular_descricao']. " </p>";
                $texto_html_card .=  "<a  href=' " .$caminho.$linha5['pagina_modular_id']. " '> Saiba mais </a>";
            }


            $texto_html_card .= "
          </div>
        </div>
        </div>";

    return $texto_html_card;
    
    }   


function exibir_card($tipo, $id, $folder, $caminho){

$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 
$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);


if($tipo == "card") {
// Consulta a Tabela Slides
    $consultar_card_1 = "SELECT * ";
    $consultar_card_1 .= "FROM cards ";
    $consultar_card_1 .= "WHERE  card_id = {$id} ";
    $consultar_card_1 = mysqli_query($conecta, $consultar_card_1);
    $dados_card = mysqli_fetch_assoc($consultar_card_1); 
    $card_pagina = $dados_card['card_pagina_id'];              
    if(!$consultar_card_1) {
        die("");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }
// Consulta a Tabela Slides
    $consultar_card = "SELECT * ";
    $consultar_card .= "FROM paginas_modulares ";
    $consultar_card .= "WHERE  pagina_modular_id = {$card_pagina} ";
    $consulta_card = mysqli_query($conecta, $consultar_card);
    if(!$consulta_card) {
        die("");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }
} 

else if ($tipo == "modular") {
    $consultar_card = "SELECT * ";
    $consultar_card .= "FROM paginas_modulares ";
    $consultar_card .= "WHERE  pagina_modular_id = {$id} ";
    $consulta_card = mysqli_query($conecta, $consultar_card);
    if(!$consulta_card) {
        die("</br>");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }

}

else {}

    $linha5 = mysqli_fetch_assoc($consulta_card);

    $texto_html_card =  

    "<div class='col-sm-4 mb-4 border-0'>
        <div class='card'>";

            if ($linha5['pagina_modular_categoria'] == ("midias") or $linha5['pagina_modular_categoria'] == ("videos")) {
                $texto_html_card .=   "<a style='text-decoration: none;'  target='_blank' href=' " .$linha5['pagina_modular_descricao']. " '> ";

            } else  {
                $texto_html_card .=  "<a style='text-decoration: none;' target='_self' href=' " .$caminho.$linha5['pagina_modular_id']. " '> ";

            }

            $texto_html_card .= "<img class='card-img-top imag-card w-100' src='" .$folder.$linha5['pagina_modular_imagem_capa']. "'>
          <div class='card-body'>
            <h6 class='card-title-sub'> " .date('d/m/Y', strtotime($linha5["data"])).  "  </h6>
             <h5 class='card-title'>" .$linha5['pagina_modular_titulo']. "</h5>";

            $texto_html_card .= "
          </div>
        </a></div>
        </div>";

    return $texto_html_card;
    
    }   



function exibir_texto($tabela, $texto_id){

$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 
$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

if($texto_id > 0) {
$pagina_id = $texto_id;
} else {
$pagina_id = $_GET["pg_id"];
}

if ($tabela == "pagina_fixa") {
//Consulta a tabela usuarios
$pagina_info = "SELECT * ";
$pagina_info .= "FROM paginas_fixas ";
$pagina_info .= "WHERE pagina_id = {$pagina_id} ";
//ERRO
$info_pagina = mysqli_query($conecta, $pagina_info);
if(!$info_pagina) {
die(" Falha na Base de Dados! Function Pagina Fixa ");  
} else {
  echo "";
}
//DADOS
$dados_pagina = mysqli_fetch_assoc($info_pagina);        
$texto_html_pagina = base64_decode($dados_pagina["pagina_conteudo"]);
}  

else if ($tabela == "pagina_modular") {
//Consulta a tabela usuarios
$pagina_info = "SELECT * ";
$pagina_info .= "FROM paginas_modulares ";
$pagina_info .= "WHERE pagina_modular_id = {$pagina_id} ";
//ERRO
$info_pagina = mysqli_query($conecta, $pagina_info);
if(!$info_pagina) {
die(" Falha na Base de Dados! Function Pagina Modular ");  
} else {
  echo "";
}
//DADOS
$dados_pagina = mysqli_fetch_assoc($info_pagina);        
$texto_html_pagina = base64_decode($dados_pagina["pagina_modular_conteudo"]);
}  

else {}

return $texto_html_pagina;
   
}

function exibir_texto_2($tabela, $texto_id){

//Passo 1 - Abrir conexao
$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 
$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

if($texto_id > 0) {
$pagina_id = $texto_id;
} else {
$pagina_id = $_GET["pg_id"];
}

if ($tabela == "pagina_fixa") {
//Consulta a tabela usuarios
$pagina_info = "SELECT * ";
$pagina_info .= "FROM paginas_fixas ";
$pagina_info .= "WHERE pagina_id = {$pagina_id} ";
//ERRO
$info_pagina = mysqli_query($conecta, $pagina_info);
if(!$info_pagina) {
die(" Falha na Base de Dados! Function Pagina Fixa ");  
} else {
  echo "";
}
//DADOS
$dados_pagina = mysqli_fetch_assoc($info_pagina);        
$texto_html_pagina = base64_decode($dados_pagina["pagina_conteudo_2"]);
}  

else if ($tabela == "pagina_modular") {
//Consulta a tabela usuarios
$pagina_info = "SELECT * ";
$pagina_info .= "FROM paginas_modulares ";
$pagina_info .= "WHERE pagina_modular_id = {$pagina_id} ";
//ERRO
$info_pagina = mysqli_query($conecta, $pagina_info);
if(!$info_pagina) {
die(" Falha na Base de Dados! Function Pagina Modular ");  
} else {
  echo "";
}
//DADOS
$dados_pagina = mysqli_fetch_assoc($info_pagina);        
$texto_html_pagina = base64_decode($dados_pagina["pagina_modular_conteudo_2"]);
}  

else {}

return $texto_html_pagina;
   
}







?>