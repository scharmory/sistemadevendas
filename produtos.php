<!DOCTYPE html>
		<?php
		    include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/ProdutoController.class.php");
		    include_once("model/Produto.class.php");		    
			$controle = new ProdutoController();


			if (isset($_GET['id'])){
				$id=$_GET['id'];
				$controle -> excluir($id);
			}
		?>
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
		 	<a class=" btn btn-default pull-left btn-cadastro" href="cadproduto.php"> Cadastrar Produtos </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		<div class="row">
				<?php
					$listaDeProdutos = $controle->listarProdutos();
					foreach ($listaDeProdutos as $produto) :
						$lucro = $produto->getPrecov() - $produto->getPrecoc();
				?>
						<div class="caixa-produto col-md-3">
						 	<h1><?=$produto->getNome()?></h1>
							<h1>Preço de venda: R$<?=$produto->getPrecov()?></h1>
							<h1>Qtd. no estoque: <?=$produto->getEstoque()?></h1>
							<h1>Lucro R$: <?=$lucro?></h1>
							<a class="btn btn-default btn-cadastro" href="produtos.php?op=excluir&id=<?=$produto-> getIdProduto()?>" > excluir produto </a>
							<a class="btn btn-default btn-cadastro" href="dadosproduto.php?id=<?=$produto->getIdProduto()?>"> ver produto </a>
						</div>
				<?php
					endforeach;
				?>
			</div>
		</div>
		<?php
			
		?>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" ></script>
	</body>
</html>


