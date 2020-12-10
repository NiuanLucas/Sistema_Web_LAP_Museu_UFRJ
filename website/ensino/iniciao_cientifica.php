<?php require_once "../header.php";  ?>
<base target="_blank"> 

<div class="container mt-0 mb-4"></br>
	<div class="row ">

<div class="col-sm-6">
	<?php echo( exibir_texto('pagina_fixa', 14 ) );  ?>	
</div>

<div class="col-sm-6 mt-sm-5 mb-4">
 <?php echo( exibir_slide( 10, '../../dashboard/dados/', '100%', '420px') ); ?>
</div>

<div class="col-sm-12 ml-sm-3 mr-sm-3  ">
	<?php echo( exibir_texto('pagina_fixa', 32) );  ?>	
</div>

	</div>
</div>


<?php require_once "../footer.php";  ?>