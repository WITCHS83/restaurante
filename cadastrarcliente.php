<?php require_once('Connections/sistema.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO pedido (id_mesa, numero, idGarcon, situacao, email, nome, sobrenome, telefone, bairro, rua, numerocasa, detalhes) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_mesa'], "int"),
                       GetSQLValueString($_POST['numero'], "int"),
                       GetSQLValueString($_POST['idGarcon'], "text"),
                       GetSQLValueString($_POST['situacao'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['sobrenome'], "text"),
                       GetSQLValueString($_POST['telefone'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['rua'], "text"),
                       GetSQLValueString($_POST['numerocasa'], "text"),
                       GetSQLValueString($_POST['detalhes'], "text"));

  mysqli_select_db($database_sistema, $sistema);
  $Result1 = mysqli_query($insertSQL, $sistema) or die(mysqli_error());


  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
 
}
?>
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/demo_table.css"/>
 <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>


<script type="text/javascript">

$(document).ready(function() {

	      $('#tbCliente').dataTable();
});

</script>
<script type="text/javascript">
function exibe(id) {
	if(document.getElementById(id).style.display=="none") {
		document.getElementById(id).style.display = "inline";
	}
	else {
		document.getElementById(id).style.display = "none";
	}
}
</script>
<div class="container" style="margin-top: 5%;">

		  <div class="bs-docs-section" >

			<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">

				  <h1 id="forms">Configurações</h1>

				</div>

			  </div>

			</div>
<div class="row" style="display: none;">

<div class="col-lg-3">

<div class="well bs-component">			

    <form method="post" class="form-horizontal" action="buscar.php">
      <input size="32" class="form-control" type="text" class="busca" id="busca" name="buscar" value="buscar no site..." onfocus="if (this.value == 'buscar no site...') this.value = '';" onblur="if (this.value == '') this.value = 'buscar no site...';" />
      
    </form>
</div>

</div>

</div>
			<div class="row">

			  <div class="col-lg-12">

				<div class="page-header">
	    <fieldset>

        <legend>Buscar cliente</legend>
		


<table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="tbCliente">
	<thead>
		<tr>
			<th>Nome do Cliente</th>

		</tr>
	</thead>
<tbody>
<?php
  include"conexao/config.php";


  $sql = mysqli_query("SELECT * FROM pedido") or die("Erro ao consultar");
		 while($res = mysqli_fetch_array($sql)){
				
					$nome = $res['nome'];
					$sobrenome = $res['sobrenome'];
					$id = $res['id_mesa'];
					$idgracon = $res['idGarcon'];
					echo '<tr>';
					echo '<td>';
					echo '<a href="inicio2.php?btn=vendapedido&id_mesa='.$id.'&idGarcon='.$idgracon.'">';
					echo "$nome &nbsp; $sobrenome";
					echo "</a>";
					echo '</td>';
					echo '</tr>';
 }
?>

</tbody>
	<tfoot>
		<tr>
			<th>Nome do Cliente</th>
		</tr>
	</tfoot>
</table>
 </fieldset>
				</div>

			  </div>

			</div>
<div class="row">
<br />
<div class="col-lg-12">

<div class="well bs-component">		
  <form action="<?php echo $editFormAction; ?>" method="post" class="form-horizontal" name="form1" id="form1">
 <fieldset>

        <legend>Cadastro de Clientes</legend>

    	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Email:</label>

        <div class="col-lg-8">
		<input class="form-control" type="text" name="email" value="" size="32" />
 </div>
  </div>
  
    	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Nome:</label>

        <div class="col-lg-8">
       <input class="form-control" type="text" name="nome" value="" size="32" />
   </div>
  </div>
    	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Sobrenome:</label>

        <div class="col-lg-8">
     <input class="form-control" type="text" name="sobrenome" value="" size="32" />
		</div>
  </div>
  
      	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Telefone:</label>

        <div class="col-lg-8"><input class="form-control" type="text" name="telefone" value="" size="32" />		</div>
  </div>
  	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Bairro:</label>

        <div class="col-lg-8"><input class="form-control" type="text" name="bairro" value="" size="32" />		</div>
  </div>
  
  	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Rua:</label>

        <div class="col-lg-8"><input class="form-control" type="text" name="rua" value="" size="32" />
		</div>
  </div>
  
  	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Número da Casa:</label>

        <div class="col-lg-8"><input class="form-control" type="text" name="numerocasa" value="" size="32" />		</div>
  </div>
  
  	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Detalhes:</label>

        <div class="col-lg-8"><textarea name="detalhes" cols="50" rows="5"></textarea>		</div>
  </div>
  
  	<div class="form-group">

        <label for="inputEmail" class="col-lg-2 control-label">Detalhes:</label>

        <div class="col-lg-8"><input class="btn btn-info" type="submit" value="Cadastrar Cliente" />
			  </div>

			</div>
    <input type="hidden" name="id_mesa" value="" />
    <input type="hidden" name="numero" value="<?php
echo date("d/m/Y");
?>" />
    <input type="hidden" name="idGarcon" value="9" />
    <input type="hidden" name="situacao" value="0" />
    <input type="hidden" name="MM_insert" value="form1" />
  </form>


			  </div>

			</div>
</div>
</div>
</div>
