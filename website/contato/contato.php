<?php 
require_once "../header.php";  
require_once "../../phpmailer/PHPMailer.php";  
require_once "../../phpmailer/SMTP.php";  
require_once "../../phpmailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<?php

//INSERIR NO BANCO DE DADOS
    if(isset($_POST["email_contato"])){
        $email_contato = $_POST["email_contato"];
        $nome_completo_contato = $_POST["nome_completo_contato"];
        $assunto_contato = $_POST["assunto_contato"];
        $mensagem_contato = $_POST["mensagem_contato"]; 

        $email_sistema = 'lapmn.suporte@gmail.com';
        $senha_sistema = 'LAP98765';
         
        $mail = new PHPMailer(true);
         
        try {
          //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = $email_sistema;
          $mail->Password = $senha_sistema;
          $mail->Port = 587;
         
          $mail->setFrom($email_sistema);
          $mail->addAddress($email_sistema);
          //$mail->addAddress('endereco2@provedor.com.br');
         
          $mail->isHTML(true);
          $mail->Subject = 'Mensagem de: '.$_POST['email_contato'].' | '.$_POST['assunto_contato'];
          $mail->Body = $_POST['mensagem_contato'];
          //$mail->AltBody = 'Chegou o email teste do Canal TI';
         
          if($mail->send()) {
            echo 'Email enviado com sucesso';
          } else {
            echo 'Email nao enviado';
          }
        } catch (Exception $e) {
          echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }

        $inserir = "INSERT INTO contato ";
        $inserir .= "(nome_completo_contato,email_contato,assunto_contato,mensagem_contato) ";
        $inserir .= "VALUES ";
        $inserir .= "('$nome_completo_contato','$email_contato','$assunto_contato','$mensagem_contato') ";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
            die("Erro no Banco Cadastro de Usuario ");
        } else {
            header("location:contato.php?pg_id=18");
            $mensagem1 = "Sua mensagem foi enviada com sucesso. Obrigado!  ";
        }

    }

?>


<div class="container mt-0 mb-4 pt-4 pb-4">
	<div class="row ">

<div class="col col-sm-6">
	<?php echo base64_decode($dados_pagina["pagina_conteudo"]); ?>	
</div>

<div class="col col-sm-6">
<form action="contato.php?pg_id=18" method="post">
<h2><b>Fale Conosco</b></h2>
  <div class="form-group" class="mt-4">
    <label>Nome Completo</label>
    <input required="" type="text" name="nome_completo_contato" class="form-control" placeholder="Seu Nome">
  </div>

  <div class="form-group">
    <label>E-mail</label>
    <input required=""  type="email" name="email_contato" class="form-control" placeholder="nome@exemplo.com">
  </div>

   <div class="form-group">
    <label>Assunto</label>
    <input required="" type="text" name="assunto_contato" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label>Mensagem</label>
    <textarea required="" class="form-control" rows="3" name="mensagem_contato"></textarea>
  </div>

  <button type="submit" class="btn bg-dark mb-4 text-white">Enviar</button>
  <small> </br> <?php echo $mensagem1; ?> </small>

</form>
</div>

	</div>
</div>


<?php require_once "../footer.php";  ?>