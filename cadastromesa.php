
<h1>Gerenciar mesas</h1>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="css/demo_table.css"/>
 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	      $('#mesas').dataTable();
});
function confirmardel(query){

	if(confirm ("Tem certeza que deseja excluir esta mesa?")){   
	
			 window.location="" + query;  
			
			 return true;
	
	 }
	 else
	 {  
		 window.location="?btn=cadastromesa";
		
		 return false;
	
	 }
}



</script>


<div class="container">
  <div class="bs-docs-section" >

			<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">

				  <h1 id="forms">Configurações</h1>

				</div>

			  </div>

			</div>
<div class="row">

<div class="col-lg-9">

<div class="well bs-component">

	<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
 <fieldset>

        <legend>Cadastro de Mesas</legend>
		<div class="form-group">

    	 <input name="cadastrar" class="btn btn-info" type="submit" value="Clique aqui para adicionar uma nova mesa+" id="cadastrar" />
		 </div>
		 </div>
 </fieldset>
</form>
</div>

</div>

</div>


  <?php 
include "config/conexao.php";
  $contar = mysqli_query("SELECT * FROM mesa ORDER BY id_mesa DESC") or die(mysqli_error());

  $linha = mysqli_fetch_array($contar);

  $cont = mysqli_num_rows($contar);

  $id = $linha['id_mesa'];

  $conf = $cont + 1;

  if($cont <= $conf){

		$nomes = $id + 1;

 }

  



  if(isset($_POST['cadastrar'])){

	  	

	$sql = mysqli_query("INSERT INTO mesa (id_mesa,numero, situacao)VALUES('$nomes','$nomes','0')")or die(mysqli_error());  

		

		if($sql == 1){

	print "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=cadastromesa'>";	

	}

	  

  }

  ?>

<table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="mesas">
	<thead>
		<tr>
			<th>Categoría</th>
			<th>Deletar</th>

			
		</tr>
	</thead>
	<tbody>
  <?php 

  	$sel = mysqli_query("SELECT * FROM mesa ORDER BY id_mesa ASC");

	while($ver = mysqli_fetch_array($sel)){

  

  ?>

  <tr>

    <td>Mesa nº <?php echo $ver['numero'];?></td>

    <td>

    <a href="javascript:confirmardel('?btn=cadastromesa&apagar=apagar&id_mesa=<?php echo $ver['id_mesa'] ?>')"><img src="imagens/excluir.png" width="17" height="18"  border="0"/></a>

    </td>

  </tr>

  <?php } ?>
</tbody>
	<tfoot>
		<tr>
			<th>Categoría</th>
			<th>Deletar</th>
		</tr>
	</tfoot>
</table>

<?php 

if($_GET['apagar'] == "apagar"){
		$id = $_GET['id_mesa'];
		$del = mysqli_query("DELETE FROM mesa WHERE id_mesa = '$id'");
		if($del == 1){

	print "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=cadastromesa'>";
	}
}
?>

</div>