<style>
	.align-middle{
		margin-left:10vmin;
		margin-top:1vmin;
	}	
</style>
	<div class="container">
		<form class="form-horizontal" action="produto?acao=cadastrarproduto" method='POST'>
			<h2 class='text-center'>Cadastrar Produto</h2>   <br><br> 
			<div class='align-middle'>
				<div class='align-middle'>
					<div class="form-group align-middle">
						<label class="control-label col-sm-2" for="email">Nome:</label>
						<div class="col-sm-6">
						<input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name='nome'>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Descrição:</label>
						<div class="col-sm-6"> 
						<input type="text" class="form-control" id="descricao" placeholder="Descrição do Produto" name='descricao'>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Preço:</label>
						<div class="col-sm-6"> 
						<input type="number" step='0.01' class="form-control" id="preco" placeholder="Preço do Produto" name='preco'>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Categoria:</label>
						<div class="col-sm-6"> 
							<select class="form-control" id="categoria" name='id_categoria'>
								<?php $categorias = $dados['categorias'];?>
								<?php foreach($categorias as $categorias):?>
								<option value="<?php echo utf8_encode($categorias->getid());?>"> <?= utf8_encode($categorias->getNome()) ?></option>	
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
					<p><?php echo $dados['mensagem'] ?></p>
				</div>
			</div>
		</form>
	</div>
<main>
