<?php
require_once 'C:\wamp64\www\phpProjetoFATEC\DAO\imagemDAO.php';

$img = new imagemDAO();
$imgInfo = $img->findById($_GET['editarId']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

	<h1>ALTERAR IMAGEM </h1>

	<form method="POST" action="\exeClasse\exeEditarImagem.php">

		<input type="hidden" id="editarId" name="editarId" value="<?php echo $_GET['editarId'];?>" />
		
		<p>
		<p>User atual: <?php echo $imgInfo->getUser() . "<br>"; ?></p>
		<label for="">Insira o novo User</label>
		<input id="editarUser" name="editarUser" type="text" value="<?php echo $imgInfo->getUser();?>">
		</p>

		<p>
		<p>User atual: <?php echo $imgInfo->getUser_insta() . "<br>"; ?></p>
		<label for="">Insira o novo Instagram</label>
		<input id="editarUser_insta" name="user_insta" type="text" value="<?php echo $imgInfo->getUser_insta();?>">
		</p>

		<p>
		<p>User atual: <?php echo $imgInfo->getUser_twitter() . "<br>"; ?></p>
		<label for="">Insira o novo Twitter</label>
		<input id="editarUser_twitter" name="user_twitter" type="text" value="<?php echo $imgInfo->getUser_twitter();?>">
		</p>

		<button name="upload" type="submit">Enviar alteração</button>
	</form>
</body>

</html>