<?php

class Usuario {
	private $idusuario;
	private $nome;
    private $login;
    private $email;
    private $senha;
    private $tipo;
    private $image;


	
    public function getlogin()
    {
        return $this->login;
    }
 
    public function setlogin($login)
    {
        $this->login = $login;
        return $this;
    }
 
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}

	public function getIdusuario()
	{
		return $this->idusuario;
	}

	public function setIdusuario($idusuario)
	{
		$this->idusuario = $idusuario;

		return $this;
    }
    public function getImage()
    {
        return $this->image;
    }
 
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
 
}

?>