<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-body">
			<div class="panel-heading clearfix">
				<h4 class="panel-title"><?=$s->id?'Alterar':'Novo'?> Produto</h4>
			</div>
			<form id="id-form">
				<div class="tab-content">
					<div class="form-group col-md-4	">
						<label for="sku">* SKU:</label>
						<input type="text" class="form-control" id="sku" name="sku" placeholder="Digite o sku" value="<?=strh($rs->sku)?>" required>
					</div>
					<div class="form-group col-md-4	">
						<label for="nome">* Nome</label>
						<input
							type="text" class="form-control" id="nome"
							name="nome" placeholder="Digite o nome" value="<?=strh($rs->nome)?>"
							maxlength="100"
						/>
					</div>
					<div class="form-group col-md-4	">
						<label for="quantidade_pontos">* Quantidade de Pontos</label>
						<input
							type="number"
							min="0" step="1" class="form-control" id="quantidade_pontos" name="quantidade_pontos"
							onkeydown="return sn(event)"
							placeholder="Digite a quantidade de pontos" value="<?=strh($rs->quantidade_pontos)?>">
					</div>
					<div class="form-group col-md-12">
							<label for="s">
								<span style="display:block;float:left;margin-right:5px">Ativo</span>
								<span><input type="checkbox" id="s" name="s" value="1" class="ckb"<?=$rs->status||!$s->id?' checked':''?>></span>
							</label>
						</div>
					<div class="clearfix" style="height:40px"></div>
						<div class="form-group col-md-12">
						<input type="submit" class="btn btn-success"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?
Inline::a();
?>
<script src="assets/js/admin/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
var adm = $.form({
	a:'produto',
	id:"<?=$s->id?>",
	back:'<?=$s->back?>',
	load:function(_,F,f,e,o){}
});
</script>
<script type="text/javascript">
$.extend(true,adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript">
$(document).ready(function() {
    var validator = $('#id-form').validate({
      rules: {
				sku: {required: true},
				nome: {required: true},
				quantidade_pontos: {required: true},
      }
    });
});

function sn(e){
	var tecla=(window.event)?event.keyCode:e.which;
	if((tecla>47&&tecla<58)||(tecla>95&&tecla<106))return true;
	else{
		if(tecla==8||tecla==0)return true;
		else return false;
	}
}
</script>
<?
Inline::b();
?>