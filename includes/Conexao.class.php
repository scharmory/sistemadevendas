<?php

class Conexao{
	private static $conexao;

	private function __construct(){
		$usuarioBanco 		= "root";
		$senhaBanco 		= "";
		$nomeBanco 			= "controledevendas";
		$enderecoLinkHost = "localhost";
		
		try{
			self::$conexao = new PDO("mysql:host=$enderecoLinkHost;dbname=$nomeBanco", $usuarioBanco, $senhaBanco);
			self::$conexao->exec("SET CHARACTER SET utf8");
		}catch(PDOException $erro){
			echo "Não Conectou ". $erro->getMessage();
		}
	}

	public static function meDeAConexao(){
		if(!self::$conexao){
			new Conexao();
		}
		return self::$conexao;

	}
}
?>