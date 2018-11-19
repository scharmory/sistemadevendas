<?php
	include_once "controller/ClienteController.class.php";
	$controller = new ClienteController();
	if(isset($_POST["salvar"])) {
		 $controller -> atualizarCliente($_POST);
	}else{
		$id=$_GET["id"];
		$cliente = $controller -> buscarClientePorIdNoBanco($id);
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<title>Controle de Vendas - Clientes </title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
			<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
				<br>
				<img class="img-titulo" src="imagens/siver-roxo.png">
				<br>
				<a class=" btn btn-default float-left btn-cadastro" href="inicio.php" > Voltar </a>
			 	<a class=" btn btn-default pull-left btn-cadastro" href="cadcliente.php"> Cadastrar Cliente </a>
		 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
		<form method="post">
			<input type="hidden" name="codigo" value="<?=$cliente->getIdCliente()?>" >
			<input type="text" name="nome" value="<?=$cliente->getNome()?>" >
			<input type="text" name="endereco" value="<?=$cliente->getEndereco()?>" >
			<input type="text" name="celular" value="<?=$cliente->getCelular()?>" >
			<input type="text" name="telefone" value="<?=$cliente->getTelefone()?>" >

			<button type="submit" name="salvar">Salvar</button>
		</form>
	</body>
</html>