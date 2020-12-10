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
   //UPDATE TABLE
    if(isset($_POST["producao_academica_id"])){

        $producao_academica_id = $_POST["producao_academica_id"];
        $producao_academica_categoria_id = $_POST["producao_academica_categoria_id"];
        $producao_academica_tipo = $_POST["producao_academica_tipo"];
        $producao_academica_titulo = $_POST["producao_academica_titulo"];
        $producao_academica_autores = $_POST["producao_academica_autores"];
        $producao_academica_ano = $_POST["producao_academica_ano"];
        $producao_academica_referencia = $_POST["producao_academica_referencia"];
        $producao_academica_link_arquivo   = $_POST["producao_academica_link_arquivo"];
        $producao_academica_link_referencia  = $_POST["producao_academica_link_referencia"];
 

        $atualizar = "UPDATE producao_academica_ufrj ";
        $atualizar .= "SET ";
        $atualizar .= "producao_academica_id = '{$producao_academica_id}', ";
        $atualizar .= "producao_academica_categoria_id = '{$producao_academica_categoria_id}', ";
        $atualizar .= "producao_academica_tipo = '{$producao_academica_tipo}', ";
        $atualizar .= "producao_academica_titulo = '{$producao_academica_titulo}', ";
        $atualizar .= "producao_academica_autores = '{$producao_academica_autores}', ";
        $atualizar .= "producao_academica_ano = '{$producao_academica_ano}', ";
        $atualizar .= "producao_academica_referencia = '{$producao_academica_referencia}', ";
        $atualizar .= "producao_academica_link_arquivo = '{$producao_academica_link_arquivo}', ";
        $atualizar .= "producao_academica_link_referencia = '{$producao_academica_link_referencia}' ";


        $atualizar .= "WHERE  producao_academica_id = {$producao_academica_id} ";

        $operacao_atualizar = mysqli_query($conecta, $atualizar);
        if(!$operacao_atualizar){
            die("Erro na Atualização do Banco de Dados </br></br></br> " . $atualizar. " </br></br></br> ");
        } else  {
            header("Location: producao_academica.php");
                }

        }

        if( isset($_GET["pg_id"]) ){
        $producao_academica_id = $_GET["pg_id"];
        } else {
           header("Location: producao_academica.php");
        }

        //Consulta a tabela usuarios
        $pagina_alterar = "SELECT * ";
        $pagina_alterar .= "FROM producao_academica_ufrj ";
        $pagina_alterar .= "WHERE producao_academica_id = {$producao_academica_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_alterar);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Alterar Produção Acadêmica </br></br> " .$pagina_alterar);  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina);              

?>





<div class="container">
  <div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-grip-horizontal"></i> Alterar Produção Acadêmica </h3>
  <hr class="my-2">

<form class="mt-4" action="alterar_producao_academica.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

  <div class="form-group d-none">
    <label for="exampleFormControlInput1"> ID* </label>
    <input required="" type="text" value="<?php echo $dados_pagina['producao_academica_id']; ?>" name="producao_academica_id" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
    <label for="exampleFormControlInput1"> Título </label>
    <input required="" type="text" value="<?php echo $dados_pagina['producao_academica_titulo']; ?>" name="producao_academica_titulo" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
  <label for="exampleFormControlInput1"> Selecionar Categoria </label>
  <select required="" class="form-control " name="producao_academica_categoria_id">

  <?php while($linha4 = mysqli_fetch_assoc($consulta_tr7)) { ?>
  <?php if ( $linha4['pagina_modular_id'] == $dados_pagina['producao_academica_categoria_id']  ) { ?> 

  <option selected="" value="<?php echo $linha4['pagina_modular_id']; ?>"> **<?php echo $linha4['pagina_modular_titulo']; ?> </option>

  <?php } else { ?>

  <option value="<?php echo $linha4['pagina_modular_id']; ?>"> <?php echo $linha4['pagina_modular_titulo']; ?> </option>

  <?php } ?> 
  <?php } ?>

  </select>
  <small class="text-muted mt-0 mb-3"> *Para um novo objeto página ser exibido nas opções acima, deve ser criado antes deste card.  </small>
  </div>

  <div class="form-group">
  <label for="exampleFormControlInput1">Selecionar Tipo</label>
  <select required="" class="form-control" name="producao_academica_tipo">
  <option selected=""  disabled=""> Selecionar Tipo </option>

  <?php $tipo_producao_academica = array("artigos", "teses_dissertacoes" );
  for ($i=0; $i < sizeof($tipo_producao_academica) ; $i++) { ?>
  <?php if ( $tipo_producao_academica[$i] == $dados_pagina['producao_academica_tipo']  ) { ?>

  <option selected="" value="<?php echo $tipo_producao_academica[$i] ?>"> <?php echo $tipo_producao_academica[$i] ; ?> </option>

  <?php } else { ?>

  <option  value="<?php echo $tipo_producao_academica[$i] ?>"> <?php echo $tipo_producao_academica[$i] ; ?> </option>

  <?php } ?>
  <?php } ?>

  </select><br>

  <div class="form-group">
    <label for="exampleFormControlInput1"> Autores </label>
    <input required="" type="text" name="producao_academica_autores" value="<?php echo $dados_pagina['producao_academica_autores']; ?>" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1"> Ano </label>
    <input required="" type="number" name="producao_academica_ano" value="<?php echo $dados_pagina['producao_academica_ano']; ?>" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1"> Referência </label>
    <input required="" type="text" name="producao_academica_referencia" value="<?php echo $dados_pagina['producao_academica_referencia']; ?>" class="form-control" placeholder="">
  </div> 

  <div class="form-group">
    <label for="exampleFormControlInput1"> Link Arquivo </label>
    <input required="" type="text" name="producao_academica_link_arquivo" value="<?php echo $dados_pagina['producao_academica_link_arquivo']; ?>" class="form-control" placeholder="">
  </div>  

  <div class="form-group">
    <label for="exampleFormControlInput1"> Link Referência </label>
    <input required="" type="text" name="producao_academica_link_referencia" value="<?php echo $dados_pagina['producao_academica_link_referencia']; ?>" class="form-control" placeholder="">
  </div>   

  </div>  

  <center>
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Alterar Produção Acadêmica </button>

  <a href='producao_academica.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a> 
  </center>

</form>

    </div>
  </div>
</div>



<?php require_once "../footer_dashboard.php";  ?>