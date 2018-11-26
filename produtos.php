<!DOCTYPE html>
		<?php
		    include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/ProdutoController.class.php");
		    include_once("model/Produto.class.php");		    
			$controle = new ProdutoController();
			$mostra = "none";

			if (isset($_GET['id'])){

				$id=$_GET['id'];
				$retorno = $controle -> excluir($id);
				echo $retorno;
			}
		?>
<html>
	<head>
		<title>Controle de Vendas - Produtos </title>
		<meta charset="utf-8">
		<link href="fontawesome-5.0.13/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="datatables/datatables.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
			<?php
				if(isset($retorno)){
					$mostra = "block";
					if($retorno > 0){
						$mensagem =  "Produto Excluído!";
						$titulo = "Sucesso";
						$tipo = "success";
					}else{
						$mensagem = "Não foi possível excluir o produto, verifique se ele já foi vendido";
						$titulo = "Atenção";
						$tipo = "warning";
					}
				}

			?>
			<div class="alert alert-<?=$tipo?> alert-dismissible fade show" role="alert" style="display:<?=$mostra?>">
			  <strong><?=$titulo?> !</strong> <?=$mensagem?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button> 
			</div>
			<br>
			<img class="img-titulo" src="imagens/siver-roxo.png">
			<br>
			<a class=" btn btn-default float-left btn-cadastro" href="inicio.php" > Voltar </a>
		 	<a class=" btn btn-default pull-left btn-cadastro" href="info-produto.php"> Cadastrar Produto </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		<div class="row">
				<?php
					$listaDeProdutos = $controle->listarProdutos();
					foreach ($listaDeProdutos as $produto) :
					endforeach;
				?>
			</div>
			<div class="row">
				<table class="table" id="tabela_registro">
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
										<a class="btn-excluir" href="produtos.php?op=excluir&id=<?=$produto-> getIdProduto()?>" >  <i class="far fa-trash-alt"></i> </a>
										<a class="btn-editar"  href="info-produto.php?id=<?=$produto->getIdProduto()?>"><i class="fas fa-pencil-alt"></i> </a>
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




