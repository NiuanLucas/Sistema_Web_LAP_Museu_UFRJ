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
    <div class="row">

        <div class="col-sm-6">
            <?php echo( exibir_texto('pagina_modular', 0 ) );  ?> 
        </div>

        <div class="col-sm-6 mt-sm-5 mb-4">
         <?php echo( exibir_slide( $dados_pagina["pagina_modular_slide"], '../../dashboard/dados/', '100%', '270') ); ?>
        </div>

        <div class="col-sm-12 mb-4 mt-4">
            <?php echo( exibir_texto_2('pagina_modular', 0 ) );  ?> 
        </div>


        <div class="col-sm-6">
            <br><hr>
            <a class="mt-0" href="projetos.php?pg_id=15"> 
            <i class="fas fa-arrow-left"></i> Voltar 
            </a>
        </div>

    </div>
</div>

<?php require_once "../footer.php";  ?>