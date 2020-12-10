<?php require_once "../header.php";  ?>

<?php
    // Consulta a Tabela Paginas Modulares
    $tr2 = "SELECT * ";
    $tr2 .= "FROM paginas_modulares ";
    $tr2 .= "WHERE pagina_modular_categoria = 'linhas_de_pesquisa' ";
    $consulta_tr2 = mysqli_query($conecta, $tr2);
    if(!$consulta_tr2) {
        die("Falha na consulta ao banco Projetos | Home");   
    }
?>

<style type="text/css" media="screen">
.h3 {
    line-height: 150% !important;
    font-size: 17px !important; 
} 
.h1 {
    line-height: 100% !important;
    font-family: Helvetica, sans-serif !important; 
    font-size: 26px !important;
    font-weight: bold;
}         
</style>    
   
<div class="container mt-0 mb-4"></br>
	<div class="row">

    <div class="col-sm-6">
    <h1 class="p-0 mb-3"><b> Linhas de Pesquisa </b></h1>
    <?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>	
          	<a class="font-weight-bold h3" href="linhas_de_pesquisa_mod.php?pg_id=<?php echo $linha['pagina_modular_id'] ?>"> 
            ● &nbsp; <?php echo $linha["pagina_modular_titulo"] ?>
            </a><br><br>
    <?php } ?>
    </div>

    <div class="col-sm-6 mt-4">
     <?php echo( exibir_slide( 25, '../../dashboard/dados/', '100%', '270') ); ?>
    </div>

    <div class="col-sm-6 mt-4">
    <h1><b> Projetos </b></h1>
    <p>*Clicar em cada linha de pesquisa acima para ver os projetos.</p>
    </div>

    <div class="col-sm-6 mt-4">
    <a target="_blank" href="http://dgp.cnpq.br/dgp/espelhogrupo/8196582057076372">
    <img class="float-right"  src="../../assets/images/logo_lattes.png">
    </a> 
    </div>  

    </div>
</div>



<?php require_once "../footer.php";  ?>