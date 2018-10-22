<!DOCTYPE html>
<?php
	include_once 'controller/VendaController.class.php';
	$controle = new VendaController();
	$listaDeProdutos = $controle->listarProdutos();
	$listaDeClientes = $controle->listarClientes();
	if(isset($_POST['btn-cadastrar'])){
		$controle->salvarVendaNoBanco($_POST);
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
			 <a class=" btn btn-default float-left btn-cadastro" href="vendas.php" > Voltar </a>
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
							<h3>Cadastre seus vendas</h3>
						</div>
						<form id="formCadastro" name="formCadastro" method="POST">
							<div class="form-group">
								<label for="produto">Produto</label>
									<select name="produto" id="produto" class="form-control" required="">
										<option value="">Selecione um Produto</option>
										<?php
											foreach ($listaDeProdutos as $produto) {
										?>
											<option value="1"> <?=$produto->getNome()?> </option>
										<?php
											}
										?>
									</select>
							</div>
							<div class="form-group">
								<label for="quantvenda">Quantidade Vendida</label>
								<input type="text" name="quantvenda" id="quantvenda" class="form-control" placeholder="Digite a quantidade vendida do produto" required/>
							</div>
							<div class="form-group">
								<label for="desconto">Desconto</label>
								<input type="text" name="desconto" id="desconto" class="form-control" placeholder="Digite o preço de venda do produto" required/>
							</div>
							<div class="form-group">
								<label for="valort">Valor total (sem desconto)</label>
								<input type="text" name="valort" id="valort" class="form-control" placeholder="Digite o preço de venda do produto" required/>
							</div>
							<div class="form-group">
								<label for="valorf">Valor final</label>
								<input type="text" name="valorf" id="valorf" class="form-control" placeholder="Digite o preço de venda do produto" required/>
							</div>
							<div class="form-group">
								<label for="cliente">Cliente</label>
								<select name="cliente" id="cliente" class="form-control" required="">
									
										<option value="">Selecione um Produto</option>
										<?php
											foreach ($listaDeClientes as $cliente) {
										?>
											<option value="1"> <?=$cliente->getNome()?> </option>
										<?php
											}
										?>
								</select>
							</div>
							<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Cadastrar Venda">
						</form>
					</div>
	</body>
</html>