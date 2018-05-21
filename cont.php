<?php
	function getConnection() {
	$host = "localhost";
	$banco = "controledevendas";
	$usuario = "root";
	$senha = "";
	try {
		$conn = new PDO("mysql:host=$host; dbname=$banco", $usr, $senha);
		return array("conxexao" => $conn, "mensagem" => "Conectado");
		} 
		catch (PDOException $e) {
		return array("conxexao" => null, "mensagem" => "Ocorreu o seguinte erro:<br>" . $e->getMessage());
		}
		}
		$teste = getConnection();
		print_r($teste["mensagem"]);



?>