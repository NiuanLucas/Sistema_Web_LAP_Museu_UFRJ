<?php require_once "../header.php";  ?>

<?php

$contador_artigo = 0;
$contador_tese = 0;

        if( isset($_GET["pg_id"]) ){
        $pagina_id = $_GET["pg_id"];
        } else {
          $pagina_id = 2;
        }

        //Consulta a tabela usuarios
        $consulta_artigo =  "SELECT * ";
        $consulta_artigo .= "FROM producao_academica_ufrj ";
        $consulta_artigo .= "WHERE producao_academica_categoria_id = {$pagina_id} ";
        $consulta_artigo .= "AND producao_academica_tipo = 'artigos' ";

        //Consulta a tabela usuarios
        $consulta_tese =  "SELECT * ";
        $consulta_tese .= "FROM producao_academica_ufrj ";
        $consulta_tese .= "WHERE producao_academica_categoria_id = {$pagina_id} ";
        $consulta_tese .= "AND producao_academica_tipo = 'teses_dissertacoes' ";

        //Consulta a tabela usuarios
        $pagina_info =  "SELECT * ";
        $pagina_info .= "FROM producao_academica_ufrj ";
        $pagina_info .= "WHERE producao_academica_categoria_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_info);
        $consulta_artigo = mysqli_query($conecta, $consulta_artigo);
        $consulta_tese = mysqli_query($conecta, $consulta_tese);

        $contador_artigo = mysqli_num_rows($consulta_artigo);
        $contador_tese = mysqli_num_rows($consulta_tese);


        if(!$info_pagina) {
        die(" Falha na Base de Dados! Header Produção Academica: " .$info_pagina);  
        } else {
          echo "";

        }
?>

<style type="text/css" media="screen">

div#producao a,td {
	font-size: 12px !important;
	line-height: 100% !important;
    margin: 0px !important;
    padding: 5px !important; 
    overflow: hidden !important; 
}


@media only screen and (max-width: 400px) {
    .pa{line-height: 100% !important;}
}

@media only screen and (min-device-width: 768px){
    .pa{line-height: 35% !important;}	

</style>

<div class="container mt-0 mb-4" id="producao"></br>


    <div class="row">
        <div class="col-sm-12">

<?php if ($contador_artigo > 0) { ?>
  
        <h1><b> Artigos <?php //echo $contador_artigo; ?> </b></h1>



        <?php
        //Consulta a tabela usuarios
        $pagina_info =  "SELECT * ";
        $pagina_info .= "FROM producao_academica_ufrj ";
        $pagina_info .= "WHERE producao_academica_categoria_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_info);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Header Produção Academica: " .$info_pagina);  
        } else {
          echo "";

        }
        ?>


        <table class="table table-striped table-responsive mt-4 mb-4">
          <thead>
            <tr class="bg-dark text-white">
              <th scope="col">TÍTULO</th>
              <th scope="col">AUTORES</th>
              <th scope="col">ANO</th>
              <th scope="col">REFERÊNCIA</th>
            </tr>
          </thead>
          <tbody>
        <?php while(  $linha = mysqli_fetch_assoc($info_pagina)  ) { ?> 
        <?php if ( $linha["producao_academica_tipo"] == "artigos"  ) { ?> 
            <tr>
            <td><b><a target="_blank" href="<?php echo $linha["producao_academica_link_arquivo"] ?>">
            <?php echo $linha["producao_academica_titulo"] ?> </a></b></td>
              <td><?php echo $linha["producao_academica_autores"] ?></td>
              <td><?php echo $linha["producao_academica_ano"] ?></td>
            <td><b><a target="_blank" href="<?php echo $linha["producao_academica_link_referencia"] ?>"><?php echo $linha["producao_academica_referencia"] ?> </a></b></td>
            </tr> 
        <?php } } ?> 
          </tbody>
        </table>


<?php } ?>        


        <?php
        //Consulta a tabela usuarios
        $pagina_info =  "SELECT * ";
        $pagina_info .= "FROM producao_academica_ufrj ";
        $pagina_info .= "WHERE producao_academica_categoria_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_info);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Header Produção Academica: " .$info_pagina);  
        } else {
          echo "";

        }
        ?>   


<?php if ($contador_tese > 0) { ?>

        <h1><b> Teses e Dissertações <?php //echo $contador_tese; ?> </b></h1>
        <table class="table table-striped table-responsive mt-4 mb-4">
          <thead>
            <tr class="bg-dark text-white">
              <th scope="col">TÍTULO</th>
              <th scope="col">AUTORES</th>
              <th scope="col">ANO</th>
              <th scope="col">REFERÊNCIA</th>
            </tr>
          </thead>
          <tbody>
        <?php while(  $linha = mysqli_fetch_assoc($info_pagina)  ) { ?>
        <?php if ( $linha["producao_academica_tipo"] == "teses_dissertacoes"  ) { ?>  
            <tr>
            <td><b><a target="_blank" href="<?php echo $linha["producao_academica_link_arquivo"] ?>">
            <?php echo $linha["producao_academica_titulo"] ?> </a></b></td>
              <td><?php echo $linha["producao_academica_autores"] ?></td>
              <td><?php echo $linha["producao_academica_ano"] ?></td>
            <td><b><a target="_blank" href="<?php echo $linha["producao_academica_link_referencia"] ?>"><?php echo $linha["producao_academica_referencia"] ?> </a></b></td>
            </tr>
        <?php } } ?> 
          </tbody>
        </table>

<?php } ?>

        </div>        
    </div>
</div>

<?php require_once "../footer.php";  ?>