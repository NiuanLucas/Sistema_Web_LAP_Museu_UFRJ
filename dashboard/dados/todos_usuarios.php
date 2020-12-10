<?php require_once "../header_dashboard.php";  ?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <div class="row">
    <h3 class="h4 m-3 col-0"><i class="fas fa-users"></i> Todos os usuários </h3>

    <a href='inserir_todos_usuarios.php' class="col-0">
      <button type='button' class='btn bg-dark text-white mt-3 ml-3'> <i class="fas fa-plus"></i> Inserir novo usuário</button>
    </a>      
    </div>  

 <hr class="my-2">

  <table class="table table-responsive-md table-bordered table-hover mt-3 mb-3 border-0">
    <thead>
      <tr class="bg-dark text-white">
        <th scope="col">#ID</th>
        <th scope="col">E-mail</th>
        <th scope="col">Senha</th>
        <th scope="col">Nome</th>
        <th scope="col">Sobrenome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Cargo</th>
        <th scope="col">Alterar</th>
      </tr>
    </thead>
    <tbody>
      <?php while($linha = mysqli_fetch_assoc($consulta_tr3)) { ?>
      <tr>
            <th><?php echo $linha["usuario_id"] ?></th>
            <td><?php echo $linha["usuario_email"] ?></td>
            <td><?php echo $linha["usuario_senha"] ?></td>
            <td><?php echo $linha["usuario_nome"] ?></td>
            <td><?php echo $linha["usuario_sobrenome"] ?></td>
            <td><?php echo $linha["usuario_telefone"] ?></td>
            <td><?php echo $linha["usuario_cargo"] ?></td>
            <td align="center">
            <a class="m-2" href='alterar_todos_usuarios.php?usr_id=<?php echo $linha["usuario_id"] ?>'><i class="fas fa-edit"></i> Alterar </a>
            <a class="m-2" href='excluir_todos_usuarios.php?usr_id=<?php echo $linha["usuario_id"] ?>'><i class="fas fa-times"></i> Excluir </a>
            </td>
      </tr> 
    <?php } ?>
    </tbody>
  </table>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>