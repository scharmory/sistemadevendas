<?php
	include_once("model/Produto.class.php");
	include_once("dao/DaoProduto.class.php");
	$dao = new DaoProduto ();
	$produto = $dao->buscarProdutoPorIdNoBanco($_GET['id']);
	echo $produto->getPrecov();
?>