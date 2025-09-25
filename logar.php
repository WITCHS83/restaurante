<!DOCTYPE html>

<html lang="en">

    <head>

		<meta charset="UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>Area Administrativa</title>

        <meta name="description" content="Custom Login Form Styling with CSS3" />

        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />

        <meta name="author" content="Codrops" />

        <link rel="shortcut icon" href="../favicon.ico"> 

        <link rel="stylesheet" type="text/css" href="css/login/css/style.css" />

		<script src="css/login/js/modernizr.custom.63321.js"></script>

		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->

    </head>

    <body>

        <div class="container" style="margin-top: 10%">

		

			<!-- Codrops top bar -->

            <div class="codrops-top">

                

                <span class="right">

                    

                </span>

            </div><!--/ Codrops top bar -->

			

			<header>

			

				

				



				<div class="support-note">

					<span class="note-ie">Desculpe, apenas navegadores modernos.</span>

				</div>

				

			</header>

			<div id="erro">

<?php 

$erro = $_GET['login_errado'];

$logar = $_GET['logar'];

		if($erro == "erro"){

		echo "Login ou Senha n�o conferem.";

		}		

		elseif($logar == "errar"){

		echo "Voc� tem permiss�o para acessar somente com aparelho mobile.";

		}

?>

</div>



			<section class="main">

				<form class="form-1" action="login.php" method="POST">

					<p class="field">

						<input type="text" name="login" placeholder="Digite o Nome de Acesso">

						<i class="icon-user icon-large"></i>

					</p>

						<p class="field">

							<input type="password" name="senha" placeholder="Digite sua Senha">

							<i class="icon-lock icon-large"></i>

					</p>

					<p class="submit">

						<button type="submit" name="logar"><i class="icon-arrow-right icon-large"></i></button>

					</p>

				</form>

			</section>

        </div>
<div style="font-weight: bold; color:#FFF; width: 100%; text-align: center;">CyberUP Atendimento</div>
    </body>

</html>