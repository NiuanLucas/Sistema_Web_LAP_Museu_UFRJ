<?php require_once "../header.php";  ?>
<base target="_blank"> 

<div class="container mt-0 mb-4"></br>

<div class="row" style="">
	<div class="col-sm-6">
		<?php echo( exibir_texto('pagina_fixa', 7 ) );  ?>	
	</div>
	<div class="col-sm-6 mt-sm-5 pt-sm-4" style=""  >
	 <?php echo( exibir_slide( 7, '../../dashboard/dados/', '100%', '420px') ); ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 ml-sm-3 mr-sm-3  ">
		</br><?php echo( exibir_texto('pagina_fixa', 27 ) );  ?>	
	</div>
</div>

<div class="row" style="position: relative;">
	<div class="col-sm-6">
		<?php echo( exibir_texto('pagina_fixa', 28 ) );  ?>	
	</div>
	<div class="col-sm-6 mt-sm-5 pt-sm-4" style=""  >
	 <?php echo( exibir_slide( 24, '../../dashboard/dados/', '100%', '420px') ); ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 ml-sm-3 mr-sm-3  ">
		</br><?php echo( exibir_texto('pagina_fixa', 29 ) );  ?>	
	</div>
</div>


</div>


<?php require_once "../footer.php";  ?>