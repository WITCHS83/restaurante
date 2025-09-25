<h1>&nbsp;&nbsp;Cadastro de categorías</h1>
<script type="text/javascript">
function confirmardel(query){
if (confirm ("Tem certeza que deseja excluir esta categoría?")){   
 window.location="" + query;  
 return true;
 }
 else  
 window.location="?btn=categoria";
 return false;
 }
</script>
<div class="container" style="margin-top: 5%;">

		  <div class="bs-docs-section" >
		  
			<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">

				  <h1 id="forms">Cadastro de Categorias</h1>

				</div>

			  </div>

			</div>
<div class="col-lg-12">
<div class="well bs-component">	
<div class="form-group">

	<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    	<legend>Nome:</legend> <input name="nome" class="form-control" type="text" size="40" />
		<br/>
		<input name="cadastrar" type="submit" class="btn btn-info" value="Cadastrar" id="cadastrar" />
    
    
  </form>
  </div>

  <?php 
  if(isset($_POST['cadastrar'])){
	  
	  $nomes = $_POST['nome'];
		
		$sql = mysqli_query("INSERT INTO categoria (nome)VALUES('$nomes')")or die(mysqli_error());  
		
		if($sql == 1){
	print "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=categoria'>";	
	}
	  
  }
  ?>
  <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="tbCliente">
  <tr>
    <th><strong>Categoría</strong></th>
    <th><strong><center>Deletar</center></strong></th>
  </tr>
  <?php 
  	$sel = mysqli_query("SELECT * FROM categoria ORDER BY id_categoria DESC");
	while($ver = mysqli_fetch_array($sel)){
  	$background = (++$i%2) ? '#F9F9F9' : '#F2F2F2';
  ?>
  <tr style="border:1px solid #f2f2f2;">
    <td align="left" bgcolor="<?php echo $background  ?>" style="border:1px solid #f2f2f2;"><?php echo $ver['nome'];?></td>
    <td align="center" bgcolor="<?php echo $background  ?>" style="border:1px solid #f2f2f2;">
    <a href="javascript:confirmardel('?btn=categoria&apagar=apagar&id_categoria=<?php echo $ver['id_categoria'] ?>')"><img src="imagens/excluir.png" width="17" height="18"  border="0"/></a>
    </td>
  </tr>
  <?php } ?>
  </table>
<?php 
if($_GET['apagar'] == "apagar"){
		$id = $_GET['id_categoria'];
		$del = mysqli_query("DELETE FROM categoria WHERE id_categoria = '$id'");
		
		if($del == 1){
	print "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=categoria'>";
					}

							}

?>
  
  </div>
</div>

  </div>
</div>