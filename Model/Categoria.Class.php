<?php
class Categoria{
    private $idcategoria;
    private $nome_categoria;

    public function getIdcategoria()
    {
        return $this->idcategoria;
    }
 
    public function setIdcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;

        return $this;
    }

    public function getNome_categoria()
    {
        return $this->nome_categoria;
    }

    public function setNome_categoria($nome_categoria)
    {
        $this->nome_categoria = $nome_categoria;

        return $this;
    }
}