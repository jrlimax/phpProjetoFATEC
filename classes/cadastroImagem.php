<?php

class cadastroImagem
{

	private $id;
	private $path;
	private $data_upload;
	private $user;
	private $user_insta;
	private $user_twitter;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function setPath($path)
	{
		$this->path = $path;
	}

	public function getData_upload()
	{
		return $this->data_upload;
	}

	public function setData_upload($data_upload)
	{
		$this->data_upload = $data_upload;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function getUser_insta()
	{
		return $this->user_insta;
	}

	public function setUser_insta($user_insta)
	{
		$this->user_insta = $user_insta;
	}

	public function getUser_twitter()
	{
		return $this->user_twitter;
	}

	public function setUser_twitter($user_twitter)
	{
		$this->user_twitter = $user_twitter;
	}
}
