<?php require_once "../header_dashboard.php";  ?>

<?php
 $mensagem1 = "";
//INSERIR NO BANCO DE DADOS
    if(isset($_POST["pagina_modular_titulo"])){
        $pagina_modular_titulo = $_POST["pagina_modular_titulo"];
        $pagina_modular_conteudo = base64_encode($_POST["pagina_modular_conteudo"]);
        $pagina_modular_conteudo_2 = base64_encode($_POST["pagina_modular_conteudo_2"]);
        $pagina_modular_categoria = $_POST["pagina_modular_categoria"];
        $pagina_modular_descricao = $_POST["pagina_modular_descricao"];
        $pagina_modular_palavras_chaves = $_POST["pagina_modular_palavras_chaves"];
        $pagina_modular_slide = $_POST["pagina_modular_slide"];
        $data = $_POST["data"];

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

        $inserir = "INSERT INTO paginas_modulares ";
        $inserir .= "(pagina_modular_titulo,pagina_modular_conteudo,pagina_modular_conteudo_2,pagina_modular_categoria,pagina_modular_descricao,pagina_modular_palavras_chaves,pagina_modular_slide,data,pagina_modular_imagem_capa) ";
        $inserir .= "VALUES ";
        $inserir .= "('$pagina_modular_titulo','$pagina_modular_conteudo','$pagina_modular_conteudo_2','$pagina_modular_categoria','$pagina_modular_descricao','$pagina_modular_palavras_chaves','$pagina_modular_slide','$data','$imagem_grande_upload') ";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
          die("Erro do Banco de Dados </br></br></br> " . $inserir . " </br></br></br> ");;
        } else {
            header("location:paginas_modulares.php");
        }

    }

?>


<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-scroll"></i> Inserir páginas modulares</h3>
  <hr class="my-2">

<form class="mt-4" action="inserir_paginas_modulares.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

  <div class="form-group">
    <label for="exampleFormControlInput1">Título</label>
    <input required="" type="text" name="pagina_modular_titulo" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input required="" type="text" name="pagina_modular_descricao" class="form-control" placeholder="">
      <small class="text-muted mt-0 mb-3"> *Caso seja uma página para a secção "LAP nas mídias", colocar o link externo desejado acima (no campo descrição). </small>
  </div> 

  <div class="form-group">
  <label for="exampleFormControlInput1">Selecionar Slide Anexado</label>
  <select required="" class="form-control " name="pagina_modular_slide">
  <option selected=""  disabled="">Selecionar Escolher Slide</option>
  <option value=" "> 0 - (Escolha esta opção para uma Página sem Slide)</option>
  <?php while($linha4 = mysqli_fetch_assoc($consulta_tr4)) { ?>  
  <option value="<?php echo $linha4['slide_id']; ?>"> <?php echo $linha4['slide_descricao']; ?> </option>
  <?php } ?>
  </select>
  <small class="text-muted mt-0 mb-3"> *Para um novo objeto slide ser exibido nas opções acima, deve ser criado antes desta página.  </small>
  </div>  


  <div class="form-group">
  <label for="exampleFormControlInput1">Categoria</label>
  <select required="" class="form-control mb-3" name="pagina_modular_categoria">
  <option selected=""  disabled="">Selecionar Categoria</option>
  <option value="noticias">Noticias</option>
  <option value="eventos">Eventos</option>
  <option value="projetos">Projetos</option>
  <option value="especialidades">Especialidades</option>
  <option value="midias">LAP nas Mídias</option>
  <option value="videos">Vídeos</option>
  <option value="linhas_de_pesquisa">Linhas de Pesquisa</option>
  <option value="producao_academica">Produção Acadêmica</option>
  </select>
  </div>

  <div class="form-group">
    <label required="" for="exampleFormControlInput1">Palavras Chave</label>
    <input type="text" name="pagina_modular_palavras_chaves" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label required="">Data</label>
    <input type="date" name="data" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
    <label for="exampleFormControlFile1">Imagem de Capa</label>
    <input  type="file" required="" name="upload_image" class="form-control-file">
    <small> <?php echo $mensagem1; ?> </small>
  </div>

  <div class="form-group panel-body">
    <label for="exampleFormControlTextarea1">Texto 1 (ao lado do slide/imagem)</label>
    <textarea  required="" class="form-control ckeditor" name="pagina_modular_conteudo" rows="5"></textarea>
  </div>

    <div class="form-group panel-body">
    <label for="exampleFormControlTextarea1">Texto 2 (parte inferior)</label>
    <textarea  required="" class="form-control ckeditor" name="pagina_modular_conteudo_2" rows="5"></textarea>
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
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Inserir página modular </button>

  <a href='paginas_modulares.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a> 
  </center>

</form>

    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>