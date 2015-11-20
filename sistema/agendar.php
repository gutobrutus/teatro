<?php
session_start();
function __autoload($classes) {
	require '../classes/'.$classes.'.class.php';
}

if(isset($_GET['logout'])):
	if ($_GET ['logout'] == 'ok'):
		Login::deslogar();
		endif;
	endif;

if (isset($_SESSION['logado'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de Gerenciamento de Agenda do Teatro</title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

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
					<li><a href="../sistema/ajuda.html">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="main" class="container-fluid">
		</br>
		<!-- <h3 class="page-header">Seja bem vindo!</h3>  -->
		<h3 class="page-header">Seja bem vindo! <?php echo $_SESSION['usuario']; ?></h3>
	</div>



	<div id="main" class="container-fluid">
		<h3 class="page-header">Solicitar Agenda</h3>
		<form action="index.html">

			<div class="form-group col-md-6">
				<label for="campo1">Título</label> 
				<input type="text" class="form-control" id="campo1" required="" name="titulo">
			</div>

			<div class="form-group col-md-3">
				<label for="calendario">Data (DD/MM/AAAA)</label> 
				<input type="text"class="form-control" id="calendario" required="" name="data">
			</div>


			<script>
			$(function() {
    			$("#calendario").datepicker({
        			dateFormat: 'dd/mm/yy',
        			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        			dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        			monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        			monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    			});
			});
</script>

			<div class="form-group col-md-3">
				<label for="hora">Hora (HH:MM)</label> 
				<input type="time" class="form-control" name="hora" required="" name="hora">
			</div>

			<div class="form-group col-md-12">
				<label for="campo4">Descrição</label> 
				<textarea rows="5" class="form-control" id="campo4" required="" name="descricao"></textarea>
			</div>
	
	</div>

	<!-- area de campos do formulario -->

	<hr />
	<div id="actions" class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.html" class="btn btn-default">Cancelar</a>

		</div>
	</div>
	</form>

	<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
 <?php
 else :
	$redi = include 'naopermitido.html';
 	echo $redi;
endif;
?>
