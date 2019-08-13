<?php
    class MateriaPrima{
        private $idmateria_prima;
        private $nome;
        private $data_validade;
        private $quantidade;
        private $preco;
        private $tipo_medida;

        public function getIdmateria_prima()
        {
                return $this->idmateria_prima;
        }

        public function setIdmateria_prima($idmateria_prima)
        {
                $this->idmateria_prima = $idmateria_prima;

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

        public function getData_validade()
        {
                return $this->data_validade;
        }

        public function setData_validade($data_validade)
        {
                $this->data_validade = $data_validade;

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

        public function getPreco()
        {
                return $this->preco;
        }

        public function setPreco($preco)
        {
                $this->preco = $preco;

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
    }
?>