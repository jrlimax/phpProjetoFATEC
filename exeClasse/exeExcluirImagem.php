<?php
require_once 'C:\wamp64\www\phpProjetoFATEC\DAO\imagemDAO.php';

$imagem = new imagemDAO();
$imagem->deleteImg($_GET['excluirId']);
header('Location: /index.php');
