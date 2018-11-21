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
		<link rel="stylesheet" href="datatables/datatables.min.css" />
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
				<table class="table" id="tabela_registro">
		            <thead>
		                <tr>                       
		                    <th>Produto</th>
		                    <th>Quant. Vendida</th>
		                    <th>Desconto</th>       
		                    <th>Valor Total</th>   
		                   	<th>Valor Final</th>                 
		                    <th>Cliente</th>    
		      				<th></th>                          
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                	$listaDeVendas = $controle->listarVendas();
							foreach ($listaDeVendas as $venda) :
						?>
								<tr class='gradeA'>
									<td><?=$venda->getProduto()?></td>
									<td><?=$venda->getQuantVendida()?></td>
									<td><?=$venda->getDesconto()?></td>
									<td><?=$venda->getValorTotal()?></td>
									<td><?=$venda->getValorFinal()?></td>
									<td><?=$venda->getCliente()?></td>
									<td>
										<a class="btn-cadastro" href="vendas.php?op=excluir&id=<?=$venda-> getIdVenda()?>" > excluir venda </a>
										<a class="btn-cadastro" href="alterarVenda.php?id=<?=$venda-> getIdVenda()?>" > editar venda </a>
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


