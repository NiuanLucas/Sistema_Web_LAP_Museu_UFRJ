<?php require_once "../header.php";  ?>

<?php

        //Consulta a tabela usuarios
        $pagina_info = "SELECT * ";
        $pagina_info .= "FROM paginas_modulares ";
        $pagina_info .= "WHERE pagina_modular_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_info);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Header Pagina Modular ");  
        } else {
          echo "";

        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina); 
?>


<div class="container mt-0 mb-4"></br>
    <div class="row ">

        <div class="col col-sm-6">
        <!--<img src="../../dashboard/dados/<?php //echo $dados_pagina['pagina_modular_imagem_capa'] ?>" width="100%" height="270" class="image-slide-fix rounded-0 mb-4"> -->
        <?php echo base64_decode($dados_pagina["pagina_modular_conteudo"]); ?>
        <br><hr><a class="mt-4" href="projetos.php"> <i class="fas fa-arrow-left"></i> Voltar </a>
        </div>

        <div class="col col-sm-6 p-4">
         <?php echo( exibir_slide( $dados_pagina["pagina_modular_slide"], '../../dashboard/dados/', '100%', '270') ); ?>
        </div>
    </div>

</div>

<?php require_once "../footer.php";  ?>