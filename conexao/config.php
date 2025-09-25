<?php	
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
  /// DADOS DE ACESSO AO SERVIDOR MySQL LOCALHOST
  $host_db = "sql302.infinityfree.com";
  $user_db = "if0_40003100";
  $pass_db = "AdCmW141719";
  $my_db   = "if0_40003100_restnovo";
	
  /// REALIZA A CONEXÃO
  $conect = mysqli_connect($host_db,$user_db ,$pass_db);
            mysqli_select_db($my_db, $conect);
?>
