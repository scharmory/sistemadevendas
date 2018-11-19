<?php
	include_once "controller/FornecedorController.class.php";
	$controller = new FornecedorController();
	if(isset($_POST["salvar"])) {
		 $controller -> atualizarFornecedor($_POST);
	}else{
		$id=$_GET["id"];
		$fornecedor = $controller -> buscarFornecedorPorIdNoBanco($id);
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<title>Controle de Vendas - Fornecedors </title>
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
			 	<a class=" btn btn-default pull-left btn-cadastro" href="cadfornecedor.php"> Cadastrar Fornecedor </a>
		 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
		<form method="post">
			<input type="hidden" name="codigo" value="<?=$fornecedor->getIdFornecedor()?>" >
			<input type="text" name="nome" value="<?=$fornecedor->getNome()?>" >
			<input type="text" name="endereco" value="<?=$fornecedor->getEndereco()?>" >
			<input type="text" name="telefone" value="<?=$fornecedor->getTelefone()?>" >

			<button type="submit" name="salvar">Salvar</button>
		</form>
	</body>
</html>