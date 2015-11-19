<?php
session_start ();
function __autoload($classes) {
	require '../classes/' . $classes . '.class.php';
}

if (isset ( $_GET ['logout'] )) :
	if ($_GET ['logout'] == 'ok') :
		Login::deslogar ();
	
		endif;

	endif;

if (isset ( $_SESSION ['logado'] )) :
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
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
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
		<h3 class="page-header">Seja bem vindo! <?php echo $_SESSION['usuario']; ?></h3>
	</div>

	<div id="main" class="container-fluid">
		<h3 class="page-header">Lista de Pautas</h3>
		<form action="index.html">

			<!-- <div id="main" class="container-fluid">
     <div id="top" class="row">
 		<div class="col-md-3">
        	<h2>Pautas</h2>
   		 </div> -->

			<!-- <div class="col-md-6">
        <div class="input-group h2">
            <input name="data[search]" class="form-control" 
            	id="search" type="text" placeholder="Pesquisar Itens">
          		 <span class="input-group-btn">
                	<button class="btn btn-primary" type="submit">
                    	<span class="glyphicon glyphicon-search"></span>
                	</button>
            	</span>
        	</div>
   	 	</div> -->

			<div class="col-md-12">
				<a href="add.html" class="btn btn-primary pull-right h2">Nova
					Solicitação</a>
			</div>
	
	</div>
	<!-- /#top -->

	<hr />
	<div id="list" class="row">

		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Título</th>
						<th>Hora</th>
						<th>Data</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>

					<tr>
					
					<?php 
						$eventos = new Eventos;
						foreach($eventos->buscarTodos() as $key => $value):	?>
						<td><?php echo $value->id; ?></td>
						<td><?php echo $value->titulo; ?></td>
						<td><?php echo $value->data; ?></td>
						<td><?php echo $value->hora; ?></td>
						<td class="actions"><a class="btn btn-success btn-xs" href="view.php">Visualizar</a> 
						<!--  <a class="btn btn-warning btn-xs" href="edit.html">Editar</a> -->
						<!--   <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" -->
						<!--    data-target="#delete-modal">Excluir</a>--> <!--  </td> -->
					</tr>				
				</tbody>
				<?php endforeach; ?>
			</table>

		</div>

	</div>
	<!-- /#list -->

	<div id="bottom" class="row">

		<div class="col-md-12">

			<ul class="pagination">
				<li class="disabled"><a>&lt; Anterior</a></li>
				<li class="disabled"><a>1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
			</ul>
			<!-- /.pagination -->

		</div>

	</div>
	<!-- /#bottom -->
	</div>
	<!-- /#main -->
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
