
<?php 
	if($_GET['fecha'] == "fechar"){
	$id_mesa = $_GET['id_mesa'];
	
		$delete = mysqli_query("UPDATE pedido SET situacao ='0', idGarcon = '' WHERE id_mesa = '$id_mesa' ")or die(mysqli_error());
		$up = mysqli_query("UPDATE entrega SET situacao = '0' WHERE id_mesa = '$id_mesa'")or die(mysqli_error());
	}
?>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>

<script type="text/javascript">
  $().ready(function(){
	$("#busca").autocomplete("ajax/busca.php", {
		width: 300,
		matchContains: true,
		selectFirst: false
	});
  });
</script>
<div class="bs-docs-section" >

		  <div class="bs-docs-section" >
<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">

				  <h1 id="forms">Pedidos</h1>

				</div>

			  </div>

			</div>

<div id="mesas">


    <form method="post" class="form-horizontal" action="">
	<div class="col-lg-8">
      <input size="32" type="text" class="form-control" id="busca" name="buscar" value="buscar no site..." onfocus="if (this.value == 'buscar no site...') this.value = '';" onblur="if (this.value == '') this.value = 'buscar no site...';" /> 
	  </div>
      <a href="inicio.php?btn=cadastroclientes" class="btn btn-info">Cadastrar cliente </a><br/><br/><br/>
    </form></center>
  


<ul>
	<?php 
		$sql = mysqli_query("SELECT * FROM pedido ORDER BY id_mesa DESC LIMIT 20");
		while($ver = mysqli_fetch_array($sql)){
			$situacao = $ver['situacao'];
			$id_mesa = $ver['id_mesa'];
			$numero = $ver['nome'];
			$idGarcon = $ver['idGarcon'];
			
			$gar = mysqli_query("SELECT * FROM garcon WHERE idGarcon='$idGarcon'");
			$bosta = mysqli_fetch_assoc($gar);
			$nomeGarcon = $bosta['nomeGarcon'];
		
			
			if($situacao == 0){
				$img = "<img src='imagens/restaurant_p.png' width='60' height='47' border='0'>";				
			}else{
			$img = "<img src='imagens/restaurant_pverde.png' width='60' height='47' border='0'>";
			}
	?>

	<li><a href="?btn=vendapedido&id_mesa=<?php echo $id_mesa ?>&idGarcon=<?php echo $idGarcon ?>"><?php echo $img; echo "<br/>";  echo 'Nº '.$numero;  echo "<br/>"; if($situacao == 1){echo "Garçom: ".$nomeGarcon; }else{echo "Abrir";} ?></a></li>


<?php }?>
</ul>
</div></div></div>