
<?php

define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASS',"");
define('DB_NAME',"lap_museu_ufrj");

//Passo 1 - Abrir conexao
$servidor = DB_HOST;
$usuario = DB_USER;
$senha = DB_PASS;
$banco = DB_NAME; 

$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

//Passo 2 Testar Conexao
if ( mysqli_connect_errno() ) {
  die("Conexao falhou: " . mysqli_connect_errno() );
}



?>
 






