<?php
// login.php
declare(strict_types=1);

session_start();
ob_start();

require_once __DIR__ . "/config/conexao.php";

// Fortalece cookies de sessão (se tiver HTTPS, ative secure=1):
ini_set('session.cookie_httponly', '1');
// ini_set('session.cookie_secure', '1'); // descomente se estiver em HTTPS

// Valida método e campos
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

// Busca usuário
$sql = "SELECT idGarcon, login, senha, nv FROM garcon WHERE login = ? LIMIT 1";
$conn = 0;
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    // Em produção, logue em arquivo em vez de exibir
    http_response_code(500);
    exit("Erro interno (prepare).");
}
mysqli_stmt_bind_param($stmt, "s", $login);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = $result ? mysqli_fetch_assoc($result) : null;

// Função que checa senha com hash (password_hash) ou com texto puro (legado)
function senha_confere(string $senhaDigitada, string $senhaBanco): bool {
    // Se senha no banco parece um hash bcrypt/argon, use password_verify
    if (preg_match('/^\$2[ayb]\$|\$argon2(id|i|d)\$/', $senhaBanco) === 1) {
        return password_verify($senhaDigitada, $senhaBanco);
    }
    // Fallback legado (texto puro) — **migra para hash o quanto antes**
    return hash_equals($senhaBanco, $senhaDigitada);
}

if ($user && senha_confere($senha, (string)$user['senha'])) {
    // Autenticado: reforça a sessão
    session_regenerate_id(true);

    // Armazene o mínimo necessário
    $_SESSION['usuario_id'] = (int)$user['idGarcon'];
    $_SESSION['usuario_login'] = (string)$user['login'];
    $_SESSION['usuario_nv'] = (string)$user['nv']; // "0", "1", "2"

    // Direciona por nível (mantendo sua lógica original)
    if ((string)$user['nv'] === "0") {
        header("Location: inicio.php?btn=inicio");
        exit;
    } elseif ((string)$user['nv'] === "2") {
        header("Location: pedidoscozinha.php");
        exit;
    } elseif ((string)$user['nv'] === "1") {
        // Sem permissão (mobile only, segundo seu fluxo)
        // Limpa dados de sessão sensíveis
        unset($_SESSION['usuario_id'], $_SESSION['usuario_login'], $_SESSION['usuario_nv']);
        header("Location: logar.php?logar=errar");
        exit;
    } else {
        // Nível inesperado
        unset($_SESSION['usuario_id'], $_SESSION['usuario_login'], $_SESSION['usuario_nv']);
        header("Location: logar.php?login_errado=erro");
        exit;
    }
} else {
    // Falha de login
    unset($_SESSION['usuario_id'], $_SESSION['usuario_login'], $_SESSION['usuario_nv']);
    header("Location: logar.php?login_errado=erro&logar=errar");
    exit;
}
