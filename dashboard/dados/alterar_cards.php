<?php require_once "../header_dashboard.php";  ?>


<?php

 $mensagem1 = "";
   //UPDATE TABLE
    if(isset($_POST["card_id"])){
        $card_id= $_POST["card_id"];
        $card_nome = $_POST["card_nome"];
        $card_descricao = $_POST["card_descricao"];
        $card_pagina_id = $_POST["card_pagina_id"];

        $atualizar = "UPDATE cards ";
        $atualizar .= "SET ";
        $atualizar .= "card_id = '{$card_id}', ";
        $atualizar .= "card_nome = '{$card_nome}', ";
        $atualizar .= "card_descricao = '{$card_descricao}', ";
        $atualizar .= "card_pagina_id = '{$card_pagina_id}' ";


        $atualizar .= "WHERE  card_id = {$card_id} ";

        $operacao_atualizar = mysqli_query($conecta, $atualizar);
        if(!$operacao_atualizar){
            die("Erro na Atualização do Banco de Dados </br></br></br> " . $atualizar. " </br></br></br> ");
        } else  {
            header("Location: cards.php");
                }

        }

        if( isset($_GET["pg_id"]) ){
        $card_id = $_GET["pg_id"];
        } else {
           header("Location: cards.php");
        }

        //Consulta a tabela usuarios
        $pagina_alterar = "SELECT * ";
        $pagina_alterar .= "FROM cards ";
        $pagina_alterar .= "WHERE card_id = {$card_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_alterar);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Alterar Paginas Cards </br></br> " .$pagina_alterar);  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina);              

?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-grip-horizontal"></i> Alterar Card</h3>
  <hr class="my-2">


<form class="mt-4" action="alterar_cards.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

   <div class="form-group d-none">
    <label for="exampleFormControlInput1">Card ID</label>
    <input required="" type="text" name="card_id"  value="<?php echo $dados_pagina['card_id']; ?>" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input required="" type="text" name="card_nome"  value="<?php echo $dados_pagina['card_nome']; ?>" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input required="" type="text" name="card_descricao" value="<?php echo $dados_pagina['card_descricao']; ?>" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
  <label for="exampleFormControlInput1">Selecionar Página para ser Anexada</label>
  <select required class="form-control " name="card_pagina_id">
  <option selected=""  disabled="">Selecionar Escolher Página </option>
  <?php while($linha4 = mysqli_fetch_assoc($consulta_tr2)) { ?>  
  <option value="<?php echo $linha4['pagina_modular_id']; ?>"> <?php echo $linha4['pagina_modular_titulo']; ?> </option>
  <?php } ?>
  </select>
  <small class="text-muted mt-0 mb-3"> *Para um novo objeto página ser exibido nas opções acima, deve ser criado antes deste card.  </small>
  </div> 

  
      <script>
     CKEDITOR.replace( 'pagina_modular_conteudo', {
      height: 300,
      filebrowserUploadUrl: "upload.php"
     });
    </script>

  <center>

  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Alterar dados do Card </button>  

  <a href='cards.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a>  

  </center>

</form>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>