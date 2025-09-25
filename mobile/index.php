<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width">
<title>Afornalha - Sistema de vendas</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<!-- mobile -->
<link href="../css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width:800px)">
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="respond.min.js"></script>
</head>
<body>
<div class="gridContainer clearfix">
<div id="LayoutDiv1"><br/>
<figure>
  <img src="../imagens/GriffMobile.png" width="200" height="150">
  </figure>
  <div id="login">
  <div id="erro">
	<?php 
		$erro = $_GET['login_errado'];
		if($erro == "erro"){
		echo "Login ou Senha não conferem.";
		}
		?>
</div>
    <form action="login.php" method="post" enctype="multipart/form-data">
    	Login:
        <label>
         <input name="login" type="text">
        </label>
          Senha:
          <label>
           <input name="senha" type="password">
        </label>
          <input name="logar" type="submit" value="Logar" id="logar">
    
    </form>
</div>
  </div>
</div>
</body>
</html>
