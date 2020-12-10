<?php require_once "../header_dashboard.php";  ?>

<?php



  //UPDATE TABLE
    if(isset($_POST["usuario_email"])){
    	$usuario_id = $_POST["usuario_id"];
        $usuario_email = $_POST["usuario_email"];
        $usuario_senha = $_POST["usuario_senha"];
        $usuario_nome = $_POST["usuario_nome"];
        $usuario_sobrenome = $_POST["usuario_sobrenome"];
        $usuario_telefone = $_POST["usuario_telefone"];
        $usuario_data_nascimento = $_POST["usuario_data_nascimento"];
        $usuario_nivel = $_POST["usuario_nivel"];
        $usuario_cargo = $_POST["usuario_cargo"];

        $atualizar = "UPDATE usuarios ";
        $atualizar .= "SET ";
        $atualizar .= "usuario_email = '{$usuario_email}', ";
        $atualizar .= "usuario_senha = '{$usuario_senha}', ";
        $atualizar .= "usuario_nome = '{$usuario_nome}', ";
        $atualizar .= "usuario_sobrenome = '{$usuario_sobrenome}', ";
        $atualizar .= "usuario_telefone = '{$usuario_telefone}', ";
        $atualizar .= "usuario_data_nascimento = '{$usuario_data_nascimento}', ";
        $atualizar .= "usuario_nivel = '{$usuario_nivel}', ";
        $atualizar .= "usuario_cargo = '{$usuario_cargo}' ";

        $atualizar .= "WHERE  usuario_id = {$usuario_id} ";

        $operacao_atualizar = mysqli_query($conecta, $atualizar);
        if(!$operacao_atualizar){
            die("Erro na Atualização do Banco de Dados </br></br></br> " . $atualizar . " </br></br></br> ");
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
	    die(" Falha na Base de Dados! Alterar Usuarios ");  
	    }

	    $dados_usuario = mysqli_fetch_assoc($info_usuarios);

?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-users"></i> Alterar dados do usuário </h3>
  <hr class="my-2">

<form class="mt-4" action="alterar_todos_usuarios.php" method="post" accept-charset="utf-8">

  <div class="form-group">
    <label for="exampleFormControlInput1">Usuario ID*</label>
    <input type="text"  name="usuario_id" class="form-control" placeholder="Ex.: nome@exemplo.com" value="<?php echo $dados_usuario['usuario_id']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Endereço de email*</label>
    <input type="email" required="" name="usuario_email" class="form-control" placeholder="Ex.: nome@exemplo.com" value="<?php echo $dados_usuario['usuario_email']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Senha*</label>
    <input type="text" required="" name="usuario_senha" class="form-control" value="<?php echo $dados_usuario['usuario_senha']; ?>" placeholder="******">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nome*</label>
    <input type="text" required="" name="usuario_nome" value="<?php echo $dados_usuario['usuario_nome']; ?>" class="form-control" placeholder="Digite seu primeiro nome">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Sobrenome*</label>
    <input type="text" required=""  name="usuario_sobrenome" value="<?php echo $dados_usuario['usuario_sobrenome']; ?>" class="form-control" placeholder="Digite seu sobrenome">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefone <small class="text-muted"><i>(opcional)</i></small></label>
    <input type="tel" class="form-control" value="<?php echo $dados_usuario['usuario_telefone']; ?>" name="usuario_telefone" placeholder="Ex.: (DDD) 00000-0000">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Data de Nascimento*</label>
    <input type="date" class="form-control" value="<?php echo $dados_usuario['usuario_data_nascimento']; ?>"  name="usuario_data_nascimento" placeholder="">
  </div>  

  <div class="form-group">
    <label for="exampleFormControlInput1">Cargo Profissional na Instituição <small class="text-muted"><i>(opcional)</i></small></label>
    <input type="text" class="form-control" value="<?php echo $dados_usuario['usuario_cargo']; ?>" name="usuario_cargo" placeholder="Ex.: Estudande, Pesquisador, Professor, etc.">
  </div>

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Nível</label>
    <input type="text" class="form-control" value="<?php echo $dados_usuario['usuario_nivel']; ?>" name="usuario_nivel" placeholder="" value="ADMIN">
  </div>

  <center>

  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Alterar dados do usuário </button>  

  <a href='todos_usuarios.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a>  

  </center>



</form>


    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>