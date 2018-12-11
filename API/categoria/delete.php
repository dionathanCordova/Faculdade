<?php


require_once "../../model/Categoria.php";
require_once "../../model/CategoriaDAO.php";
// PEGO O JSON EM TEXTO, COMO CHEGOU
$dados_recebidos = file_get_contents('php://input');
// TRANSFORMO O TEXTO EM UM ARRAY
$dados = json_decode($dados_recebidos, true);
$id = $dados['id'];
$catdao = new CategoriaDAO();
if ($catdao->delete($id)) {
    header('HTTP/1.1 201 Created');
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Categoria deletada com sucesso.']);
} else {
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Erro ao deletar categoria!!']);
}