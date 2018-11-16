<?php

require "../config/Database.php";

$conexao = Database::getConexao();

$sql = "SELECT * FROM categoria";

$resultado = $conexao->query($sql);

$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($categorias);