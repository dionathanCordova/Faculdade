<?php

require_once "controller/CategoriaController.php";
require_once "controller/ProdutoController.php";
//ROTAS -

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

if(isset($_GET['id']) && $_GET['id'] != '') {
    $id =$_GET['id'];
};


switch ($acao){
    case 'index':
        $cat = new CategoriaController();
        $cat->principal();
        exit;
    case 'visualizar':
        $cat = new CategoriaController();
        $cat->visualizar($id);
        exit;
    case 'cadastrarcategoria':
        $cat = new CategoriaController();
        $cat->cad_categoria();
        exit;
    case 'editarcategoria':
        $cat = new CategoriaController();
        $cat->editar_categoria($id);
        exit;
    case 'editarcategoriaPost':
        $cat = new Categoria();
        $cat->setId($_POST['id']);
        $cat->setNome($_POST['nome']);
        $cat->setDescricao($_POST['descricao']);
        $controller = new CategoriaController();
        $controller->editar_categoria_post($cat);
    case 'deleteCategoria':
        $controller = new CategoriaController();
        $controller->delete_categoria_post($id);
    case 'cadastrarproduto':
        $prod = new ProdutoController();
        $prod->cad_produto();
        exit;
  
}




