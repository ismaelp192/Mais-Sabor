<?php
    class Receita{
        private $idreceita;
        private $nome;
        private $valor_receita;
        private $descricao;
        private $lucro;
        private $valor_final;
        private $tbCategoria_idcategoria;
        private $tbCategoria_nome_categoria;
        private $image;


        public function getIdreceita()
        {
                return $this->idreceita;
        }

        public function setIdreceita($idreceita)
        {
                $this->idreceita = $idreceita;

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

        public function getValor_receita()
        {
                return $this->valor_receita;
        }

        public function setValor_receita($valor_receita)
        {
                $this->valor_receita = $valor_receita;

                return $this;
        }
 
        public function getDescricao()
        {
                return $this->descricao;
        }

        public function setDescricao($descricao)
        {
                $this->descricao = $descricao;

                return $this;
        }

        public function getLucro()
        {
                return $this->lucro;
        }

        public function setLucro($lucro)
        {
                $this->lucro = $lucro;

                return $this;
        }

        public function getValor_final()
        {
                return $this->valor_final;
        }

        public function setValor_final($valor_final)
        {
                $this->valor_final = $valor_final;

                return $this;
        }

        public function getTbCategoria_idcategoria()
        {
                return $this->tbCategoria_idcategoria;
        }
      
        public function setTbCategoria_idcategoria($tbCategoria_idcategoria)
        {
                $this->tbCategoria_idcategoria = $tbCategoria_idcategoria;

                return $this;
        }

        public function getTbCategoria_nome_categoria()
        {
                return $this->tbCategoria_nome_categoria;
        }
        public function setTbCategoria_nome_categoria($tbCategoria_nome_categoria)
        {
                $this->tbCategoria_nome_categoria = $tbCategoria_nome_categoria;

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