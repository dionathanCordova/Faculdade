<?php

require_once "../../model/Categoria.php";
require_once "../../model/CategoriaDAO.php";
// PEGO O JSON EM TEXTO, COMO CHEGOU
$dados_recebidos = file_get_contents('php://input');
// print_r($dados_recebidos);
// TRANSFORMO O TEXTO EM UM ARRAY
$dados = json_decode($dados_recebidos, true);
// print_r($dados);
$name = $dados['nome'];
$description = $dados['descricao'];
$categoria = new Categoria($name, $description);
$catdao = new CategoriaDAO();
if ($catdao->insert($categoria)) {
    header('HTTP/1.1 201 Created');
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Categoria criada com sucesso.']);
} else {
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Erro ao criar categoria!!']);
}