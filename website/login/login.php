
<?php require_once("../../dashboard/include.php"); ?>

<?php 

//adicionar variavel sessão
session_start();

if (isset( $_POST["email"] ) ) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $login = "SELECT * ";
    $login .= "FROM usuarios ";
    $login .= "WHERE usuario_email = '{$email}' and usuario_senha = '{$senha}' ";

    $acesso = mysqli_query($conecta, $login);
    if( !$acesso ) {
            die(" Falha na Base de Dados Login 2! ");
        }

        $informacao = mysqli_fetch_assoc($acesso);

        if (empty($informacao)) {
            $mensagem = "<div class='alert alert-danger mt-3' role='alert'> Login ou senha inválidos, tente novamente. </div>";
            
        } else {
            $_SESSION["user_portal"] = $informacao["usuario_id"];
            header("location: ../../dashboard/dados/dash_inicio.php");
        }
} 

?>


<?php require_once "../header.php";  ?>


<div class="container">
	<div class="row mt-4 mb-4 pt-4 pb-4">


<div class="col d-flex justify-content-center" align="center">
<div class="card rounded shadow" style="width: 18rem; border-top: 10px solid rgba(60,60,60,1) !important;" >
  <div class="card-body bg-transparent">
	<form action="login.php" method="POST">
      <img class="mb-3 mt-3" src="../../assets/images/logo_laboratorio.png" width="100" height="100">

      <h3 class="h4 mb-3 mt-3 font-weight-normal"><i class="fas fa-sign-in-alt"></i> Entrar no Painel</h3>

      <input type="email" id="email" name="email" class="form-control mb-3 mt-3" placeholder="E-mail" required autofocus>

      <input type="password" id="senha" name="senha" class="form-control mb-3 mt-3" placeholder="Senha" required>

      <button class="btn btn-lg bg-dark btn-block text-white mb-3 mt-3" type="submit">Entrar</button>

        <?php if (isset($mensagem)) { ?>
          <p><?php echo $mensagem; ?></p>
        <?php } ?>

    </form>
  </div>
</div>	
</div>



	</div>
</div>


<?php require_once "../footer.php";  ?>