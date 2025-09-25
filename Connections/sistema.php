<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sistema = "sql302.infinityfree.com";
$database_sistema = "if0_40003100_restnovo";
$username_sistema = "if0_40003100";
$password_sistema = "AdCmW141719";

$sistema = mysqli_pconnect($hostname_sistema, $username_sistema, $password_sistema) or trigger_error(mysqli_error(),E_USER_ERROR); 
?>