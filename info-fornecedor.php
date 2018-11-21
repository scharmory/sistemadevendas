<!DOCTYPE html>
<?php
	include_once 'controller/FornecedorController.class.php';
	$controle = new FornecedorController();
	$fornecedor = new Fornecedor();
	
	if(isset($_POST['btn-cadastrar'])){
		if($_POST["codigo"] != 0){
			$controle -> atualizarFornecedor($_POST);
		}else{
			$controle->salvarFornecedorNoBanco($_POST);
		}
		header("location: fornecedores.php");
	}
	if(isset($_GET["id"])){
		$titulo = "Altere o Fornecedor";
		$id=$_GET["id"];
		$fornecedor = $controle -> buscarFornecedorPorIdNoBanco($id);
	}else{
		$titulo = "Cadastre um Fornecedor";
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
			 <a class=" btn btn-default float-left btn-cadastro" href="fornecedores.php" > Voltar </a>
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
				<input type="hidden" name="codigo" value="<?=$fornecedor->getIdFornecedor()?>" >
				<div class="form-group">
					<label for="nomec">Nome do Fornecedor</label>
					<input type="text" name="nomef" id="nomef" class="form-control" placeholder="Digite o nome do fornecedor" required value="<?=$fornecedor->getNome()?>" >
				</div>
				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" name="enderecof" id="enderecof" class="form-control" placeholder="Digite o endereço do fornecedor" required value="<?=$fornecedor->getEndereco()?>" />
				</div>
				<div class="form-group">
					<label for="estoque">Telefone</label>
					<input type="text" name="telefonef" id="telefonef" class="form-control" placeholder="Digite o número de telefone fixo do fornecedor"required value="<?=$fornecedor->getTelefone()?>" />
				</div>
				<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Confirmar">
			</form>
		</div>
	</body>
</html>

