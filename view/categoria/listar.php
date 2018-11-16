<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Lista de Categorias</h2>          
        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Categorias</th>
                    <th>Descrição da Categorias</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php  $categorias = $dados['categorias'];
                foreach ($categorias as $categoria):?>
                <tr>
                    <!-- <td><?php echo $categoria->getid()?></td> -->
                    <td><a href="visualizar?acao=visualizar&id=<?php echo utf8_encode($categoria->getid());?>"> <?= utf8_encode($categoria->getNome()) ?></a></td>
                    <td><?php echo $categoria->getDescricao()?></td>
                    <th><a class='btn btn-primary' href="visualizar?acao=visualizar&id=<?php echo utf8_encode($categoria->getid());?>"> Visualizar</a></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</body>
</html>