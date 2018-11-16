<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/library/jquery.js"></script>
    <script src="../../assets/js/library/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class='text-center'>Lista de Categorias</h2><br><br>       
        <table class="table">
            <thead>
                <tr>
                    <th>ID do Produto</th>
                    <th>Nome do Produto</th>
                    <th>Descrição do Produto</th>
                    <th>Editar</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php  $categorias = $dados['categorias'];
                foreach ($categorias as $categoria):?>
                <tr>
                    <td><?= $categoria->getid() ?></td>
                    <td><?= $categoria->getNome() ?></td>
                    <td><?= $categoria->getDescricao() ?></td>
                    <td><a class='btn btn-primary' href="categoria?acao=editarcategoria&id=<?= utf8_encode($categoria->getid()) ?>">Editar</a></td>
                    <td><a href="categoria?acao=deleteCategoria&id=<?= utf8_encode($categoria->getid()) ?>"><button type='button' class='btn btn-warning btn-delete' value="<?= $categoria->getid() ?>">Deletar</button></a></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function() {
                var id = $('.btn-delete').val();
                alert(id );
                $.ajax({
                    url : 
                    type = 'json',
                    datatype = 'POST'
                })
            })
        })
    </script>
</body>
</html>