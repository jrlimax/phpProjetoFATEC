<?php

include("C:\wamp64\www\projeto\conexao.php");

//var_dump($_FILES);
if (isset($_FILES['arquivo'])) {
	$arquivo = $_FILES['arquivo'];

	if ($arquivo['error'])
		die("Falha ao enviar o arquivo.");

	$arquivo = $_FILES['arquivo'];
	if ($arquivo['size'] > 2097152)
		die("Arquivo muito grande !! Max: 2mb");

	$pasta = "arquivos/";
	$nomeDoArquivo = $arquivo['name'];
	$novoNomeDoArquivo = uniqid();
	$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

	if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
		die("Apenas arquivos jpg ou png.");

	$path = $pasta . $novoNomeDoArquivo . "." . $extensao;
	$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

	if ($deu_certo) {
		$mysqli->query("INSERT INTO arquivos (path,user) VALUES('$nomeDoArquivo' ,'$path')") or die($mysqli->error);
		echo "<p>Upload feito com sucesso !</p>";
	} else
		echo "<p>Falha ao enviar o arquivo !</p>";
}

$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);

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
	<form method="POST" enctype="multipart/form-data" action="">
		<p><label for="">Selecione o arquivo</label>
			<input name="arquivo" type="file">
		</p>
		<button name="upload" type="submit">Enviar arquivo</button>
	</form>

	<table border="1" cellpadding="10">
		<thead>
			<th>Preview</th>
			<th>Arquivo</th>
			<th>Data do envio</th>
		</thead>
		<tbody>
			<?php
			while ($arquivo = $sql_query->fetch_assoc()) {
			?>

				<tr>
					<td><img height="50" src="<?php echo $arquivo['user']; ?>" alt=""></td>
					<td><a target="_blank" href="<?php echo $arquivo['user']; ?>"><?php echo $arquivo['path']; ?></a></td>
					<td><?php echo date("d/m/Y H:i", strtotime($arquivo['date_upload'])); ?></td>
				</tr>
			<?php
			}
			?>

		</tbody>
	</table>

</body>

</html>