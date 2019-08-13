<?php
class GastoExtra{
    private $idgastos_extras;
    private $nome;
    private $quantidade;
    private $valor;
    private $tipo_medida;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function getTipo_medida()
    {
        return $this->tipo_medida;
    }

    public function setTipo_medida($tipo_medida)
    {
        $this->tipo_medida = $tipo_medida;
        return $this;
    }

    public function getIdgastos_extras()
    {
        return $this->idgastos_extras;
    }

    public function setIdgastos_extras($idgastos_extras)
    {
        $this->idgastos_extras = $idgastos_extras;

        return $this;
    }
}