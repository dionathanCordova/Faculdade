<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:45
 */

require_once "model/ProdutoDAO.php";
require_once "model/Produto.php";
require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";
require_once "view/View.php";

class ProdutoController
{

    public function cad_produto() {
        $this->dados = array();
      

        if(isset($_POST['nome']) && $_POST['nome'] != null) {
            $nome = $_POST['nome'];
        }

        if(isset($_POST['descricao']) && $_POST['descricao'] != null) {
            $descricao = $_POST['descricao'];
        }

        if(isset($_POST['preco']) && $_POST['preco'] != null) {
            $preco = $_POST['preco'];
        }

        if(isset($_POST['id_categoria']) && $_POST['id_categoria'] != null) {
            $id_categoria = $_POST['id_categoria'];
        }

        $this->dados['mensagem'] = '';
        $proddao = new ProdutoDAO();
        if(isset($nome) && isset($descricao)) {
            try{
                $produtos = $proddao->insert_produtos($nome, $descricao, $preco, $id_categoria);
                $this->dados['mensagem'] = 'Produto Cadastrado com Sucesso!';
            }catch (PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectAll();
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
      
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/produto/cad_produto.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }
}