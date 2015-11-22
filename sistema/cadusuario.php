<?php
	function __autoload($classes) {
		require_once '../classes/'.$classes.'.class.php';
	}

if (isset($_POST['cadastrar'])):
	$login = filter_input(INPUT_POST,"login", FILTER_SANITIZE_MAGIC_QUOTES);
	$senha = filter_input(INPUT_POST,"senha", FILTER_SANITIZE_MAGIC_QUOTES);
	$confirmarsenha = filter_input(INPUT_POST,"confirmarsenha", FILTER_SANITIZE_MAGIC_QUOTES);
	$nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_MAGIC_QUOTES);
	$email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_MAGIC_QUOTES);
	$confirmaremail = filter_input(INPUT_POST,"confirmaremail", FILTER_SANITIZE_MAGIC_QUOTES);
	
	if ($senha != $confirmarsenha):
		$erro_senha = "Senhas informadas divergentes!";
	endif;
	if ($email != $confirmaremail):
		$erro_email = "Os e-mails informados não conferem!";
	endif;
	
	if (isset($erro_senha) || isset($erro_email)){
		
	}else{
		$usuario = new Usuarios();
		$usuario -> setLogin($login);
		$usuario -> setSenha($senha);
		$usuario -> setNome($nome);
		$usuario -> setEmail($email);
		//Inserindo na tabela usuários
		if($usuario->inserir()){
			?><script type="text/javascript">
				<!--//-->
				window.alert("Usuário cadastrado com sucesso!");
			</script>
	<?php }
                }
                endif;
            ?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Sistema de Controle de Eventos - Teatro</title>
<meta name="generator" content="Bootply" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<link href="../bootstrap/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<form class="form-horizontal" action="" method="post">
						<fieldset>

							<!-- Form Name -->
							<legend class="text-center text-primary">Cadastrar Usuário no Sistema</legend>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="textinput">Login:</label>
								<div class="col-md-5">
									<input id="textinput" name="login"
										placeholder="Digite o nome de usuário"
										class="form-control input-md" required="" type="text">
								</div>
							</div>

							<!-- Password input-->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="passwordinput">Senha:</label>
								<div class="col-md-5">
									<input id="passwordinput" name="senha"
										placeholder="Digite uma senha" class="form-control input-md"
										required="" type="password">
								</div>
							</div>

							<!-- Password input-->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="passwordinput">Comfrme
									a senha:</label>
								<div class="col-md-5">
									<input id="passwordinput" name="confirmarsenha"
										placeholder="Digite novamente a senha"
										class="form-control input-md" required="" type="password">
								</div>
								<p style="color: red"><?php echo isset($erro_senha) ? $erro_senha : ''; ?></p>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="textinput">Nome:</label>
								<div class="col-md-6">
									<input id="textinput" name="nome"
										placeholder="Digite seu nome completo"
										class="form-control input-md" required="" type="text">
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="textinput" >E-mail:</label>
								<div class="col-md-6">
									<input id="textinput" name="email"
										placeholder="Digite seu  e-mail" class="form-control input-md"
										required="" type="text">
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="textinput">Confirme o
									e-mail:</label>
								<div class="col-md-6">
									<input id="textinput" name="confirmaremail"
										placeholder="Digite novamente o e-mail"
										class="form-control input-md" type="email">
								</div>
								<p style="color: red"><?php echo isset($erro_email) ? $erro_email : ''; ?></p>
							</div>
							

							<!-- Button (Double) -->
							<div class="form-group">
								<label class="col-md-4 control-label text-center text-primary" for="button1id"></label>
								<div class="col-md-8">
									<button id="button1id" name="cadastrar" class="btn btn-success"
										type="submit">Cadastrar</button>
									<a href="../index.php" name="cancelar" class="btn btn-danger" class="btn btn-link">Cancelar</a>
								</div>
							</div>
						</fieldset>
					</form>
					<!-- script references -->
					<script
						src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"
						type="text/javascript"></script>
					<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
				</div>
			</div>
		</div>
	</div>
</body>
</html>