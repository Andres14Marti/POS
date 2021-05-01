<?php
    class Conexion{
        public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=pos"."root","1234");

            $link ->exec("set names utf8");

            return $link;
        }
    }