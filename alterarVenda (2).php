<?php
	include_once "controller/VendaController.class.php";
	$controller = new VendaController();
	if(isset($_POST["salvar"])) {
		 $controller -> atualizarVenda($_POST);
	}else{
		$id=$_GET["id"];
		$venda = $controller -> buscarVendaPorIdNoBanco($id);
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<title>Controle de Vendas - Vendas </title>
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
			 	<a class=" btn btn-default pull-left btn-cadastro" href="cadvenda.php"> Cadastrar Venda </a>
		 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
		<form method="post">
			<input type="hidden" name="codigo" value="<?=$venda->getIdVenda()?>" >
			<input type="text" name="produto" value="<?=$venda->getProduto()?>" >
			<input type="text" name="quantvendida" value="<?=$venda->getQuantVendida()?>" >			
			<input type="text" name="desconto" value="<?=$venda->getDesconto()?>" >
			<input type="text" name="valorfinal" value="<?=$venda->getValorFinal()?>" >
			<input type="text" name="valortotal" value="<?=$venda->getValorTotal()?>" >
			<input type="text" name="cliente" value="<?=$venda->getCliente()?>" >

			<button type="submit" name="salvar">Salvar</button>
		</form>
	</body>
</html>