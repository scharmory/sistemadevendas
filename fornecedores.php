<!DOCTYPE html>
		<?php
			include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/FornecedorController.class.php");
		    include_once("model/Fornecedor.class.php");		    
			$controle = new FornecedorController();


			if (isset($_GET['id'])){
				$id=$_GET['id'];
				$controle -> excluir($id);
			}
		?>
<html>
	<head>
		<title>Controle de Vendas - Fornecedores </title>
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
		 	<a class=" btn btn-default pull-left btn-cadastro" href="cadFornecedor.php"> Cadastrar Fornecedores </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		<div class="row">
				<?php
					$listaDeFornecedor = $controle->listarFornecedores();
					foreach ($listaDeFornecedor as $fornecedor) :
				?>
						<div class="caixa-produto col-md-3">
						 	<h1><?=$fornecedor->getNome()?></h1>
						 	<h1>Cod.<?=$fornecedor->getIdFornecedor()?></h1>
							<h1><?=$fornecedor->getEndereco()?></h1>
							<h1><?=$fornecedor->getTelefone()?></h1>
							<a class="btn btn-default btn-cadastro" href="fornecedores.php?op=excluir&id=<?=$fornecedor->getIdFornecedor()?>" > excluir fornecedor </a>
							<a class="btn btn-default btn-cadastro" href="dadosfornecedor.php?id=<?=$fornecedor->getIdFornecedor()?>"> ver fornecedor </a>
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


