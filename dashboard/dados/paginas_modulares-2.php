<?php require_once "../header_dashboard.php";  ?>

<div class="container">
	<div class="row">
  <div class="col col-12 mt-5 mb-5">

    <div class="row">
    <h3 class="h4 m-3 col-0"><i class="fas fa-scroll"></i> Páginas modulares</h3>

    <a href='inserir_paginas_modulares.php' class="col-0">
      <button type='button' class='btn bg-dark text-white mt-3 ml-3'> <i class="fas fa-plus"></i> Inserir nova página modular</button>
    </a>      
    </div>

  <hr class="my-2">

  <table class="table table-responsive-md table-bordered table-hover mt-3 mb-3 border-0">
    <thead>
      <tr class="bg-dark text-white">
        <th scope="col">#ID</th>
        <th scope="col">Título</th>
        <!-- <th class="d-none" scope="col">Conteúdo</th> 
        <th scope="col">Descrição</th>
        <th scope="col">Palavras Chave</th>-->
        <th scope="col">Categoria</th>
        <th scope="col">Imagem Principal</th>
        <th scope="col">Alterar</th>
      </tr>
    </thead>
    <tbody>
      <?php while($linha = mysqli_fetch_assoc($consulta_tr2)) { ?>
      <tr>
            <th><?php echo $linha["pagina_modular_id"] ?></th>
            <td><?php echo mb_strimwidth($linha["pagina_modular_titulo"], 0, 30, "...")  ?></td>
            <!--<td class="d-none"><?php //echo $linha["pagina_modular_conteudo"] ?></td> 
             <td><?php //echo  mb_strimwidth($linha["pagina_modular_descricao"], 0, 18, "...") ?></td>
            <td><?php //echo $linha["pagina_modular_palavras_chaves"] ?></td>-->
            <td><?php echo $linha["pagina_modular_categoria"] ?></td>

            <td align="center"><img width="150" height="70" src=" <?php echo $linha['pagina_modular_imagem_capa'] ?> " ></td>

            <td align="center">
            <a class="m-2" href='alterar_paginas_modulares.php?pg_id=<?php echo $linha["pagina_modular_id"] ?>'><i class="fas fa-edit"></i> Editar </a>
            <a class="m-2" href='excluir_paginas_modulares.php?pg_id=<?php echo $linha["pagina_modular_id"] ?>'><i class="fas fa-times"></i> Excluir </a>
            </td>
      </tr> 
    <?php } ?>
    </tbody>
  </table>



    </div>
	</div>
</div>


<?php require_once "../footer_dashboard.php";  ?>