<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Banco de Imagens</title>
</head>



<body>

	<form method="POST" enctype="multipart/form-data" action="exeCadastroImagem.php">

		<p>
			<label for="">User</label>
			<input id="user" name="user" type="text">
		</p>

		<p>
			<label for="">Instagram</label>
			<input id="user_insta" name="user_insta" type="text">
		</p>

		<p>
			<label for="">Twitter</label>
			<input id="user_twitter" name="user_twitter" type="text">
		</p>

		<p>
			<label for="">Selecione o arquivo</label>
			<input id="path" name="arquivo" type="file">
		</p>

		<button name="upload" type="submit">Enviar arquivo</button>
	</form>
	<h1>TESTE</h1>

	<?php
	include("DAO/imagemDAO.php");
	$img = new imagemDAO();
	$arrImg = $img->findAll();

	foreach ($arrImg as $img) {
		echo "<div>";
		echo $img->getData_upload() . "<br>";
		echo $img->getId() . "<br>";
		echo $img->getPath() . "<br>";
		echo $img->getUser() . "<br>";
		echo $img->getUser_insta() . "<br>";
		echo $img->getUser_twitter() . "<br>";
		echo "</div>";
	}
	?>

</body>

</html>