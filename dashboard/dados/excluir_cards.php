<?php require_once "../header_dashboard.php";  ?>

<?php


  //REMOVE TABLE

        if(isset($_POST["card_id"])){
        $ID = $_POST["card_id"];
        $excluir = "DELETE FROM cards ";
        $excluir .= "WHERE  card_id = {$ID} ";

        $operacao_excluir = mysqli_query($conecta, $excluir);
          if(!$operacao_excluir){
            die("Erro na Exclusão do Banco de Dados </br></br></br> " . $excluir . " </br></br></br> ");
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
        $pagina_alterar =  "SELECT * ";
        $pagina_alterar .= "FROM cards ";
        $pagina_alterar .= "WHERE card_id = {$card_id} ";

        $info_pagina = mysqli_query($conecta, $pagina_alterar);
        if(!$info_pagina) {
        die(" Falha na Base de Dados! Excluir Pagina M ");  
        }

        $dados_pagina = mysqli_fetch_assoc($info_pagina);              

?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-grip-horizontal"></i> Excluir Card: 
    <?php echo $dados_pagina['card_nome']; ?></h3>
  <hr class="my-2">

<form class="mt-4" action="excluir_cards.php" method="post" accept-charset="utf-8">

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Card ID*</label>
    <input type="text"  name="card_id" class="form-control" 
    value="<?php echo $dados_pagina['card_id']; ?>">
  </div>

  <p class="mt-3">

    Você deseja realmente excluir esses dados? Não será possível reverter essa ação ou restaurar os dados futuramente.</br>
    Todos os arquivos, páginas, noticiais, entre outros relacionados poderão ser prejudicados também, caso haja conexão entre os arquivos. </br>
    Erros ou Duvidas, favor entrar em Contato com o Desenvolvedor.  
  </p>

  
  <button type="submit" class="btn bg-danger text-white mt-2 mr-1"> <i class="fas fa-times"></i> Excluir card </button>

  <a href='cards.php'> 
  <button type='button' class='btn bg-secondary text-white mt-2'>Cancelar</button> 
  </a>  
  
</form>


    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>