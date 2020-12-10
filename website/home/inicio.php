<?php require_once "../header.php";  ?>

<div class="container mt-4 mb-4"></br>

<div class="row">
	<div class="col-sm-6" style="line-height: 28px;" >
		<?php echo( exibir_texto('pagina_fixa', 2 ) );  ?>	
	</div>

	<div class="col-sm-6">
	 <?php echo( exibir_slide( 22, '../../dashboard/dados/', '100%', '280') ); ?>
	</div>
</div>

<div class="row">
	<h2 class="col-8 mb-4 mt-4 border-bottom">
	<strong>
	Novidades e Eventos 
	</strong>
	</h2>

		<?php //echo( exibir_card_grande( 1, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>

    	<!--<div class="col-sm-5 mb-4 border-0">
		<div class="card" >
		  <div class="card-body">
		  	<h5 class="card-title text-center d-none d-md-block">Conheça o nosso </br> 
			projeto de extensão</h5>
			<h5 class="card-title d-block d-md-none">Conheça o nosso </br> 
			projeto de extensão</h5>
			<center>
			<a href="../pesquisa/projeto_mod.php?pg_id=28">
		    <img class="img-fluid w-100 imagem-my-card p-0 m-0 mt-3 mb-1" src="../../assets/images/logo_arqueologiaviva_colorido.png">
			</a>
			</center>
		  </div>
		</div>
    	</div> -->

</div>


<div class="row">	
	<?php echo( exibir_card( "card", 2, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
	<?php echo( exibir_card( "card", 3, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>
	<?php // echo( exibir_card( 4, '../../dashboard/dados/', 'noticia_mod.php?pg_id=' ) ); ?>

	<div class='col-sm-4 mb-4 border-0'>
		<div class='card'>
		<a style='text-decoration: none;' target='_self' href=' noticia_mod.php?pg_id=28 '>
          <center><img  class='card-img-top' style="width: auto; height: 180px; object-fit: contain;"  src='../../assets/images/logo_arqueologiaviva_colorido.png' ></center>
          <div class='card-body'>
            <h6 class='card-title-sub'> 02/11/2020  </h6>
             <h5 class='card-title'>Conheça o nosso projeto de extensão</h5>
          </div>
      	</a>
    	</div>
    </div>	

</div>

</div>


<?php require_once "../footer.php";  ?>