<?php
require_once 'C:\wamp64\www\phpProjetoFATEC\DAO\conexao.php';
require_once 'C:\wamp64\www\phpProjetoFATEC\classes\cadastroImagem.php';

class imagemDAO extends DB
{
	public function insertImg($novaImagem)
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

	public function findAll(){
		$sql = 'SELECT * FROM `arquivos`';
		$stmt = DB::prepare($sql);
		$stmt->execute();
		$arr = $stmt->fetchAll();

		foreach($arr as $chave => $valor){
            $objeto = new cadastroImagem();
            $objeto->setId($valor->id);
            $objeto->setPath($valor->path);
			$objeto->setData_upload($valor->date_upload);
            $objeto->setUser($valor->user);
			$objeto->setUser_insta($valor->user_insta);
            $objeto->setUser_twitter($valor->user_twitter);
            $arrImagens[] = $objeto;
        }
        return $arrImagens;
	}

	
}
?>
