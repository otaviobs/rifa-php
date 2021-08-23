<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-body">
			<div class="panel-heading clearfix">
				<h4 class="panel-title"><?=$s->id?'Alterar':'Nova'?> Loja</h4>
			</div>
			<form id="id-form">
				<div class="tab-content">
					<div class="form-group col-lg-4 col-md-6">
						<label for="nome">Nome da Loja</label>
						<input type="text" name="nome" id="nome" placeholder="Nome da loja" class="form-control required" value="<?=$rs->nome?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="nomeResponsavel">Nome do Responsável</label>
						<input type="text" name="nomeResponsavel" id="nomeResponsavel" placeholder="Nome do responsável" class="form-control requiredS" value="<?=$rs->nomeResponsavel?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="cnpj">CNPJ</label>
						<input type="text" name="cnpj" id="cnpj" class="form-control mk-cnpj required" placeholder="Ex 93.258.158/0001-47" value="<?=$rs->cnpj?>">
					</div>
					<div class="form-group col-lg-6 col-md-6">
						<label for="telefone">Telefone</label>
						<input type="text" name="telefone" id="telefone" class="form-control mk-cel requiredS" placeholder="Telefone/Celular (11) 91234-5689" value="<?=$rs->telefone?>">
					</div>
					<div class="form-group col-lg-6 col-md-6">
						<label for="email">E-mail</label>
						<input type="text" name="email" id="email" class="form-control requiredS" placeholder="E-mail ativo (jose@gmail.com...)" value="<?=$rs->email?>">
					</div>
					<div class="form-group col-lg-2 col-md-6">
						<label for="cep" class="float-left">CEP</label>
						<input type="text" name="cep" id="cep" class="form-control mk-cep requiredS" placeholder="Ex 03676-070" value="<?=$rs->cep?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="rua">Endereço</label>
						<input type="text" name="rua" id="rua" class="form-control requiredS" placeholder="Logradouro (Rua General Pamplona...)" value="<?=$rs->rua?>">
					</div>
					<div class="form-group col-lg-2 col-md-6">
						<label for="numero">Número</label>
						<input type="text" name="numero" id="numero" class="form-control" placeholder="Número (33...)" value="<?=$rs->numero?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="complemento">Complemento</label>
						<input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento (casa, número do apartamento...)" value="<?=$rs->complemento?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="bairro">Bairro</label>
						<input type="text" name="bairro" id="bairro" class="form-control requiredS" placeholder="Bairro (Jardim Três Marias...)" value="<?=$rs->bairro?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="cidade">Cidade</label>
						<input type="text" name="cidade" id="cidade" class="form-control requiredS" placeholder="Cidade (São Paulo...)" value="<?=$rs->cidade?>">
					</div>
					<div class="form-group col-lg-4 col-md-6">
						<label for="estado">Estado</label>
						<select name="estado" id="estado" class="form-control requiredS">
							<option value="">(Selecione o Estado)</option>
						</select>
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
	a:'loja',
	id:"<?=$s->id?>",
	back:'<?=$s->back?>',
	cgCep:function(){
		var _ = this,f = _.f,c = $(f.cep),cep = c.val(),re = /^\D*(\d{2})\D*(\d{3})\D*(\d{3})\D*$/;
		if(re.test(cep))cep = cep.replace(re,'$1$2-$3'),c.val(cep);
		else return false;
		if(_.cep==cep)return false;
		_.cep = cep;
		$.getJSON("//viacep.com.br/ws/"+cep+"/json/?callback=?",function(r){
			if(!("erro" in r)){
				if(r.logradouro||r.complemento){
					$(f.rua).val(unescape(r.logradouro)).removeClass("haserror").css('border-color','initial');
					$('#erro-rua').hide();
				}if(r.bairro){
					$(f.bairro).val(unescape(r.bairro)).removeClass("haserror").css('border-color','initial');
					$('#erro-bairro').hide();
				}if(r.localidade){
					$(f.cidade).val(unescape(r.localidade)).removeClass("haserror").css('border-color','initial').attr('readonly', true);
					$('#erro-city').hide();
				}if(r.uf){
					$(f.estado).val(unescape(r.uf).toUpperCase()).removeClass("haserror").css('border-color','initial').attr('readonly', true);
					$('#erro-uf').hide();
				}
				$(f.numero).focus();
			}else{
				_.cep = 0;
				alert("CEP não encontrado!");
				$(f.cidade).attr('readonly', false);
				$(f.estado).attr('readonly', false);
			}
			delete r;
			//window.resultadoCEP = undefined;
		});
	},
	load:function(_,F,f,e,o){
		$(f.cep).bind('change keyup',function(){
			_.cgCep();
		});

		e = f.estado;
		o = e.options;
		$.each(_.ufs,function(i,v){
			o[i=o.length] = new Option(v,v);
			if(v==_.estado)e.selectedIndex = i;
		});
		
		$('.mk-data').mask('99/99/9999');
		$('.mk-cpf').mask('999.999.999-99');
		$('.mk-cnpj').mask('99.999.999/9999-99');
		$('.mk-cep').mask('99999-999');
		$('.mk-cel').focusout(function(){
			var e = $(this);
			e.unmask().mask(e.val().replace(/\D/g,'').length>10?'(99) 99999-999?9':'(99) 9999-9999?9');
		}).focusout();
	},
	ufs:['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PR','PB','PA','PE','PI','RJ','RN','RS','RO','RR','SC','SE','SP','TO'],
});
</script>
<script type="text/javascript">
$.extend(true,adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('#id-form').validate();
	if(location.search)$('#cnpj').val(location.search.replace('?cnpj=', ''));
});
</script>
<?
Inline::b();
?>