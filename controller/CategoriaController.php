<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:45
 */

require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";
require_once "view/View.php";

class CategoriaController
{
    private $dados;
    protected $id;

    public function principal(){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectAll();
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function visualizar($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->select_id($id);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/visualizar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function cad_categoria() {
        $this->dados = array();
        if(isset($_POST['nome']) && $_POST['nome'] != null) {
            $nome = $_POST['nome'];
        }

        if(isset($_POST['descricao']) && $_POST['descricao'] != null) {
            $descricao = $_POST['descricao'];
        }
       
        $this->dados['mensagem'] = '';
        if(isset($nome) && isset($descricao)) {
            $catdao = new CategoriaDAO();
           
            try{
                $categorias = $catdao->insert_categoria($nome, $descricao);
                $this->dados['mensagem'] = 'Categoria Inserida com Sucesso!';
                sleep(3);
                header('location: index.php');
            }catch (PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
            $this->dados['categorias'] = $categorias;
        }
       
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/produto/cad_categoria.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function editar_categoria($id) {
       
        $alterarcao  = [];
        $this->dados = array();
        if(isset($_POST['nome']) && $_POST['nome'] != null) {
            $alterarcao['nome'] = $_POST['nome'];
        }

        if(isset($_POST['descricao']) && $_POST['descricao'] != null) {
            $alterarcao['descricao'] = $_POST['descricao'];
        }

        $this->dados['mensagem'] = '';
        
        $catdao = new CategoriaDAO();
        try{
            $categorias = $catdao->select_id($id);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
      
        $this->dados['categorias'] = $categorias;
       
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/edit_categoria.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function editar_categoria_post($alteracao) {
        $catdao = new CategoriaDAO();
        if($catdao->altera_categoria($alteracao)) {
            header('location: index.php');
        }else{
            echo 'Erro ao atualizar';
        }
    }

    public function delete_categoria_post($id) {
        $catdao = new CategoriaDAO();
        $catdao->delete_categoria($id);
        header('location: index.php');
    }
}
