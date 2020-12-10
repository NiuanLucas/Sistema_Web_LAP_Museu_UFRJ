<?php require_once "../header_dashboard.php";  ?>

<?php

// Consulta a Tabela Contato
    $tr7 = "SELECT * ";
    $tr7 .= "FROM paginas_modulares ";
    $tr7 .= "WHERE pagina_modular_categoria = 'producao_academica' ";
    $consulta_tr7 = mysqli_query($conecta, $tr7);
    if(!$consulta_tr7) {
        die("Falha na consulta ao banco Cards Header | Producao Academica");   
    }


 $mensagem1 = "";
//INSERIR NO BANCO DE DADOS
    if(isset($_POST["producao_academica_tipo"])){

        $producao_academica_categoria_id = $_POST["producao_academica_categoria_id"];
        $producao_academica_tipo = $_POST["producao_academica_tipo"];
        $producao_academica_titulo = $_POST["producao_academica_titulo"];
        $producao_academica_autores = $_POST["producao_academica_autores"];
        $producao_academica_ano = $_POST["producao_academica_ano"];
        $producao_academica_referencia = $_POST["producao_academica_referencia"];
        $producao_academica_link_arquivo   = $_POST["producao_academica_link_arquivo"];
        $producao_academica_link_referencia  = $_POST["producao_academica_link_referencia"];
 

        $inserir = "INSERT INTO producao_academica_ufrj ";
        $inserir .= "(producao_academica_categoria_id,producao_academica_tipo,producao_academica_titulo,producao_academica_autores,producao_academica_ano,producao_academica_referencia,producao_academica_link_arquivo,producao_academica_link_referencia ) ";

        $inserir .= "VALUES ";

        $inserir .= "('$producao_academica_categoria_id','$producao_academica_tipo','$producao_academica_titulo','$producao_academica_autores','$producao_academica_ano','$producao_academica_referencia','$producao_academica_link_arquivo','$producao_academica_link_referencia') ";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
          die("Erro do Banco de Dados </br></br></br> " . $inserir . " </br></br></br> ");;
        } else {
            header("location: producao_academica.php");
        }

    }

?>


<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-grip-horizontal"></i> Inserir Produção Acadêmica </h3>
  <hr class="my-2">

<form class="mt-4" action="inserir_producao_academica.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">


  <div class="form-group">
    <label for="exampleFormControlInput1"> Título </label>
    <input required="" type="text" name="producao_academica_titulo" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
  <label for="exampleFormControlInput1"> Selecionar Categoria </label>
  <select required="" class="form-control " name="producao_academica_categoria_id">
  <option selected=""  disabled=""> Selecionar Categoria </option>
  <?php while($linha4 = mysqli_fetch_assoc($consulta_tr7)) { ?>  
  <option value="<?php echo $linha4['pagina_modular_id']; ?>"> <?php echo $linha4['pagina_modular_titulo']; ?> </option>
  <?php } ?>
  </select>
  <small class="text-muted mt-0 mb-3"> *Para um novo objeto página ser exibido nas opções acima, deve ser criado antes deste card.  </small>
  </div>  

  <div class="form-group">
  <label for="exampleFormControlInput1">Selecionar Tipo</label>
  <select required="" class="form-control" name="producao_academica_tipo">
  <option selected=""  disabled=""> Selecionar Tipo </option>
  <option value="artigos"> Artigos </option>
  <option value="teses_dissertacoes"> Tese e Dissertações </option>
  </select><br>

  <div class="form-group">
    <label for="exampleFormControlInput1"> Autores </label>
    <input required="" type="text" name="producao_academica_autores" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1"> Ano </label>
    <input required="" type="number" name="producao_academica_ano" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1"> Referência </label>
    <input required="" type="text" name="producao_academica_referencia" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
    <label for="exampleFormControlInput1"> Link Arquivo </label>
    <input required="" type="text" name="producao_academica_link_arquivo" class="form-control" placeholder="">
  </div>  

  <div class="form-group">
    <label for="exampleFormControlInput1"> Link Referência </label>
    <input required="" type="text" name="producao_academica_link_referencia" class="form-control" placeholder="">
  </div>   

  </div>  

  <center>
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Inserir Produção Acadêmica </button>

  <a href='producao_academica.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a> 
  </center>

</form>

    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>