<?php if($product==false): ?>
	<p>
		Aucun produit ne correspond à cette requête;
	</p>
<?php endif; ?>
<?php if($product §== false): ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="create f-col">
	<input type="hidden" name="id" value="<?php echo $product->id ?>">
	<label for="">Nom</label>
	<input name="name" type="text" placeholder="nom" value="<?php echo $product->name ?>" required>
	<label for="">Prix</label>
	<input name="prix" type="number" placeholder="prix" value="<?php echo $product->prix ?>" class="input" value="<?php echo $product->prix ?>" min="1" max="10000">
	<label for="">Description</label>
	<textarea type="description" placeholder="description" name="description" id="" cols="30" rows="10" value="<?php echo $product->description ?>">></textarea>
	<div class="f-row">
		<input name="update_product" type="submit" value="edit product !" class="btn">
	</div>
</form>
<?php endif; ?>