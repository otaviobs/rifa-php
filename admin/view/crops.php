<div id="table-0" class="tabela2 col-lg-12 col-md-12">
	<table class="display table dataTable">
		TIRAR DEPOIS
		<thead>
			<tr class="lrow th">
				<th class="cell"><a href="javascript:;">Imagem</a></th>
				<th class="cell"><a href="javascript:;">Título</a></th>
				<th class="cell"><a href="javascript:;">Recortar</a></th>
			</tr>
		</thead>
		<tbody class="tab-lista">
<?
if($sf->rowCount()){
	while($rf=$sf->fetchObject()){
		if($largura_thumb){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem</td>
				<td class="cell">
					<a class="ico <?=$rf->it?'icropped':'icrop'?>" title="Recortar Imagem" href="admin/crop/fotos-<?=$largura_thumb?>-<?=$altura_thumb?>-<?=$pasta?>-thumb-i-it/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}if($largura_carrinho){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem Carrinho</td>
				<td class="cell">
					<a class="ico <?=$rf->itc?'icropped':'icrop'?>" title="Recortar Imagem Carrinho" href="admin/crop/fotos-<?=$largura_carrinho?>-<?=$altura_carrinho?>-<?=$pasta?>-thumb-i-itc/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}if($largura_home){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem Home</td>
				<td class="cell">
					<a class="ico <?=$rf->ith?'icropped':'icrop'?>" title="Recortar Imagem Home" href="admin/crop/fotos-<?=$largura_home?>-<?=$altura_home?>-<?=$pasta?>-thumb-i-ith/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}if($largura_interno){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem Interno</td>
				<td class="cell">
					<a class="ico <?=$rf->iti?'icropped':'icrop'?>" title="Recortar Imagem Interno" href="admin/crop/fotos-<?=$largura_interno?>-<?=$altura_interno?>-<?=$pasta?>-thumb-i-iti/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}if($largura_miniatura){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem Miniatura</td>
				<td class="cell">
					<a class="ico <?=$rf->itm?'icropped':'icrop'?>" title="Recortar Imagem Miniatura" href="admin/crop/fotos-<?=$largura_miniatura?>-<?=$altura_miniatura?>-<?=$pasta?>-thumb-i-itm/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}if($largura_relacionado){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem Relacionado</td>
				<td class="cell">
					<a class="ico <?=$rf->itr?'icropped':'icrop'?>" title="Recortar Imagem Relacionado" href="admin/crop/fotos-<?=$largura_relacionado?>-<?=$altura_relacionado?>-<?=$pasta?>-thumb-i-itr/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}if($largura_ultimos){
?>
			<tr class="lrow img even">
				<td class="cell box-img" title="<?=$rs->n?>">
					<span class="box-img-center load auto w"><span></span><img src="upload/<?=$pasta?>/<?=$rf->i?>"></span>
				</td>
				<td class="cell line" title="<?=$rs->n?>">Recortar Imagem Últimos</td>
				<td class="cell">
					<a class="ico <?=$rf->itu?'icropped':'icrop'?>" title="Recortar Imagem Últimos" href="admin/crop/fotos-<?=$largura_ultimos?>-<?=$altura_ultimos?>-<?=$pasta?>-thumb-i-itu/<?=$rf->id?>"></a>
				</td>
			</tr>
<?
		}
	}
}
?>
		</tbody>
	</table><br/>
	<a href="admin/produtos" class="btn btn-danger">Voltar</a>
</div>
<?
Inline::a();
?>
<script type="text/javascript">
/*$(".icrop").each(function(){
	var url = $(this).attr('href');
	window.open(url);
});*/
</script>
<?
Inline::b();
?>