
<script type="text/javascript">
function confirmardel(query){
if (confirm ("Deseja marcar item como entregue?")){   
 window.location="" + query;  
 return true;
 }
 else  
 window.location="?btn=garcon";
 return false;
 }
 
 function confirmariten(query){
 if (confirm ("Deseja exluir este pedido?")){   
 window.location="inicio.php" + query;  
 return true;
 }
 else  
 window.location="inicio.php?btn=garcon";
 return false;
 }
</script>
<div class="container" style="margin-top: 5%;">

		  <div class="bs-docs-section" >
<div>
<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">

				  <h1 id="forms">Acompanhar vendas</h1>

				</div>

			  </div>

			</div>
<?php 
include "config/conexao.php";
echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=?btn=garcon'>";
if($_GET['acao'] == "mudar"){
	$id = $_GET['id'];
	$entregue = $_GET['entregue'];
	$sql = mysqli_query("UPDATE	tbl_carrinho SET status = '1', entregue='$entregue' WHERE id='$id'") or die(mysqli_error());
	
}
 if($_GET['retira'] == "produto"){
	$idDelete = $_GET['id'];
	$del = mysqli_query("DELETE FROM tbl_carrinho WHERE id='$idDelete'");
	if($del == 1){
	print "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=inicio.php?btn=garcon'>";	
	}
}
?>
	
    <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="tbCliente">
  <tr>
    <td width="43%" align="left" bgcolor="#3399FF"><strong>Produto</strong></td>
    <td width="12%" align="center" bgcolor="#3399FF"><strong>Hora</strong></td>
    <td width="8%" align="center" bgcolor="#3399FF"><strong>Mesa</strong></td>
    <td width="14%" align="left" bgcolor="#3399FF"><strong>Garçom</strong></td>
    <td width="23%" align="center" bgcolor="#3399FF"><strong>Ações</strong></td>
  </tr>
  <?php 
  $sql = mysqli_query("SELECT * FROM tbl_carrinho INNER JOIN garcon ON tbl_carrinho.idGarcon = garcon.idGarcon WHERE status='0' ORDER BY id DESC") or die(mysqli_error());
  while($ver = mysqli_fetch_array($sql)){
	$background = (++$i%2) ? '#FFFFF' : '#F2F2F2';
	$feito = $ver['feito'];
	$destino = $ver['destino'];
  ?>
  <tr>
    <td bgcolor="<?php echo $background ?>"><?php echo $ver['nome']; ?></td>
    <td align="center" bgcolor="<?php echo $background ?>"><?php echo $ver['time']; ?></td>
    <td align="center" bgcolor="<?php echo $background ?>"><?php echo $ver['id_mesa'] ?></td>
    <td bgcolor="<?php echo $background ?>"><?php echo $ver['nomeGarcon'] ?></td>
    <td align="right" bgcolor="<?php echo $background ?>">
    <?php if($feito == 1 and $destino == 1){?>
      <img src="imagens/pronto.png" width="45" height="18" border="0" />
      <?php }elseif($feito == 0 and $destino == 1){?>
      <img src="imagens/AFAZER.png" width="45" height="18" border="0"/>
<?php } ?>
    
    
<a href="javascript:confirmariten('?btn=garcon&retira=produto&id=<?php echo $ver['id'] ?>entregue=1')"><img src="imagens/excluir.png" width="20" height="20" border="0" /></a> 
    
    <a href="javascript:confirmardel('?btn=garcon&acao=mudar&id=<?php echo $ver['id']; ?>&entregue=1')">
    <img src="imagens/ok.png" width="20" height="20" border="0"/></a></td>
  </tr>
  <?php } ?>
  </table>
</div></div></div>