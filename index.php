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
	<table border="1" cellpadding="10">
		<thead>
			<th>Preview</th>
			<th>Arquivo</th>
			<th>Data do envio</th>
		</thead>
		<tbody>
			<?php

			include("C:\wamp64\www\projeto\conexao.php");

			$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);

			while ($arquivo = $sql_query->fetch_assoc()) {
			?>

				<tr>
					<td><img height="50" src="<?php echo $arquivo['path']; ?>" alt=""></td>
					<td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['path']; ?></a></td>
					<td><?php echo date("d/m/Y H:i", strtotime($arquivo['date_upload'])); ?></td>
				</tr>
			<?php
			}
			?>

		</tbody>
	</table>

</body>
</html>