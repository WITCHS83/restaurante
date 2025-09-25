<h1> &nbsp;&nbsp;&nbsp;Mesas</h1> 

<?php 

	if($_GET['fecha'] == "fechar"){

	$id_mesa = $_GET['id_mesa'];

	

		$delete = mysqli_query("UPDATE mesa SET situacao ='0', idGarcon = '' WHERE id_mesa = '$id_mesa' ")or die(mysqli_error());

		$up = mysqli_query("UPDATE tbl_carrinho SET situacao = '0' WHERE id_mesa = '$id_mesa'")or die(mysqli_error());

	}

?>

  <div class="container">

 <div class="bs-docs-section">

        <div class="row">

          <div class="col-lg-12">

            <div class="page-header">

              <h1 id="forms">Mesas</h1>

            </div>

          </div>

        </div>



 <div class="row">



	<?php 

		$sql = mysqli_query("SELECT * FROM mesa ORDER BY id_mesa ASC");

		while($ver = mysqli_fetch_array($sql)){

			$situacao = $ver['situacao'];

			$id_mesa = $ver['id_mesa'];

			$numero = $ver['numero'];

			$idGarcon = $ver['idGarcon'];

			

			$gar = mysqli_query("SELECT * FROM garcon WHERE idGarcon='$idGarcon'");

			$bosta = mysqli_fetch_assoc($gar);

			$nomeGarcon = $bosta['nomeGarcon'];

		

			

			if($situacao == 0){

				$img = "btn-success";

			$text = "Vazia";

			}else{
				$text = "Ocupada";
			$img = "btn-danger";

			}

	?>

<div class="col-lg-2" style="text-align: center; font-size: 1.2em;">
	<a href="?btn=vendermesa&id_mesa=<?php echo $id_mesa ?>&idGarcon=<?php echo $idGarcon ?>">
<div class="well bs-component <?=$img?>">
<l style="float:left; font-size: 1.3em; font-weight: bold;  color:#FFF; "><?php echo 'Nº '.$numero;  echo "<br/>";?></l>

	<l style="font-size: 1em; color:#FFF; float:right;"><?=$text?></l><br />
    <l style="font-size: 1em;  color:#FFF;  float:right;">
	<?php if($situacao == 1){echo $nomeGarcon; }else{echo "Abrir";} ?>
</l> <br />
</div>
</a>
</div>

<?php }?>



</div>

</div>