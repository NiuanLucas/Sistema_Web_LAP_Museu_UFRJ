<?php require_once "../header_dashboard.php";  ?>


<?php

 $mensagem1 = "";
   //UPDATE TABLE
    if(isset($_POST["pagina_modular_id"])){
    	$pagina_modular_id = $_POST["pagina_modular_id"];
        $pagina_modular_titulo = $_POST["pagina_modular_titulo"];
        $pagina_modular_conteudo = base64_encode($_POST["pagina_modular_conteudo"]);
        $pagina_modular_conteudo_2 = base64_encode($_POST["pagina_modular_conteudo_2"]);
        $pagina_modular_categoria = $_POST["pagina_modular_categoria"];
        $pagina_modular_descricao = $_POST["pagina_modular_descricao"];
        $data = $_POST["data"];

        if ( isset($_POST["pagina_modular_slide"]) ) {
          $pagina_modular_slide = $_POST["pagina_modular_slide"];
        } else {
          $pagina_modular_slide = $_POST["pagina_modular_slide_old"];
        }
        
        $pagina_modular_imagem_capa2 = $_POST["pagina_modular_imagem_capa"];
        $pagina_modular_palavras_chaves = $_POST["pagina_modular_palavras_chaves"];

        //Existe Nova imagem, logo faça o upload 
        if ($_FILES['upload_image']['tmp_name'] != null) {
        $diretorio1 = "images_capas";
        $arquivo_temporario1 = $_FILES['upload_image'] ['tmp_name'];
        $arquivo1 = basename($_FILES['upload_image'] ['name']);
        $imagem_grande = $arquivo1;
        $imagem_grande_upload = $diretorio1."/".$imagem_grande;
        if(move_uploaded_file($arquivo_temporario1, $diretorio1."/".$arquivo1)) {
        $mensagem1 = "SUCESSO - Upload de Arquivo Realizado. (" .$arquivo1. ")";
        } else {
        $mensagem1 = "ERRO - Falha no Upload de Arquivo. (" .$arquivo1. ")";
        }

        // Não Existe Nova imagem, manter imagem antiga 
        } else {
        $imagem_grande_upload = $pagina_modular_imagem_capa2; 
        }

        
        $atualizar = "UPDATE paginas_modulares ";
        $atualizar .= "SET ";
        $atualizar .= "pagina_modular_id = '{$pagina_modular_id}', ";
        $atualizar .= "pagina_modular_titulo = '{$pagina_modular_titulo}', ";
        $atualizar .= "pagina_modular_conteudo = '{$pagina_modular_conteudo}', ";
        $atualizar .= "pagina_modular_conteudo_2 = '{$pagina_modular_conteudo_2}', ";
        $atualizar .= "pagina_modular_categoria = '{$pagina_modular_categoria}', ";
        $atualizar .= "pagina_modular_descricao = '{$pagina_modular_descricao}', ";
        $atualizar .= "pagina_modular_slide = '{$pagina_modular_slide}', ";
        $atualizar .= "pagina_modular_palavras_chaves = '{$pagina_modular_palavras_chaves}', ";
        $atualizar .= "data = '{$data}', ";
        $atualizar .= "pagina_modular_imagem_capa = '{$imagem_grande_upload}' ";

        $atualizar .= "WHERE  pagina_modular_id = {$pagina_modular_id} ";

        $operacao_atualizar = mysqli_query($conecta, $atualizar);
        if(!$operacao_atualizar){
            die("Erro na Atualização do Banco de Dados </br></br></br> " . $_FILES['upload_image']['tmp_name'] . " </br></br></br> ");
        } else  {
            header("Location:paginas_modulares.php");
                }

        }

        if( isset($_GET["pg_id"]) ){
        $pagina_modular_id = $_GET["pg_id"];
        } else {
           header("Location:paginas_modulares.php");
        }

        //Consulta a tabela usuarios
        $pagina_alterar = "SELECT * ";
        $pagina_alterar .= "FROM paginas_modulares ";
        $pagina_alterar .= "WHERE pagina_modular_id = {$pagina_modular_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_alterar);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Alterar Paginas M </br></br> " .$pagina_alterar);  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina);              

?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-scroll"></i> Alterar páginas modulares</h3>
  <hr class="my-2">


<form class="mt-4" action="alterar_paginas_modulares.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

	<div class="form-group d-none">
    <label for="exampleFormControlInput1">Página ID</label>
    <input required type="text" name="pagina_modular_id" value="<?php echo $dados_pagina['pagina_modular_id']; ?>" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Título</label>
    <input required type="text" name="pagina_modular_titulo" value="<?php echo $dados_pagina['pagina_modular_titulo']; ?>" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input required type="text"  value="<?php echo $dados_pagina['pagina_modular_descricao']; ?>" name="pagina_modular_descricao" class="form-control" placeholder="">
    <small class="text-muted mt-0 mb-3"> *Caso seja uma página para a secção "LAP nas mídias", colocar o link externo desejado acima (no campo descrição). </small>
  </div>  


  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Categoria</label>
    <input required type="text"  value="<?php echo $dados_pagina['pagina_modular_categoria']; ?>" name="pagina_modular_categoria" class="form-control" placeholder="">
  </div>  

  <div class="form-group">
  <label for="exampleFormControlInput1">Selecionar Slide Anexado</label>
  <select class="form-control " name="pagina_modular_slide">
  <option selected=""  disabled="">Selecionar Escolher Slide</option>
  <option value=" "> 0 - (Escolha essa opção para uma Página sem Slide)</option>
  <?php while($linha4 = mysqli_fetch_assoc($consulta_tr4)) { ?>  
  <option value="<?php echo $linha4['slide_id']; ?>"> <?php echo $linha4['slide_descricao']; ?> </option>
  <?php } ?>
  </select>
  <small class="text-muted mt-0 mb-3"> *Para um novo objeto slide ser exibido nas opções acima, deve ser criado antes desta página.  </small>
  </div> 


    <div class="form-group d-none">
    <label for="exampleFormControlInput1">Slide ID</label>
    <input value="<?php echo $dados_pagina['pagina_modular_slide']; ?>" type="text" name="pagina_modular_slide_old" class="form-control" placeholder="">
  </div>

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Image Folder</label>
    <input required value="<?php echo $dados_pagina['pagina_modular_imagem_capa']; ?>" type="text" name="pagina_modular_imagem_capa" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Palavras Chave</label>
    <input required value="<?php echo $dados_pagina['pagina_modular_palavras_chaves']; ?>" type="text" name="pagina_modular_palavras_chaves" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Data</label>
    <input required value="<?php echo $dados_pagina['data']; ?>" type="date" name="data" class="form-control" placeholder="">
  </div>  


  <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
    <label for="exampleFormControlFile1">Imagem de Capa</label>
    <input type="file"  name="upload_image" class="form-control-file">
    <small> <?php echo $mensagem1; ?> </small>
  </div>

  <div class="form-group panel-body">
    <label for="exampleFormControlTextarea1">Texto 1 (ao lado do slide/imagem)</label>
    <textarea required  class="form-control ckeditor" name="pagina_modular_conteudo" id="pagina_modular_conteudo" rows="5"><?php echo base64_decode($dados_pagina['pagina_modular_conteudo']); ?></textarea>
  </div>

  <div class="form-group panel-body">
    <label for="exampleFormControlTextarea1">Texto 2 (parte inferior)</label>
    <textarea required  class="form-control ckeditor" name="pagina_modular_conteudo_2" id="pagina_modular_conteudo_2" rows="5"><?php echo base64_decode($dados_pagina['pagina_modular_conteudo_2']); ?></textarea>
  </div>

      <script>
     CKEDITOR.replace( 'pagina_modular_conteudo', {
      height: 300,
      filebrowserUploadUrl: "upload.php"
     });
    </script>


      <script>
     CKEDITOR.replace( 'pagina_modular_conteudo_2', {
      height: 300,
      filebrowserUploadUrl: "upload.php"
     });
    </script>

  <center>

  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Alterar dados da página </button>  

  <a href='paginas_modulares.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a>  

  </center>

</form>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>