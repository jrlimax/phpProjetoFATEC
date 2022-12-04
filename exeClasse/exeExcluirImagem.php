<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/cadastroImagem.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/DAO/imagemDAO.php');



	$artigoDao = new imagemDAO();
	$artigoDao->deleteImg($_GET['excluirId']);

echo $_GET['excluirId'];
echo "<br><a href=/index.php>Voltar</a>";
