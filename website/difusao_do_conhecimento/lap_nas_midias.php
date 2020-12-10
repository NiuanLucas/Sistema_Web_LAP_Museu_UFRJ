<?php require_once "../header.php";  ?>

<?php
    // Consulta a Tabela Paginas Modulares
    $tr2 = "SELECT * ";
    $tr2 .= "FROM paginas_modulares ";
    //$tr2 .= "WHERE pagina_modular_categoria = 'midias' ";
    $consulta_tr2 = mysqli_query($conecta, $tr2);
    if(!$consulta_tr2) {
        die("Falha na consulta ao banco Noticias | Home ");   
    }
?>


<style type="text/css" media="screen">

div#card_pagina .card-title {
	font-size: 16px !important;
}


@media only screen and (max-width: 400px) {
    .pa{line-height: 100% !important;}
}

@media only screen and (min-device-width: 768px){
    .pa{line-height: 35% !important;}	

</style>


<div class="container mt-0 mb-4"></br>
  <div class="row ">

    <div class="col-sm-12">
    <h1><b> LAP na Mídia </b></h1>

    <h3 class="border-bottom mt-4"><b> Reportagens, colunas e artigos </b></h3>
      <div class="row mt-4" id="card_pagina">   
      <?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>
      <?php if ( $linha["pagina_modular_categoria"] == "midias"  ) {  ?>

      <?php echo( exibir_card( "modular", $linha["pagina_modular_id"], '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>

      <?php } ?>
      <?php } ?>
      </div>

    <?php

          // Consulta a Tabela Paginas Modulares
          $tr2 = "SELECT * ";
          $tr2 .= "FROM paginas_modulares";
          $consulta_tr2 = mysqli_query($conecta, $tr2);
          if(!$consulta_tr2) {
              die("Falha na consulta ao banco Paginas Modulares Header | Paginas Modulares");   
          }

    ?>

    <h3 class="border-bottom mt-4"><b> Vídeos </b></h3>
      <div class="row mt-4" id="card_pagina">   
      <?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>
      <?php if ( $linha["pagina_modular_categoria"] == "videos"  ) {  ?>

      <?php echo( exibir_card( "modular", $linha["pagina_modular_id"], '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>

      <?php } ?>
      <?php } ?>
      </div>

    </div>

	</div>
</div>


<?php require_once "../footer.php";  ?>