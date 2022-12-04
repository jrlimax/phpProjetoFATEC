<?php
require_once 'C:\wamp64\www\phpProjetoFATEC\classes\cadastroImagem.php';
require_once 'C:\wamp64\www\phpProjetoFATEC\DAO\imagemDAO.php';

	//extract($_POST);
	//$arquivo = $file; 

	$novaImagem = new cadastroImagem();
	$novaImagemDAO = new imagemDAO();

	$arquivo = $_FILES['arquivo'];

	if ($arquivo['size'] > 2097152)
		die("Arquivo muito grande !! Max: 2mb");

	$pasta = "C:/wamp64/www/phpProjetoFATEC/arquivos/";
	$nomeDoArquivo = $arquivo['name'];
	$novoNomeDoArquivo = uniqid();
	$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

	if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
		die("Apenas arquivos jpg/png/jpeg.");

	$path = $pasta . $novoNomeDoArquivo . "." . $extensao;
	$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

	$novaImagem->setUser($_POST['user']);
	$novaImagem->setUser_insta($_POST['user_insta']);
	$novaImagem->setUser_twitter($_POST['user_twitter']);
	$novaImagem->setPath($path);

	$novaImagemDAO->insertImg($novaImagem);

	header('Location: /index.php');
