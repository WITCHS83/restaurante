<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

// Dados de acesso
$host         = "sql302.infinityfree.com";
$usuario      = "if0_40003100";
$senhadobanco = "AdCmW141719";
$nomedobanco  = "if0_40003100_restnovo";

// Inicializa conexão
$conn = mysqli_init();
mysqli_real_connect(
    $conn,
    $host,
    $usuario,
    $senhadobanco,
    $nomedobanco,
    3306,
    null,
    MYSQLI_CLIENT_MULTI_RESULTS
);

// Verifica erro de conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão MySQL: " . mysqli_connect_error());
}

// Define charset
mysqli_set_charset($conn, "utf8mb4");
