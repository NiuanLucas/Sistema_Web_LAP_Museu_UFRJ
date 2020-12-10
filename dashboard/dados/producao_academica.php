<?php require_once "../header_dashboard.php";  ?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

    <div class="row">
    <h3 class="h4 m-3 col-0"><i class="fas fa-grip-horizontal"></i> Produção Acadêmica </h3>

    <a href='inserir_producao_academica.php' class="col-0">
      <button type='button' class='btn bg-dark text-white mt-3 ml-3'> <i class="fas fa-plus"></i> Inserir nova produção acadêmica </button>
    </a>

    </div>

  <hr class="my-2">


<?php
function exibir_categoria_producao_academica($id){


//Passo 1 - Abrir conexao
$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 
$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);


// Consulta a Tabela Slides
    $consultar_slide = "SELECT * ";
    $consultar_slide .= "FROM paginas_modulares ";
    $consultar_slide .= "WHERE pagina_modular_id = $id ";
    $consulta_slide = mysqli_query($conecta, $consultar_slide);
    if(!$consulta_slide) {
        die("</br>");  
        //die("</br> Falha na consulta ao banco FUNCTIONS Slides </br></br> " .$consultar_slide. " </br></br>  ");   
    }

    $linha4 = mysqli_fetch_assoc($consulta_slide);


    return $linha4["pagina_modular_titulo"];
    
    }   

?>


<?php

// Criando um array normal
$categoria_producao_academica = array(
  "Arqueologia Pré-colonial: Sambaquis", 
  "Arqueologia Pré-colonial: Ceramistas", 
  "Arqueologia Pré-colonial: Paleoíndios", 
  "Arqueologia histórica / Ecologia histórica", 
  "Teoria e método em Arqueobotânica", 
  "Anatomia do lenho", 
  "Paleoecologia",
  "Florística/Fitossociologia",
  "Radiocronologia", 
  "Palinologia",
  "Paleobotânica",   
  "Outros" );

for ($i=0; $i < sizeof($categoria_producao_academica) ; $i++) { 

echo "</br><a>";
echo "Categoria: ".ucfirst($categoria_producao_academica[$i]);
echo "</a>";

?>

  <table class="table table-responsive-md table-bordered table-hover mt-3 mb-3 border-0">
    <thead>
      <tr class="bg-dark text-white">
        <th scope="col">#ID</th>
        <th scope="col">Categoria</th>
        <th scope="col">Tipo</th>
        <th scope="col">Título</th>
        <th scope="col">Autores</th> 
        <th scope="col">Referência</th>
        <th scope="col">Alterar</th>
      </tr>
    </thead>
    <tbody>


      <?php
                 // Consulta a Tabela Contato
          $tr7 = "SELECT * ";
          $tr7 .= "FROM producao_academica_ufrj ";
          $consulta_tr7 = mysqli_query($conecta, $tr7);
          if(!$consulta_tr7) {
              die("Falha na consulta ao banco Cards Header | Producao Academica");   
          }
      ?>


      <?php while($linha = mysqli_fetch_assoc($consulta_tr7)) { ?>
      <?php if ( $categoria_producao_academica[$i] == exibir_categoria_producao_academica($linha["producao_academica_categoria_id"])  ) { ?> 
      <tr>
            <th><?php echo $linha["producao_academica_id"] ?></th>

            <td> <?php echo exibir_categoria_producao_academica($linha["producao_academica_categoria_id"]) ?>
            </td>

            <td><?php echo $linha["producao_academica_tipo"] ?></td>

            <td><?php echo mb_strimwidth($linha["producao_academica_titulo"], 0, 30, "...") ?></td> 

            <td><?php echo $linha["producao_academica_autores"] ?></td>
            <td><?php echo $linha["producao_academica_referencia"] ?></td>

            <td align="center">
            <a class="m-2" href='alterar_producao_academica.php?pg_id=<?php echo $linha["producao_academica_id"] ?>'><i class="fas fa-edit"></i> Editar </a>
            <a class="m-2" href='excluir_producao_academica.php?pg_id=<?php echo $linha["producao_academica_id"] ?>'><i class="fas fa-times"></i> Excluir </a> 
            </td>

      </tr>
    <?php } else { }  ?> 
    <?php } ?>
    </tbody>
  </table>

  <?php

}

?>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>