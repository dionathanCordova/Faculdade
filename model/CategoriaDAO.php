<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:24
 *
 * Classe de Acesso a Dados de Categoria - Contem os métodos para manipulacao dos dados
 */

require_once "Categoria.php";
require_once "Produto.php";
require_once "DAO.php";

class CategoriaDAO extends DAO
{

    public function selectAll(){
        $sql = "select * from categoria order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    public function select_id($id){
        $sql = "select * from categoria where id = :id order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function insert_categoria($nome, $descricao) {
        $sql = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':descricao', $descricao);
            if($stmt->execute()) {
                Echo 'Inseriu';
            }else{
                echo 'Falha ao Inserir';
            }
        }catch(PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function altera_categoria($categoria) {
        $cat = new Categoria();

        $id = $categoria->getId();
        $nome = $categoria->getNome();
        $desc = $categoria->getDescricao();

        // SELECT DA CATEGORIA QUE FOI ESCOLHIDA PARA SER EDITADA
        $sql = "select * from categoria where id = :id order by nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $categorias = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      
        // SE ALGUM DADO DO IMPUT VIER VAZIO A ALTERACAO PEGA O MESMO VALOR QUE JÀ EXISTIA NO BANCO
        foreach($categorias as $info) {
            if($nome == ''){
                $nome2 = $info['nome'];
            }else{
                $nome2 = $nome;
            }
            if($desc == ''){
                $desc2 = $info['descricao'];
            }else{
                $desc2 = $desc;
            }
        }
       
        // ALTERANDO OS DADOS DA CATEGORIA
        $sql = "UPDATE categoria set nome = :nome, descricao = :descricao where id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome2);
        $stmt->bindParam(':descricao', $desc2);
        if ( $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_categoria($id) {
        $sql = "DELETE FROM categoria WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ( $stmt->execute()){
            echo 'DELETEOU';
        }else{
            echo 'FALHOU';
        }
    }
}