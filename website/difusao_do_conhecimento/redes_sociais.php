<?php require_once "../header.php";  ?>
<base target="_blank"> 

<div class="container mt-0 mb-4"></br>
	<div class="row ">

	<div class="col-sm-12">
		<?php echo( exibir_texto('pagina_fixa', 0 ) );  ?>	
	</div>

	<div class="col-sm-12  ">
	<h1><b> Divulgação cientifica nas Redes</b></h1>

		<div class="row mt-4">   
		<?php echo( exibir_card( "card", 4, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
		<?php echo( exibir_card( "card", 10, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
		<?php echo( exibir_card( "card", 11, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
		</div>
	
		<div class="row mt-4">   
		<?php echo( exibir_card( "card", 12, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
		<?php echo( exibir_card( "card", 13, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
		<?php echo( exibir_card( "card", 14, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
		</div>
	</div>

	</div>
</div>


<?php require_once "../footer.php";  ?>