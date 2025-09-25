
<script type="text/javascript" src="js/jquery-latest.js"></script>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>


<script type="text/javascript" src="js/jquery-ui.js"></script>

<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/demo_table.css"/>
 <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<h1>Cadastro de produtos</h1><br/>

<?php



include "config/conexao.php";



if(isset($_POST['cadastrar'])){

	

	$nome 	= $_POST['nome'];

	$precov 	=  str_replace(".", "",$_POST['preco']);

	$preco = str_replace(",", ".",$precov);

	$img	= $_POST[''];

	$categoria = $_POST['categoria'];

	$destino = $_POST['destino'];

	

	if($categoria == ""){

	print "

	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=cadastroProdutos'>

	<script type=\"text/javascript\">

	alert(\"ERRO!! Selecione uma categoría para o produto.\");

	</script>";	

	}else{	

	

	

	

	$sql = mysqli_query("INSERT INTO tbl_produtos(nome, preco, img, id_categoria,destino)VALUES('$nome','$preco','$img','$categoria','$destino')") or die(mysqli_error());	

	

	if($sql == 1){

	print "

	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=cadastroProdutos'>

	<script type=\"text/javascript\">

	alert(\"Cadastrado com sucesso.\");

	</script>";	

	}

	

}

}

?>

 <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

 <script type="text/javascript" src="js/jquery.mask-money.js"></script>

<script type="text/javascript">

$(document).ready(function() {

        $("#preco").maskMoney({decimal:",",thousands:"."});

		

      });

</script>

<div class="container">

		  <div class="bs-docs-section" >

			<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">

				  <h1 id="forms">Cadastro de Produtos</h1>

				</div>

			  </div>

			</div>

<div class="row">

<div class="col-lg-9">

<div class="well bs-component">



	<div id="form">

    

	<form action="" class="form-horizontal" name="form" method="post" enctype="multipart/form-data">

	    <fieldset>

        <legend>Cadastro de Produtos</legend>

    	<div class="form-group">

        <label for="inputEmail" class="col-lg-4 control-label">Nome do Produto:</label>

        <div class="col-lg-8">

  <input name="nome" class="form-control"  type="text" class="form2" size="35" maxlength="35" id="nome">

  </div>

  </div>

    	<div class="form-group">

        <label for="inputEmail" class="col-lg-4 control-label">Categoria:</label>

        <div class="col-lg-8">

  	<select name="categoria" class="form-control" class="form2">

    <option value="">Selecione</option>

    <?php 

		$cat = mysqli_query("SELECT * FROM categoria ORDER BY nome ASC");

		while($c = mysqli_fetch_array($cat)){

	?>

  	  <option value="<?php echo $c['id_categoria'] ?>"><?php echo $c['nome'] ?></option>

      <?php } ?>

  	</select>

  </div>

  </div>	



   	<div class="form-group">

        <label for="inputEmail" class="col-lg-4 control-label">Preparado na Cozinha?</label>

        <div class="col-lg-8">

  <input name="destino" type="radio" value="1" />Sim <input name="destino" type="radio" value="0" checked="checked" />Não

  </div>

  </div>	

 	<div class="form-group">

        <label for="inputEmail" class="col-lg-4 control-label">Preço de Venda:</label>

        <div class="col-lg-8">

      <input name="preco" class="form-control" type="text" class="form" size="6" id="preco"><br/><br/>

        <input name="cadastrar" type="submit" class="btn btn-info" value="Cadastrar">

     </div>

  </div>	 

    </fieldset>

    </form>

</div>

</div>

</div>

</div>

</div>

</div>