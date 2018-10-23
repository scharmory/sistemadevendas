<?php
	include_once "controller/ProdutoController.class.php";
	$controller = new ProdutoController();
	if(isset($_POST["salvar"])) {
		 $controller -> atualizarProduto($_POST);
	}else{
		$id=$_GET["id"];
		$produto = $controller -> buscarProdutoPorIdNoBanco($id);
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<title>Controle de Vendas - Produtos </title>
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
			 	<a class=" btn btn-default pull-left btn-cadastro" href="cadproduto.php"> Cadastrar Produto </a>
		 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
		<form method="post">
			<input type="hidden" name="codigo" value="<?=$produto->getIdProduto()?>" >
			<input type="text" name="nome" value="<?=$produto->getNome()?>" >
			<input type="text" name="precoc" value="<?=$produto->getPrecoc()?>" >
			<input type="text" name="precov" value="<?=$produto->getPrecov()?>" >
			<input type="text" name="estoque" value="<?=$produto->getEstoque()?>" >

			<input type="submit" name="salvar">
		</form>
	</body>
</html>