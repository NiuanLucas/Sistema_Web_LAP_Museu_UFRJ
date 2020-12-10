<?php require_once "../header_dashboard.php";  ?>


<?php

$mensagem1 = "";
$texto_slide = "";
$texto_var_slide = "";
$texto_final = "";
//INSERIR NO BANCO DE DADOS
    if(isset($_POST["slide_descricao"])){
        $slide_id = $_POST["slide_id"];
        $slide_descricao = $_POST["slide_descricao"];
        $slide_tamanho = $_POST["slide_tamanho"];




        for ($i = 1; $i <= $slide_tamanho; $i++) {
        $pagina_modular_imagem_capa = $_POST["pagina_modular_imagem_capa_".$i];

        if ($_FILES['upload_image_'.$i]['tmp_name'] != null) {
        $diretorio = "images_capas";
        $arquivo_temporario = $_FILES['upload_image_'.$i] ['tmp_name'];
        $arquivo = basename($_FILES['upload_image_'.$i] ['name']);
        $imagem_grande = $arquivo;
        $imagem_grande_upload[$i] = $diretorio."/".$imagem_grande;
        if(move_uploaded_file($arquivo_temporario, $diretorio."/".$arquivo)) {
        $mensagem1 = "SUCESSO - Upload de Arquivo Realizado. (" .$arquivo. ")";
        } else {
        $mensagem1 = "ERRO - Falha no Upload de Arquivo. (" .$arquivo. ")";
        }

                // Não Existe Nova imagem, manter imagem antiga 
        } else {
        $imagem_grande_upload[$i] = $pagina_modular_imagem_capa; 
        }

        $texto_slide .= ", slide_".$i."";
        $texto_var_slide .= "'".$imagem_grande_upload[$i]."'";
        $texto_final .=  $texto_slide. " = " .$texto_var_slide;
        $texto_slide = "";
        $texto_var_slide = "";
      }

    
        $atualizar = "UPDATE slides ";
        $atualizar .= "SET ";
        $atualizar .= "slide_tamanho = '{$slide_tamanho}' ";
        $atualizar .= ", slide_descricao = '{$slide_descricao}' ";

        $atualizar .= "" .$texto_final. " ";

        $atualizar .= "WHERE  slide_id = {$slide_id} ";

        $operacao_atualizar = mysqli_query($conecta, $atualizar);
        if(!$operacao_atualizar){
            die("Erro na Atualização do Banco de Dados </br></br></br> " .$atualizar. " </br></br></br> ");
        } else  {
            header("Location: slides.php");
                }

        }

        if( isset($_GET["slide_id"]) ){
        $slide_id = $_GET["slide_id"];
        } else {
           header("Location: slides.php");
        }

        //Consulta a tabela usuarios
        $pagina_alterar = "SELECT * ";
        $pagina_alterar .= "FROM slides ";
        $pagina_alterar .= "WHERE slide_id = {$slide_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_alterar);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Alterar Slides </br></br> " .$pagina_alterar);  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina);              

?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-images"></i> Alterar Slides</h3>
  <hr class="my-2">

<form class="mt-4" action="alterar_slides.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">ID</label>
    <input required="" value="<?php echo $dados_pagina['slide_id']; ?>" type="text" name="slide_id" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input required="" value="<?php echo $dados_pagina['slide_descricao']; ?>" type="text" name="slide_descricao" class="form-control" placeholder="">
  </div>  

  <div class="form-group d-none">
    <label required="" for="exampleFormControlInput1">Quantidade de Imagens</label>
    <input required="" value="<?php echo $dados_pagina['slide_tamanho']; ?>"  type="number" min="1" max="15" name="slide_tamanho" class="form-control" placeholder="">
  </div>


    <?php
    for ($i = 1; $i <= $dados_pagina['slide_tamanho']; $i++) {
    ?>

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Image Folder</label>
    <input required value="<?php echo $dados_pagina['slide_'.$i]; ?>" type="text" name="pagina_modular_imagem_capa_<?php echo $i ?>" class="form-control" placeholder="">
  </div>

    <div class="form-group">
      <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
      <label class="mt-2">Imagem Slide #<?php echo $i; ?></label>
      <input  type="file" name="upload_image_<?php echo $i; ?>" class="form-control-file">
      <small> <?php echo $mensagem1; ?> </small>
    </div>

    <?php
    }
    ?>

  <center>
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Alterar Slide </button>

  <a href='slides.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a> 
  </center>

</form>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>