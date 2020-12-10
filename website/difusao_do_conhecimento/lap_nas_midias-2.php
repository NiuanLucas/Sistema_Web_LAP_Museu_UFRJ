<?php require_once "../header.php";  ?>

<?php
    // Consulta a Tabela Paginas Modulares
    $tr2 = "SELECT * ";
    $tr2 .= "FROM paginas_modulares ";
    $tr2 .= "WHERE pagina_modular_categoria = 'midias' ";
    $consulta_tr2 = mysqli_query($conecta, $tr2);
    if(!$consulta_tr2) {
        die("Falha na consulta ao banco Noticias | Home");   
    }
?>

<div class="container mt-0 mb-4 pt-4 pb-4">
	<div class="row ">


<div class="col col-sm-9 p-4">
<h1><b> Lap nas Mídias </b></h1>


<?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>	
<div class="card mb-4 mt-4 border shadow-sm" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../../dashboard/dados/<?php echo $linha['pagina_modular_imagem_capa'] ?>" width="auto" height="100%" class="card-img image-slide-fix rounded-0">
    </div>
    <div class="col-md-8">
      <div class="card-body p-0 m-3">
        <h5 class="card-title"><?php echo $linha["pagina_modular_titulo"] ?></h5>
        <p class="card-text"><small class="text-muted"><?php echo date("d/m/Y", strtotime($linha["data"]));?></small></p>
        <a class="" target="_blank" href="<?php echo $linha['pagina_modular_descricao'] ?>"> 
        <?php echo  mb_strimwidth($linha["pagina_modular_descricao"], 0, 80, "...") ?> </a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</div>


	</div>
</div>


<?php require_once "../footer.php";  ?>