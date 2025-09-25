<?php
// logar.php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <meta name="description" content="Login" />
    <link rel="stylesheet" type="text/css" href="css/login/css/style.css" />
    <script src="css/login/js/modernizr.custom.63321.js"></script>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <header>
        <div class="support-note">
            <span class="note-ie">Desculpe, apenas navegadores modernos.</span>
        </div>
    </header>

    <?php
    // Mensagens de feedback (sem avisos e sem XSS)
    $erro  = isset($_GET['login_errado']) ? (string)$_GET['login_errado'] : '';
    $logar = isset($_GET['logar']) ? (string)$_GET['logar'] : '';
    $msg = '';

    if ($erro === 'erro') {
        $msg = 'Login ou senha não conferem.';
    } elseif ($logar === 'errar') {
        $msg = 'Você tem permissão para acessar somente com aparelho mobile.';
    }
    if ($msg !== '') {
        echo '<div id="erro" style="color:#b00;background:#fee;padding:10px;border:1px solid #f99;margin-bottom:14px;border-radius:8px;">'
            . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8')
            . '</div>';
    }
    ?>

    <section class="main">
        <form class="form-1" action="login.php" method="POST" autocomplete="off" novalidate>
            <p class="field">
                <label>
                    <input type="text" name="login" placeholder="Digite o Nome de Acesso" required>
                </label>
                <i class="icon-user icon-large"></i>
            </p>
            <p class="field">
                <label>
                    <input type="password" name="senha" placeholder="Digite sua Senha" required>
                </label>
                <i class="icon-lock icon-large"></i>
            </p>
            <p class="submit">
                <button type="submit" name="logar" value="1" aria-label="Entrar">
                    <i class="icon-arrow-right icon-large"></i>
                </button>
            </p>
        </form>
    </section>
</div>
<div style="font-weight: bold; color:#FFF; width: 100%; text-align: center;">CyberUP Atendimento</div>
</body>
</html>
