<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
// ALTERE OS DADOS DAS STRINGS (NOMES QUE ESTÃO ENTRE AS ASPAS)
$host = "sql302.infinityfree.com"; // endereco do banco de dados
$usuario = "if0_40003100"; // usuario do banco de dados
$senhadobanco = "AdCmW141719"; // senha do banco de dados
$nomedobanco = "if0_40003100_restnovo"; //nome do banco de dados

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $usuario, $senhadobanco, $nomedobanco, 3306, null, MYSQLI_CLIENT_MULTI_RESULTS);
if (!$conn) {
    die("Falha na conexão MySQL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");
?>
