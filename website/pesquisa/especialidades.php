<?php require_once "../header.php";  ?>

<?php
    // Consulta a Tabela Paginas Modulares
    $tr2 = "SELECT * ";
    $tr2 .= "FROM paginas_modulares ";
    $tr2 .= "WHERE pagina_modular_categoria = 'especialidades' ";
    $consulta_tr2 = mysqli_query($conecta, $tr2);
    if(!$consulta_tr2) {
        die("Falha na consulta ao banco Especialidades | Home");   
    }
?>


	
<div class="container mt-0 mb-4"></br>
  <div class="row " style="">

  <div class="col-sm-6 mb-2 bg-transparent">
    <?php echo( exibir_texto('pagina_fixa', 10 ) );  ?> 
  </div>

  <div class="col-sm-6 mt-sm-5 pt-sm-4">
   <?php echo( exibir_slide( 26, '../../dashboard/dados/', '100%', '100%') ); ?>
  </div>

  </div>

  <div class="row">

    <div class="col-sm-12 ml-sm-3 mr-sm-3  ">
    </br><?php echo( exibir_texto('pagina_fixa', 30 ) );  ?>  
  </div>

  <center><div class=" col-sm-12 card-deck mt-4 ml-sm-4">
  <?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>  
    <div class="card">
      <a href="especialidade_mod.php?pg_id=<?php echo $linha['pagina_modular_id'] ?>" >
      <img class="card-img-top" style="max-height: 200px; width: auto;" src="../../dashboard/dados/<?php echo $linha['pagina_modular_imagem_capa'] ?>" >
      <div class="card-body">
        <h5 class="" style="font-size: 90% !important; font-family: Helvetica, sans-serif !important;  color red !important;" ><b><?php echo $linha["pagina_modular_titulo"] ?></b></h5>
      </div>
    </a>
    </div>
  <?php } ?>
  </div></center>

  <div class="col-sm-12 ml-sm-3 mr-sm-3  ">
    <?php echo( exibir_texto('pagina_fixa', 33 ) );  ?>  
  </div>

  </div>
</div>


<?php require_once "../footer.php";  ?>