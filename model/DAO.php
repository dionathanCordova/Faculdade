<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 19:27
 */

require_once "config/Database.php";

class DAO
{
    protected $conexao;

    public function __construct()
    {
        try{
            $this->conexao = Database::getConexao();
        }catch (PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }
}