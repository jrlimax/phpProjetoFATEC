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
		$stmt->execute();
	}

	public function findAll()
	{
		$sql = 'SELECT * FROM `arquivos`';
		$stmt = DB::prepare($sql);
		$stmt->execute();
		$arr = $stmt->fetchAll();

		foreach ($arr as $chave => $valor) {
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

	public function deleteImg($imgId)
	{
		$sql = 'DELETE FROM `arquivos` WHERE `arquivos`.`id` = :imgId';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(":imgId", $imgId);
		if ($stmt->execute())
			return true;
		else
			return false;
	}

	public function updateImg($editarImagem)
	{
		$sql = 'UPDATE `arquivos` SET user = :user, user_insta = :user_insta, user_twitter = :user_twitter WHERE `arquivos`. id = :id;		';

		$stmt = DB::prepare($sql);
		$stmt->bindValue(':id', $editarImagem->getId());
		$stmt->bindValue(':user', $editarImagem->getUser());
		$stmt->bindValue(':user_insta', $editarImagem->getUser_insta());
		$stmt->bindValue(':user_twitter', $editarImagem->getUser_twitter());

		$stmt->execute();

	}

	public function findById($imgId)
	{
		$sql = 'SELECT * FROM `arquivos` WHERE id = :imgId';

		$stmt = DB::prepare($sql);
		$stmt->bindParam(':imgId', $imgId);
		
		$stmt->execute();
		
		$arrImg = $stmt->fetchAll();
		$img = new cadastroImagem();
		foreach($arrImg as $chave => $valor){
		    $img->setUser($valor->user);
            $img->setUser_insta($valor->user_insta);
			$img->setUser_twitter($valor->user_twitter);

		}
		return $img;
	}
}
