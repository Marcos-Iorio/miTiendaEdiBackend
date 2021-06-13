<?php

    class Usuario{
        
        public $nombre;
        public $pass;
        public $mail;

        public function GetNombre(){
              return $this->nombre;
         }

        public function GetPass(){
            return $this->pass;
        }

        public function GetMail(){
            return $this->mail;
        }
    }

?>