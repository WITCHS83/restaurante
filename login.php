<?php
// login.php
declare(strict_types=1);

session_start();
ob_start();

require_once __DIR__ . "/config/conexao.php"; // aqui $conn já vem do include

// Cookies de sessão mais seguros
ini_set('session.cookie_httponly', '1');
// ini_set('session.cookie_secure', '1'); // ative se usar HTTPS

// Só aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: logar.php");
    exit;
}

$login = isset($_POST['login']) ? trim((string)$_POST['login']) : '';
$senha = isset($_POST['senha']) ? (string)$_POST['senha'] : '';

if ($login === '' || $senha === '') {
    header("Location: logar.php?login_errado=erro");
    exit;
}

// Busca usuário no banco
$sql = "SELECT idGarcon, login, senha, nv FROM garcon WHERE login = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    http_response_code(500);
    exit("Erro interno (prepare): " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "s", $login);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = $result ? mysqli_fetch_assoc($result) : null;

// Função para validar senha
function senha_confere(string $senhaDigitada, string $senhaBanco): bool {
    // Se for hash bcrypt/argon
    if (preg_match('/^\$2[ayb]\$|\$argon2(id|i|d)\$/', $senhaBanco) === 1) {
        return password_verify($senhaDigitada, $senhaBanco);
    }
    // Caso legado: senha em texto puro
    return hash_equals($senhaBanco, $senhaDigitada);
}

if ($user && senha_confere($senha, (string)$user['senha'])) {
    session_regenerate_id(true);

    $_SESSION['usuario_id']    = (int)$user['idGarcon'];
    $_SESSION['usuario_login'] = (string)$user['login'];
    $_SESSION['usuario_nv']    = (string)$user['nv'];

    // Direciona de acordo com nv
    if ($user['nv'] === "0") {
        header("Location: inicio.php?btn=inicio");
        exit;
    } elseif ($user['nv'] === "2") {
        header("Location: pedidoscozinha.php");
        exit;
    } elseif ($user['nv'] === "1") {
        unset($_SESSION['usuario_id'], $_SESSION['usuario_login'], $_SESSION['usuario_nv']);
        header("Location: logar.php?logar=errar");
        exit;
    } else {
        unset($_SESSION['usuario_id'], $_SESSION['usuario_login'], $_SESSION['usuario_nv']);
        header("Location: logar.php?login_errado=erro");
        exit;
    }
} else {
    unset($_SESSION['usuario_id'], $_SESSION['usuario_login'], $_SESSION['usuario_nv']);
    header("Location: logar.php?login_errado=erro&logar=errar");
    exit;
}
