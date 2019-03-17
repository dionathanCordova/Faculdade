<style>
	.align-middle{
		margin-left:10vmin;
		margin-top:1vmin;
	}	
</style>
	<div class="container">
		<form class="form-horizontal" action="index.php?acao=editarcategoriaPost" method='POST'>
			<h2 class='text-center'>Editar Categoria</h2>   <br><br> 
			<div class='align-middle'>
				<div class='align-middle'>
                    <?php $categorias = $dados['categorias'];?>
                    <?php foreach($categorias as $categorias):?>
                    
                    
                    <input type="hidden" value="<?= utf8_encode($categorias->getid())?>" name='id'>
                    
                        
                    
					<div class="form-group align-middle">
						<label class="control-label col-sm-2" for="email">Nome:</label>
						<div class="col-sm-6">
						<input type="text" class="form-control" id="nome" placeholder="<?= utf8_encode($categorias->getNome())?>" name='nome'>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Descrição:</label>
						<div class="col-sm-6"> 
						<input type="text" class="form-control" id="descricao" placeholder="<?= utf8_encode($categorias->getDescricao())?>" name='descricao'>
						</div>
					</div>
					
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						    <button type="submit" class="btn btn-default myBtn_del_<?= utf8_encode($categorias->getid())?>" value="<?= utf8_encode($categorias->getNome())?>">Submit</button>
						</div>
                    </div>

                   
                    <!-- <?php endforeach?> -->
                    <p><?php echo $dados['mensagem'] ?></p>
				</div>
			</div>
		</form>
	</div>
<main>


  