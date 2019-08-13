<?php

class Usuario {
	private $idusuario;
	private $nome;
    private $login;
    private $email;
    private $senha;
    private $tipo;


	
    public function getLogin()
    {
        return $this->login;
    }
 
    public function setLogin($login)
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
        $this->senha = $senha;
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
}

?>