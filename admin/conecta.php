<?php
	//conectar com o banco de dados
	try {
		//dados do servidor
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "damianacruz";
		$con = new PDO ( "mysql:host=$servidor;
			dbname=$banco;
			charset=utf8",
			$usuario,
			$senha );
	} catch ( PDOException $e ) {
		//mostrar erro na tela
		echo "Erro ao conectar: " . 
		$e->getMessage();
	}

	//funcao para retornar data em usa
	function formatardata($data) {
		//05/10/2016 -> 2016-10-05
		$d = explode("/",$data);
		//print_r mostra array
		//print_r($d);
		$data = $d[2]."-".$d[1]."-".$d[0];
		return $data;
	}