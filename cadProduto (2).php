<!DOCTYPE html>
<?php
	include_once 'controller/ProdutoController.class.php';
	$controle = new ProdutoController();
	if(isset($_POST['btn-cadastrar'])){
		$controle->salvarProdutoNoBanco($_POST);
	}

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
			</br>
			 <img class="img-titulo" src="imagens/siver-roxo.png">
			 <a class=" btn btn-default float-left btn-cadastro" href="produtos.php" > Voltar </a>
			 <a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
			<?php 
				if (isset($mensagemCadastro)): 
					echo $mensagemCadastro;
				endif
			?>
					<div class="formulario-login1">
					<!-- formulário -->
						<div class="centralizado">
							<h3>Cadastre seus produtos</h3>
						</div>
						<form id="formCadastro" name="formCadastro" method="POST">
							<div class="form-group">
								<label for="clogin">Nome do Produto</label>
								<input type="text" name="cnomepro" id="nomepro" class="form-control" placeholder="Digite o nome do produto" required/>
							</div>
							<div class="form-group">
								<label for="preco">Preço de custo</label>
								<input type="text" name="cprecoc" id="preco" class="form-control" placeholder="Digite o preço de custo do produto" required/>
							</div>
							<div class="form-group">
								<label for="preco">Preço de venda</label>
								<input type="text" name="cprecov" id="preco" class="form-control" placeholder="Digite o preço de venda do produto" required/>
							</div>
							<div class="form-group">
								<label for="estoque">Quantidade no Estoque</label>
								<input type="text" name="cestoque" id="estoque" class="form-control" placeholder="Digite a quantidade do produto disponível no estoque"required/>
							</div>
							<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Cadastrar Produto">
						</form>
					</div>
	</body>
</html>