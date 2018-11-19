<!DOCTYPE html>
<?php
	include_once 'controller/FornecedorController.class.php';
	$controle = new FornecedorController();
	if(isset($_POST['btn-cadastrar'])){
		$controle->salvarFornecedorNoBanco($_POST);
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
							<h3>Cadastre seus fornecedores</h3>
						</div>
						<form id="formCadastro" name="formCadastro" method="POST">
							<div class="form-group">
								<label for="nomec">Nome do Fornecedor</label>
								<input type="text" name="nomef" id="nomef" class="form-control" placeholder="Digite o nome do fornecedor" required/>
							</div>
							<div class="form-group">
								<label for="endereco">Endereço</label>
								<input type="text" name="enderecof" id="enderecof" class="form-control" placeholder="Digite o endereço do fornecedor" required/>
							</div>
							<div class="form-group">
								<label for="estoque">Telefone</label>
								<input type="text" name="telefonef" id="telefonef" class="form-control" placeholder="Digite o número de telefone fixo do fornecedor"required/>
							</div>
							<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Cadastrar Fornecedor">
						</form>
					</div>
	</body>
</html>

