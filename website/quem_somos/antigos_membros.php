<?php require_once "../header.php";  ?>
<base target="_blank">

<style type="text/css" media="screen">
div#equipe img {
        border: 0px solid blue;
        width: 16px !important;
        height: 16px !important;
        padding: 0px 0px 0px 0px !important;
        position: absolute !important;
        }
}

@media only screen and (max-width: 400px) {
    p{line-height: 100% !important;}
}

@media only screen and (min-device-width: 768px){
    p{line-height: 35% !important;}	
</style>

<div class="container mt-0 mb-4"></br>
	<div class="row ">
		
<div class="col-sm-6" style="" id="equipe" >
	<?php echo( exibir_texto('pagina_fixa', 25 ) );  ?>	
</div>
<p> * O nível de formação indicado corresponde ao título de mais alto grau obtido enquanto parte da equipe </p>
	</div>
</div>

<script type="text/javascript">
var x = document.getElementById("equipe").getElementsByTagName("IMG");
var i;
for (i = 0; i < x.length; i++) {
if (x[i].src == "http://inoveai.epizy.com/11App+lap/dashboard/dados/upload/1594861265.png") {
   x[i].style.border = "0px solid red";
   x[i].style.margin = "-5px 0px 0px 0px";
   
} else {
     x[i].style.border = "0px solid blue";
    x[i].style.margin = "-5px 0px 0px 15px";
}
}

/*alert(' VALOR 1: ' + i + ' | Valor 2: ' + x[18].src  ); */
</script>


<?php require_once "../footer.php";  ?>