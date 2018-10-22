<!DOCTYPE html>
		<?php
		    include_once("controller/LoginController.class.php");
			$controle  = new LoginController();
			$controle->verificaLogado();
		?>
<html>
	<head>
		<title>Controle de Vendas </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
			 <br>
			 <img class="img-titulo" src="imagens/siver-roxo.png">
			 <br>
			 	<a class=" btn btn-default float-left btn-cadastro" href="fornecedores.php" > Voltar para os fornecedores</a>
				<a class=" btn btn-default pull-left btn-cadastro" href="produtos.php"> Produtos </a>
				<a class=" btn btn-default pull-left btn-cadastro" href="clientes.php"> Clientes </a>
				<a class=" btn btn-default pull-left btn-cadastro" href="fornecedores.php"> Fornecedores </a>
				<a class=" btn btn-default pull-left btn-cadastro" href="funcionarios.php"> Funcionários</a>
				<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
			<div class="apresentacao">
				<h1> ---------- Escrever aqui ----------</h1>
			</div>
			
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" ></script>
	</body>
</html>

