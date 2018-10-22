<!DOCTYPE html>
		<?php
		    include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/VendaController.class.php");
		    include_once("model/Venda.class.php");		    
			$controle = new VendaController();


			if (isset($_GET['id'])){
				$id=$_GET['id'];
				$controle -> excluir($id);
			}
		?>
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
		 	<a class=" btn btn-default pull-left btn-cadastro" href="cadvenda.php"> Cadastrar Vendas </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		<div class="row">
				<?php
					$listaDeVendas = $controle->listarVendas();
					foreach ($listaDeVendas as $venda) :
				?>
						<div class="caixa-produto col-md-3">
						 	<h1><?=$venda->getCliente()?></h1>
							<h1>Preço de venda: R$<?=$venda->getValorFinal()?></h1>
							<h1>Qtd. no estoque: <?=$venda->getDesconto()?></h1>
							<a class="btn btn-default btn-cadastro" href="vendas.php?op=excluir&id=<?=$venda-> getIdVenda()?>" > excluir venda </a>
							<a class="btn btn-default btn-cadastro" href="dadosvenda.php?id=<?=$venda->getIdVenda()?>"> ver venda </a>
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


