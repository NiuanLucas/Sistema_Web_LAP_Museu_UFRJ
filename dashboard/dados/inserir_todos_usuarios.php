<?php require_once "../header_dashboard.php";  ?>

<?php
 $mensagem1 = "";
//INSERIR NO BANCO DE DADOS
    if(isset($_POST["usuario_email"])){
        $usuario_email = $_POST["usuario_email"];
        $usuario_senha = $_POST["usuario_senha"];
        $usuario_nome = $_POST["usuario_nome"];
        $usuario_sobrenome = $_POST["usuario_sobrenome"];
        $usuario_telefone = $_POST["usuario_telefone"];
        $usuario_data_nascimento = $_POST["usuario_data_nascimento"];
        $usuario_nivel = $_POST["usuario_nivel"];
        $usuario_cargo = $_POST["usuario_cargo"];


        $inserir = "INSERT INTO usuarios ";
        $inserir .= "(usuario_email,usuario_senha,usuario_nome,usuario_sobrenome,usuario_telefone,usuario_data_nascimento,usuario_nivel,usuario_cargo) ";
        $inserir .= "VALUES ";
        $inserir .= "('$usuario_email','$usuario_senha','$usuario_nome','$usuario_sobrenome','$usuario_telefone','$usuario_data_nascimento','$usuario_nivel','$usuario_cargo') ";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
            die("Erro no Banco Cadastro de Usuario ");
        } else {
            header("location:todos_usuarios.php");
        }

    }

?>


<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <h3 class="h4 mt-3 mb-3"><i class="fas fa-users"></i> Inserir novo usuário Administrador </h3>
  <hr class="my-2">

<form class="mt-4" action="inserir_todos_usuarios.php" method="post" accept-charset="utf-8">

  <div class="form-group">
    <label for="exampleFormControlInput1">Endereço de email*</label>
    <input required="" type="email" required="" name="usuario_email" class="form-control" placeholder="Ex.: nome@exemplo.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Senha*</label>
    <input required="" type="password" required="" name="usuario_senha" class="form-control" placeholder="******">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nome*</label>
    <input required="" type="text" required="" name="usuario_nome" class="form-control" placeholder="Digite seu primeiro nome">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Sobrenome*</label>
    <input required="" type="text" required="" name="usuario_sobrenome" class="form-control" placeholder="Digite seu sobrenome">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Telefone <small class="text-muted"><i>(opcional)</i></small></label>
    <input type="tel" class="form-control" name="usuario_telefone" placeholder="Ex.: (DDD) 00000-0000">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Data de Nascimento*</label>
    <input required="" type="date" class="form-control" name="usuario_data_nascimento" placeholder="">
  </div>  

  <div class="form-group">
    <label for="exampleFormControlInput1">Cargo Profissional na Instituição <small class="text-muted"><i>(opcional)</i></small></label>
    <input type="text" class="form-control" name="usuario_cargo" placeholder="Ex.: Estudande, Pesquisador, Professor, etc.">
  </div>

  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Nível</label>
    <input type="text" class="form-control" name="usuario_nivel" placeholder="" value="ADMIN">
  </div>

  <center>
  <button type="submit" class="btn bg-dark text-white mt-3 mr-1"> Inserir usuário </button>

  <a href='todos_usuarios.php'> 
  <button type='button' class='btn bg-secondary text-white mt-3'>Cancelar</button> 
  </a>  

  </center>

</form>


    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>