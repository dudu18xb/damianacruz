<?php
	//iniciar a sessao
	session_start();

	unset($_SESSION["id"]);
	unset($_SESSION["login"]);
	unset($_SESSION["nome"]);
	unset($_SESSION["tentativas"]);

	header("Location:index.php");