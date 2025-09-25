<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
// ALTERE OS DADOS DAS STRINGS (NOMES QUE ESTÃO ENTRE AS ASPAS)
$host = "sql302.infinityfree.com"; // endereco do banco de dados
$usuario = "if0_40003100"; // usuario do banco de dados
$senhadobanco = "AdCmW141719"; // senha do banco de dados
$nomedobanco = "if0_40003100_restnovo"; //nome do banco de dados

// NÃO ATERAR NADA DAQUI PARA BAIXO
$db = mysqli_connect($host,$usuario,$senhadobanco) or die (mysqli_error());
$banco = mysqli_select_db($nomedobanco,$db)or die (mysqli_error());
mysqli_set_charset('utf8');
?>
