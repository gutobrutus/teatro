<?php
session_start();
function __autoload($classes) {
	require '../classes/'.$classes.'.class.php';
}

if(isset($_GET['logout'])):
	if ($_GET['logout'] == 'ok'):
		Login::deslogar();
		endif;
	endif;

if (isset($_SESSION['logado'])):
	?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de Gerenciamento de Agenda do Teatro</title>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/style.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">S-GAT</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../sistema/listagenda.php">Listar Agenda</a></li>
					<li><a href="../sistema/agendar.php">Solicitar Agenda</a></li>
					<li><a href="principal.php?logout=ok">Sair</a></li>
					<li><a href="../sistema/ajuda.html">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="main" class="container-fluid">
		</br>
		<h3 class="page-header">Seja bem vindo! <?php echo $_SESSION['usuario']; ?></h3>
	</div>
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

 <?php
 else :
	$redi = include 'naopermitido.html';
 	echo $redi;
endif;
?>