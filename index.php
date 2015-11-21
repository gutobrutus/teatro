<?php
session_start();
//require_once 'classes/conexao.class.php';
//require_once 'classes/login.class.php';
function __autoload($classes) {
    require_once 'classes/' . $classes . '.class.php';
}

if (isset($_POST['entrar'])) :
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

    //$select = new Crud;

    $l = new Login;
    $l -> setLogin($login);
    $l -> setSenha($senha);

    if ($l -> logar()) :
        header("Location: sistema/principal.php");
    else :
        $erro = "Erro ao acessar o sistema, verifique sua senha e/ou login.";
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt_br">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Sistema de Controle de Eventos - Teatro</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="bootstrap/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<form action="" method="post" id="form_login>
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
          <h1 class="text-center">Acessar o Sistema</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="login" placeholder="Nome de usuário">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="senha" placeholder="Senha">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit" name="entrar">Acessar</button>
              <span class="pull-right"><a href="sistema/cadusuario.php">Registrar-se</a></span><span><a href="#">Precisa de ajuda?</a></span>
            </div>
            <p style="color: red"><?php echo isset($erro) ? $erro : ''; ?></p>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
              
             </div>	
      </div>
  </div>
  </div>
</div>
</form>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
