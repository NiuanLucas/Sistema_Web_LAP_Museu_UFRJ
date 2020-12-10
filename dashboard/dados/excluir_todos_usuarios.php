<?php require_once "../header_dashboard.php";  ?>

<?php


  //REMOVE TABLE

        if(isset($_POST["usuario_id"])){
        $ID = $_POST["usuario_id"];
        $excluir = "DELETE FROM usuarios ";
        $excluir .= "WHERE  usuario_id = {$ID} ";

        $operacao_excluir = mysqli_query($conecta, $excluir);
          if(!$operacao_excluir){
            die("Erro na Exclusão do Banco de Dados </br></br></br> " . $excluir . " </br></br></br> ");
          } else  {
            header("Location:todos_usuarios.php");
                }
              }

        if( isset($_GET["usr_id"]) ){
        $usuario_id = $_GET["usr_id"];
        } else {
           header("Location:todos_usuarios.php");
        }

            //Consulta a tabela usuarios
        $usr_alterar = "SELECT * ";
        $usr_alterar .= "FROM usuarios ";
        $usr_alterar .= "WHERE usuario_id = {$usuario_id} ";

        $info_usuarios = mysqli_query($conecta, $usr_alterar);
        if(!$info_usuarios) {
        die(" Falha na Base de Dados! Excluir Usuario ");  
        }

        $dados_usuario = mysqli_fetch_assoc($info_usuarios);              

?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-users"></i> Excluir usuário: <?php echo $dados_usuario['usuario_email']; ?></h3>
  <hr class="my-2">

<form class="mt-4" action="excluir_todos_usuarios.php" method="post" accept-charset="utf-8">

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Usuario ID*</label>
    <input type="text"  name="usuario_id" class="form-control" placeholder="Ex.: nome@exemplo.com" value="<?php echo $dados_usuario['usuario_id']; ?>">
  </div>

  <p class="mt-3">

    Você deseja realmente excluir esses dados? Não será possível reverter essa ação ou restaurar os dados futuramente.</br>
    Todos os arquivos, páginas, noticiais, entre outros relacionados poderão ser prejudicados também, caso haja conexão entre os arquivos. </br>
    Erros ou Duvidas, favor entrar em Contato com o Desenvolvedor.  
  </p>

  
  <button type="submit" class="btn bg-danger text-white mt-2 mr-1"> <i class="fas fa-times"></i> Excluir usuário </button>

  <a href='todos_usuarios.php'> 
  <button type='button' class='btn bg-secondary text-white mt-2'>Cancelar</button> 
  </a>  



  
  
  

</form>


    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>