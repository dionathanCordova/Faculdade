<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:24
 *
 * Classe de Acesso a Dados de produto - Contem os métodos para manipulacao dos dados
 */

require_once "Produto.php";
require_once "DAO.php";

class ProdutoDAO extends DAO
{

    public function selectAll(){
        $sql = "select * from produto order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produto', ['nome', 'descricao', 'id', 'preco', 'id_categoria']);

            return $produtos;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    public function select_id($id){
        $sql = "select * from produto where id = :id order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produto', ['nome', 'descricao', 'id', 'preco', 'id_categoria']);

            return $produtos;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function insert_produtos($nome, $descricao, $preco, $id_categoria) {
        $sql = "INSERT INTO produto (nome, descricao, preco, id_categoria) VALUES (:nome, :descricao, :preco, :id_categoria)";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':descricao', $descricao);
            $stmt->bindValue(':preco', $preco);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->execute();
        }catch(PDOException $e) {
            throw new PDOException($e);
        }
    }
}