<?php require_once "../header_dashboard.php";  ?>


<?php


   //UPDATE TABLE
    if(isset($_POST["pagina_id"])){
        $pagina_id = $_POST["pagina_id"];
        $pagina_titulo = $_POST["pagina_titulo"];
        $pagina_conteudo = base64_encode($_POST["pagina_conteudo"]);
        $pagina_descricao = $_POST["pagina_descricao"];
        $pagina_palavras_chaves = $_POST["pagina_palavras_chaves"];

        $atualizar = "UPDATE paginas_fixas ";
        $atualizar .= "SET ";
        $atualizar .= "pagina_id = '{$pagina_id}', ";
        $atualizar .= "pagina_titulo = '{$pagina_titulo}', ";
        $atualizar .= "pagina_conteudo = '{$pagina_conteudo}', ";
        $atualizar .= "pagina_descricao = '{$pagina_descricao}', ";
        $atualizar .= "pagina_palavras_chaves = '{$pagina_palavras_chaves}' ";

        $atualizar .= "WHERE  pagina_id = {$pagina_id} ";

        $operacao_atualizar = mysqli_query($conecta, $atualizar);
        if(!$operacao_atualizar){
            die("Erro na Atualização do Banco de Dados </br></br></br> " . $atualizar . " </br></br></br> ");
        } else  {
            header("Location: paginas_fixas.php");
                }

        }

        if( isset($_GET["pg_id"]) ){
        $pagina_id = $_GET["pg_id"];
        } else {
           //header("Location: paginas_fixas.php");
        }

        //Consulta a tabela usuarios
        $pagina_alterar = "SELECT * ";
        $pagina_alterar .= "FROM paginas_fixas ";
        $pagina_alterar .= "WHERE pagina_id = {$pagina_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_alterar);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Alterar Paginas F");  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina);              

?>


<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-file"></i> Alterar páginas fixas</h3>
  <hr class="my-2">

<form class="mt-4" action="alterar_paginas_fixas.php" method="post" accept-charset="utf-8">

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Pagina ID</label>
    <input type="text" value="<?php echo $dados_pagina['pagina_id']; ?>" name="pagina_id" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Título</label>
    <input type="text" required="" value="<?php echo $dados_pagina['pagina_titulo']; ?>" name="pagina_titulo" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input type="text"required="" value="<?php echo $dados_pagina['pagina_descricao']; ?>"   name="pagina_descricao" class="form-control" placeholder="">
  </div>  

  <div class="form-group">
    <label for="exampleFormControlInput1">Palavras Chave</label>
    <input type="text" required="" value="<?php echo $dados_pagina['pagina_palavras_chaves']; ?>" name="pagina_palavras_chaves" class="form-control" placeholder="">
  </div>

  <div class="form-group panel-body">
    <label for="exampleFormControlTextarea1">Conteudo</label>
    <textarea required="" class="form-control ckeditor" name="pagina_conteudo" id="pagina_conteudo" rows="5"><?php echo base64_decode($dados_pagina['pagina_conteudo']); ?></textarea>
  </div>

      <script>
     CKEDITOR.replace( 'pagina_conteudo', {
      height: 300,
      filebrowserUploadUrl: "upload.php"
     });
    </script>

  <center>

  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Alterar dados da página </button>  

  <a href='paginas_fixas.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a>  

  </center>

</form>


    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>