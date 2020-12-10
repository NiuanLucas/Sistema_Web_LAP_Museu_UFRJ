<?php require_once "../header_dashboard.php";  ?>

<?php
 $mensagem1 = "";
//INSERIR NO BANCO DE DADOS
    if(isset($_POST["card_nome"])){
        $card_nome = $_POST["card_nome"];
        $card_descricao = $_POST["card_descricao"];
        $card_pagina_id = $_POST["card_pagina_id"];

        $inserir = "INSERT INTO cards ";
        $inserir .= "(card_nome,card_descricao,card_pagina_id) ";
        $inserir .= "VALUES ";
        $inserir .= "('$card_nome','$card_descricao','$card_pagina_id') ";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
          die("Erro do Banco de Dados </br></br></br> " . $inserir . " </br></br></br> ");;
        } else {
            header("location: cards.php");
        }

    }

?>


<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-grip-horizontal"></i> Inserir Cards</h3>
  <hr class="my-2">

<form class="mt-4" action="inserir_cards.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

  <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input required="" type="text" name="card_nome" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input required="" type="text" name="card_descricao" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
  <label for="exampleFormControlInput1">Selecionar Página para ser Anexada</label>
  <select required="" class="form-control " name="card_pagina_id">
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
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Inserir Card </button>

  <a href='cards.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a> 
  </center>

</form>

    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>