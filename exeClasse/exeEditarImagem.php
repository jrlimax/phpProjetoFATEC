<?php
require_once 'C:\wamp64\www\phpProjetoFATEC\DAO\imagemDAO.php';
require_once 'C:\wamp64\www\phpProjetoFATEC\classes\cadastroImagem.php';

$novaImagem = new cadastroImagem();
$imagem = new imagemDAO();

$novaImagem->setId($_POST['editarId']);
$novaImagem->setUser($_POST['editarUser']);
$novaImagem->setUser_insta($_POST['user_insta']);
$novaImagem->setUser_twitter($_POST['user_twitter']);

$imagem->updateImg($novaImagem);

header('Location: /index.php');