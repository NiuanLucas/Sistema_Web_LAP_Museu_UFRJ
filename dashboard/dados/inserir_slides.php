<?php require_once "../header_dashboard.php";  ?>

<?php
$mensagem1 = "";
$texto_slide = "";
$texto_var_slide = "";
//INSERIR NO BANCO DE DADOS
    if(isset($_POST["slide_descricao"])){
        $slide_descricao = $_POST["slide_descricao"];
        $slide_tamanho = $_POST["slide_tamanho"];


    for ($i = 1; $i <= $slide_tamanho; $i++) {

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

        $texto_slide .= ",slide_".$i."";
        $texto_var_slide .= ",'".$imagem_grande_upload[$i]."'";

    }

        $inserir = "INSERT INTO slides ";
        $inserir .= "(slide_tamanho,slide_descricao".$texto_slide." ) ";
        $inserir .= "VALUES ";
        $inserir .= "('$slide_tamanho','$slide_descricao'".$texto_var_slide." ) ";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
          die("Erro do Banco de Dados </br></br></br> " . $inserir . " </br></br></br> ");;
        } else {
            header("location: slides.php");
        }

    }


if(isset($_POST["tamanho"])){
        $tamanho = $_POST["tamanho"];
      }


?>


<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-images"></i> Inserir Slides</h3>
  <hr class="my-2">

<form class="mt-4" action="inserir_slides.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="input-group">
  <input required="" id="inputGroupSelect04"  type="number" min="1" max="15" name="tamanho" class="form-control" placeholder="Número de Imagens do Slide">
  <div class="input-group-append">
    <button type="submit" class="btn btn-outline-secondary bg-dark text-white" type="button"> Alterar Quantidade 
    </button>
  </div>
</div>
<small class="text-muted" > &nbsp;Selecione o número de imagens desejado, em seguida toque no botão ao lado, antes de avançar para a próxima etapa.</small>
</form>

</br>
<hr class="my-2">



<form class="mt-4" action="inserir_slides.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">



  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input required="" type="text" name="slide_descricao" class="form-control" placeholder="">
      <small class="text-muted mt-0 mb-3"> *Todas as Imagens devem ser no Formato JPG ou PNG. </br> *Tamanho máximo de arquivo 5MB.  </small>
  </div>  

  <div class="form-group d-none">
    <label required="" for="exampleFormControlInput1">Quantidade de Imagens</label>
    <input required="" value="<?php echo $tamanho; ?>"  type="number" min="1" max="15" name="slide_tamanho" class="form-control" placeholder="">
  </div>


    <?php
    for ($i = 1; $i <= $tamanho; $i++) {
    ?>

    <div class="form-group">
      <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
      <label class="mt-2">Imagem Slide #<?php echo $i; ?></label>
      <input  type="file"   accept="image/png, image/gif, image/jpeg" required="" name="upload_image_<?php echo $i; ?>" class="form-control-file">
      <small> <?php echo $mensagem1; ?> </small>
    </div>

    <?php
    }
    ?>

  <center>
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Inserir Slide </button>

  <a href='slides.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a> 
  </center>

</form>

    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>