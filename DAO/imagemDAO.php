<?php
require_once 'C:\wamp64\www\phpProjetoFATEC\DAO\conexao.php';
require_once 'C:\wamp64\www\phpProjetoFATEC\classes\cadastroImagem.php';

class imagemDAO extends DB
{
	public function inserir($novaImagem)
	{

		$sql = "INSERT INTO `arquivos` (path,user,user_insta, user_twitter) VALUES(:path ,:user, :user_insta, :user_twitter)";
		$stmt = DB::prepare($sql);
		$stmt->bindValue('path', $novaImagem->getPath());
		$stmt->bindValue('user', $novaImagem->getUser());
		$stmt->bindValue('user_insta', $novaImagem->getUser_insta());
		$stmt->bindValue('user_twitter', $novaImagem->getUser_twitter());

		try
		{
			$stmt->execute();
			echo "Sucesso ao inserir cooperativa<br>", $novaImagem->getPath();
		} catch (Exception $e)
		{
			echo "Erro ao inserir cooperativa: " . $e->getMessage();
		}

		echo "<br><a href=index.php>Voltar</a>";
	}
}
?>
