<?php
    class Ingrediente{
   
        private $tbMateria_prima_idmateria_prima;
        private $tbReceita_idreceita;
        private $quantidade;
        private $preco;

        /**
         * Get the value of tbMateria_prima_idmateria_prima
         */ 
        public function getTbMateria_prima_idmateria_prima()
        {
                return $this->tbMateria_prima_idmateria_prima;
        }

        /**
         * Set the value of tbMateria_prima_idmateria_prima
         *
         * @return  self
         */ 
        public function setTbMateria_prima_idmateria_prima($tbMateria_prima_idmateria_prima)
        {
                $this->tbMateria_prima_idmateria_prima = $tbMateria_prima_idmateria_prima;

                return $this;
        }

        /**
         * Get the value of tbReceita_idreceita
         */ 
        public function getTbReceita_idreceita()
        {
                return $this->tbReceita_idreceita;
        }

        /**
         * Set the value of tbReceita_idreceita
         *
         * @return  self
         */ 
        public function setTbReceita_idreceita($tbReceita_idreceita)
        {
                $this->tbReceita_idreceita = $tbReceita_idreceita;

                return $this;
        }

        /**
         * Get the value of quantidade
         */ 
        public function getQuantidade()
        {
                return $this->quantidade;
        }

        /**
         * Set the value of quantidade
         *
         * @return  self
         */ 
        public function setQuantidade($quantidade)
        {
                $this->quantidade = $quantidade;

                return $this;
        }

        /**
         * Get the value of preco
         */ 
        public function getPreco()
        {
                return $this->preco;
        }

        /**
         * Set the value of preco
         *
         * @return  self
         */ 
        public function setPreco($preco)
        {
                $this->preco = $preco;

                return $this;
        }
        }
?>