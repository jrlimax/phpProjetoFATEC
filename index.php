<?php
include("DAO/imagemDAO.php");
$img = new imagemDAO();
$arrImg = $img->findAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Banco de Imagens</title>
</head>



<body>

	<h1>BANCO DE IMAGENS</h1>

	<form method="POST" enctype="multipart/form-data" action="exeClasse/exeCadastroImagem.php">

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
	
	<h2>Tabela</h2>

	<div>
		
		<?php
		foreach ($arrImg as $img) {
			?>
			<img height="50" src="<?php echo $img->getPath() ?>" alt=""><br>
			<?php
			echo date("d/m/Y", strtotime($img->getData_upload())) . "<br>";
			echo $img->getUser() . "<br>";
			?>
			<a target="_blank" href="https://www.instagram.com/<?php echo $img->getUser_insta()?>">Instagram</a><br>
			<a target="_blank" href="https://www.twitter.com/<?php echo $img->getUser_twitter()?>">Twitter</a><br>


			<nav>
				<a id="editarId" name="editarId" class="botao" href="pages/editarArquivo.php?editarId=<?php echo $img->getId(); ?>">Editar</a>
				<a id="excluirId" name="excluirId" class="botao" href="exeClasse/exeExcluirImagem.php?excluirId=<?php echo $img->getId(); ?>">Excluir</a>
				<br><br>
			</nav>
		<?php

		}
		?>
		</div>
</body>

</html>