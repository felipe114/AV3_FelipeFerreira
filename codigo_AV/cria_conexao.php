<?php

namespace D\xampp2\htdocs\AV3_POO;

use PDO;
use PDOException;

class CriaConexao{
        public static function criarConexao(): PDO
        {
            try{
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=persistencia', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch(PDOException $excecao){
                echo "ERRO: ".$excecao->getMessage();
            }
        }
}