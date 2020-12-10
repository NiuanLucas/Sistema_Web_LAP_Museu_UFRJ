<?php require_once "../header.php";  ?>

<?php
        if( isset($_GET["pg_id"]) ){
        $pagina_id = $_GET["pg_id"];
        } else {
          $pagina_id = 2;
        }

        //Consulta a tabela usuarios
        $pagina_info = "SELECT * ";
        $pagina_info .= "FROM paginas_modulares ";
        $pagina_info .= "WHERE pagina_modular_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_info);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Header Pagina Modular ");  
        } else {
          echo "<br>";

        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina); 
?>

<div class="container">

  <div class="row">
    <div class="col col-sm-8 p-4 mt-0">
    <img src="../../dashboard/dados/<?php echo $dados_pagina['pagina_modular_imagem_capa'] ?>" width="100%" height="270" class="image-slide-fix rounded-0 mb-4">
    <?php echo base64_decode($dados_pagina["pagina_modular_conteudo"]); ?>
    <br><hr><a class="mt-4" href="lap_nas_midias.php"> <i class="fas fa-arrow-left"></i> Voltar </a>
    </div>
  </div>

</div>

<?php require_once "../footer.php";  ?>