<?php require_once "../header_dashboard.php";  ?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

  <div class="row">
    <h3 class="h4 m-3 col-0"><i class="fas fa-envelope-open-text"></i> Todas as mensagens recebidas </h3>    
    </div>  

 <hr class="my-2">

  <table class="table table-responsive-md table-bordered table-hover mt-3 mb-3 border-0">
    <thead>
      <tr class="bg-dark text-white">
        <th scope="col">#ID</th>
        <th scope="col">Nome Completo</th>
        <th scope="col">E-mail</th>
        <th scope="col">Assunto</th>
        <th scope="col">Mensagem</th>
        <th scope="col">Responder</th>
    </thead>
    <tbody>
      <?php while($linha = mysqli_fetch_assoc($consulta_tr5)) { ?>
      <tr>
            <th><?php echo $linha["id_contato"] ?></th>
            <td><?php echo $linha["nome_completo_contato"] ?></td>
            <td><?php echo $linha["email_contato"] ?></td>
            <td><?php echo $linha["assunto_contato"] ?></td>
            <td><?php echo $linha["mensagem_contato"] ?></td>
            <td> <a class="btn" href="mailto:<?php echo $linha['email_contato'] ?>?subject=<?php echo $linha['assunto_contato'] ?>&body=<?php echo $linha['mensagem_contato'] ?>"> <i class="fas fa-reply"></i>  Responder E-mail </a> </td>
      </tr> 
    <?php } ?>
    </tbody>
  </table>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>