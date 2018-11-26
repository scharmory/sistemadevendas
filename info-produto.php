<!DOCTYPE html>
<?php
	include_once 'controller/ProdutoController.class.php';
	$controle = new ProdutoController();
	$produto = new Produto();
	if(isset($_POST['btn-cadastrar'])){
		if($_POST["codigo"] != 0){
			$controle -> atualizarProduto($_POST);
		}else{
			$controle->salvarProdutoNoBanco($_POST);
		}
		header("location: produtos.php");
	}
	if(isset($_GET["id"])){
		$titulo = "Altere o Produto";
		$id=$_GET["id"];
		$produto = $controle -> buscarProdutoPorIdNoBanco($id);
	}else{
		$titulo = "Cadastre um Produto";
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
							<h3><?=$titulo?></h3>
						</div>
						<form id="formCadastro" name="formCadastro" method="POST">
							<input type="hidden" name="codigo" value="<?=$produto->getIdProduto()?>" >
							<div class="form-group">
								<label for="clogin">Nome do Produto</label>
								<input type="text" name="cnomepro" id="nomepro" class="form-control" placeholder="Digite o nome do produto" required value="<?=$produto->getNome()?>"/>
							</div>
							<div class="form-group">
								<label for="preco">Preço de custo</label>
								<input type="text" name="cprecoc" id="preco" class="form-control" placeholder="Digite o preço de custo do produto" required value="<?=$produto->getPrecoc()?>"/>
							</div>
							<div class="form-group">
								<label for="preco">Preço de venda</label>
								<input type="text" name="cprecov" id="preco" class="form-control" placeholder="Digite o preço de venda do produto" required value="<?=$produto->getPrecov()?>"/>
							</div>
							<div class="form-group">
								<label for="estoque">Quantidade no Estoque</label>
								<input type="text" name="cestoque" id="estoque" class="form-control" placeholder="Digite a quantidade do produto disponível no estoque"required value="<?=$produto->getEstoque()?>"/>
							</div>
							<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Confirmar">
						</form>
				</div>
	</body>
</html>