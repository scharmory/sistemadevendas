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
		<link rel="stylesheet" href="datatables/datatables.min.css" />
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
	 		<div class="row">
				<?php
					$listaDeProdutos = $controle->listarProdutos();
					foreach ($listaDeProdutos as $produto) :
					endforeach;
				?>
			</div>
			<div class="row">
				<table class="display" id="tabela_registro">
		            <thead>
		                <tr>                       
		                    <th>Nome</th>         
		                    <th>Preço de Custo</th>   
		                   	<th>Preço de Venda</th>                 
		                    <th>Qtd. no Estoque</th>    
		      				<th></th>                          
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                	$listaDeProdutos = $controle->listarProdutos();
							foreach ($listaDeProdutos as $produto) :
						?>
								<tr class='gradeA'>
									<td><?=$produto->getNome()?></td>
									<td><?=$produto->getPrecoc()?></td>
									<td><?=$produto->getPrecov()?></td>
									<td><?=$produto->getEstoque()?></td>
									<td>
										<a class="btn-cadastro" href="produtos.php?op=excluir&id=<?=$produto-> getIdProduto()?>" > excluir produto </a>
										<a class="btn-cadastro" href="dadosproduto.php?id=<?=$produto->getIdProduto()?>"> ver produto </a>
										<a class="btn-cadastro" href="alterarProduto.php?id=<?=$produto-> getIdProduto()?>" > editar produto </a>
									</td>
								</tr>
						<?php
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="datatables/datatables.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
	</body>
</html>




