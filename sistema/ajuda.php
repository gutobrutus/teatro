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
				<a class="navbar-brand" href="principal.php">S-GAT</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../sistema/listagenda.php">Listar Agenda</a></li>
					<li><a href="../sistema/agendar.php">Solicitar Agenda</a></li>
					<li><a href="principal.php?logout=ok">Sair</a></li>
					<li><a href="../sistema/ajuda.php">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="main" class="container-fluid">
		</br>
		<h3 class="page-header">Seja Bem-Vindo à nossa página de ajuda, <?php echo $_SESSION['nome']; ?>
		<p>
		<br>
		<br>
		<br>
		</h3>
		<h4>
		O S-GAT é um sistema de gestão de agendas de teatro, voltado para teatros que tenham necessidade de solicitar agendamento de seus eventos, assim como consultar eventos agendados.
		<p>
		<br>
		
		<font color=\"#0000FF\">
		<b>
	FORMAS DE ACESSO
		</font></p></b>
- Somente usuários cadastrados previamente terão acesso ao sistema.
<p>
- A consulta e a solicitação de cadastro de eventos poderão ser realizadas na Internet.
<p>
- Os usuários que se cadastrarem terão login e senha de acesso ao sistema, que darão a garantia de identificação, segurança e autenticidade.
<p>
- Os usuários cadastrados no S-GAT receberão um treinamento para uso do sistema encaminhado para seu e-mail.
<p>
<br>
<font color=\"#0000FF\">
		<b>
	COMO SE CADASTRAR
		</font></p></b>

<p>
- Para se cadastrar no S-GAT, o usuário deve clicar em "Registrar-se" localizado no lado direito logo abaixo do botão "ACESSAR" na página principal.
<p>
- Preencher todos os dados solitados na página de "Cadastrar Usuário no Sistema", e clicar em "Cadastrar".
<p>
- Logo após efetuar o cadastro o usuário poderá acessar o S-GAT normalmente.
<p>
<br>
<font color=\"#0000FF\">
		<b>
	VANTAGENS
		</font></p></b>

<p>
- Sem Barreiras / Fronteiras.
<p>
- Acesso instantâneo aos eventos agendados. Acesso aos eventos de qualquer lugar do mundo, via Internet.
<p>
- Automação na solicitação de agendamentos de eventos.
<p>
- Rapidez na tramitação da solicitação de agendamento de eventos.
<p>
<br>
<font color=\"#0000FF\">
		<b>
	SEGURANÇA
		</font></p></b>

<p>
Todo o acesso é feito através de site seguro.
<p>
<br>
<font color=\"#0000FF\">
		<b>
	ESTRUTURA DO SISTEMA
		</font></p></b>

<p>
O S-GAT é um sistema voltado à web que oferece um meio digital para a tramitação de solicitações de agendamentos de eventos. Com ele, as solicitações terão uma respota mais rápida. O sistema autentica todos os usuários que interagem com sistema.
<p>
<br>
<font color=\"#0000FF\">
		<b>
	REQUISITOS COMPUTACIONAIS
		</font></p></b>

<p>
Navegador de Internet (Internet Explorer 7 ou superior, Mozilla Firefox, Netscape 7.2 ou superior, Google Chrome etc...).
<p>
<br>
<font color=\"#0000FF\">
		<b>
	DESENVOLVEDORES
		</font></p></b>

<p>
- Augusto Ribeiro
<p>
- Junior Aviz
<p>
- Kleiton Costa
<p>
- Saulo Costa
		
		</h4>
		
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