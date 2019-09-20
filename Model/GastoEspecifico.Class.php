<?php
    class GastoEspecifico{
   
        private $tbGastos_extras_idgastos_extras;
        private $tbReceita_idreceita;
        private $quantidade;
        private $preco_gasto_extra;

              /**
         * Get the value of tbReceita_idreceita
         */ 
         public function getTbGastos_extras_idgastos_extras()
         {
                 return $this->tbGastos_extras_idgastos_extras;
         }
 
         /**
          * Set the value of tbReceita_idreceita
          *
          * @return  self
          */ 
         public function setTbGastos_extras_idgastos_extras($tbGastos_extras_idgastos_extras)
         {
                 $this->tbGastos_extras_idgastos_extras= $tbGastos_extras_idgastos_extras;
 
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
        public function getPreco_gasto_extra()
        {
                return $this->preco_gasto_extra;
        }

        /**
         * Set the value of preco
         *
         * @return  self
         */ 
        public function setPreco_gasto_extra($preco_gasto_extra)
        {
                $this->preco_gasto_extra = $preco_gasto_extra;

                return $this;
        }
        }
?>