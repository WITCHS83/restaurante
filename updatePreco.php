<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Altera Preço</title>

 <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

 <script type="text/javascript" src="js/jquery.mask-money.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $("#preco").maskMoney({decimal:",",thousands:"."});
});
</script>

<script language="javascript">

function fechajanela() {

window.open("inicio.php?btn=alterapreco","main");

}

</script>

</head>

<body onunload="fechajanela()" style="background-color:transparent;border: none;">

<?php 

	include "config/conexao.php"; 

if(isset($_POST['alterar'])){

	$cods = $_GET['cod'];

	$nome = $_POST['nome'];

	$precov 	=  str_replace(".", "",$_POST['preco']);

	$preco = str_replace(",", ".",$precov);



	$sql = mysqli_query("UPDATE tbl_produtos SET nome='$nome', preco = '$preco' WHERE cod='$cods'")or die(mysqli_error());

	

	if($sql == 1){



	}

}



?>

    <?php 



	$cod = $_GET['cod'];

	$sql_select = mysqli_query("SELECT * FROM tbl_produtos WHERE cod='$cod'");

		$ver = mysqli_fetch_array($sql_select);

	?>

		  <div class="bs-docs-section"  style="background-color:transparent;border: none; float:right;">

    	<div class="row" style="background-color:transparent;border: none;">

			  <div class="col-lg-14" style="background-color:transparent;border: none;">

				<div class="well bs-component" style="background-color:transparent;border: none;">

	<form style="background-color:transparent;border: none;" action="" name="form" method="post"  class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="cod" value="<?php echo $cod  ?>" />
	<div class="form-group" style="background-color:transparent;border: none;">

    	<b>Nome:</b><br />

		

		   <div class="col-lg-8">

  <input name="nome" type="text"  id="nome" value="<?php echo $ver['nome'] ?>"  maxlength="35">

  </div>

   </div>

    	<div class="form-group" style="background-color:transparent;border: none;">

       <b>Preço:</b><br />

        <div class="col-lg-8" style="background-color:transparent;border: none;">

      <input name="preco"  type="text"   id="preco"  value="<?php echo  str_replace(".",",",$ver['preco']); ?>" >

      

    </div>

	

    </div>

	<div class="form-group" style="background-color:transparent;border: none;">

	<input name="alterar" type="submit" value="Alterar" class="btn btn-info">

        <a href="#"><input name=""  onclick="$('#<?=$cod?>').hide('slow');" type="button" value="Fechar" class="btn btn-danger" /></a>

	</div>

    </form>

</div>

</div>

</div>

</div>



</body>

</html>