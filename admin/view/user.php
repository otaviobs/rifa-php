<style>
label.label{ padding: 0 15px;width:auto !important}
.reenviar {
	height: 37px;
	align-items: center;
	display: inline-flex;
	margin-left: 20px;
}
</style>
<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-body">
			<div class="panel-heading clearfix">
				<h4 class="panel-title"><?=$s->id?'Alterar':'Novo'?> Usuário</h4>
			</div>
			<form id="id-form">
				<div class="tab-content">
					<div class="form-group col-md-6">
						<label for="id_perfil">* Perfil de Usuário:</label>
						<select name="id_perfil" class="form-control" id="id_perfil"></select>
					</div>
					<div class="form-group col-md-6">
						<label for="nome">* Nome</label>
						<input
							type="text" class="form-control" id="nome" name="nome"
							placeholder="Nome completo (José Carlos da Silva...)"
							value="<?=strh($rs->nome)?>"
						/>
					</div>
					<div class="form-group col-md-6">
						<label for="email">* E-mail</label>
						<input
							<?=$s->id?'readonly':''?>
							type="email"
							class="form-control" id="email" name="email"
							placeholder="E-mail ativo (jose@gmail.com...)"
							value="<?=strh($rs->email)?>"
						/>
					</div>
					<div class="form-group col-md-6">
						<label for="cpf">* CPF</label>
						<input
							<?=$s->id?'readonly':''?>
							type="text"
							class="form-control mk-cpf" id="cpf" name="cpf"
							placeholder="Ex 123.456.789-99"
							value="<?=strh($rs->cpf)?>"
						/>
					</div>
<?php
if($s->id){
	if($rs->senha){
?>
					<div class="form-group col-md-6">
						<label class="label label-success"><h3>Usuário confirmado</h3></label>
					</div>					
<?php
	} else {
?>
					<div class="form-group col-md-6">
						<label><strong>Usuário não confirmado</strong></label>
						<a class="btn btn-success reenviar">REENVIAR E-MAIL DE CONFIRMAÇÃO</a>
					</div>
<?php
	}
}
?>
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
	a:'user',
	id:"<?=$s->id?>",
	back:'<?=$s->back?>',
	load:function(_,F,f,e,o){
		e = f.id_perfil;
		o = e.options;
		$.each(_.perfil,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.id_perfil)e.selectedIndex = i;
		});

		$('.mk-cpf').mask('999.999.999-99');
	}
});
</script>
<script type="text/javascript">
$.extend(true,adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript">
$(document).ready(function() {
    var validator = $('#id-form').validate({
      rules: {
				nome: {required: true},
				email: {required: true},
				cpf: {required: true},
      }
    });
});

$(document).on('click', '.reenviar', function() {
	$.post('ajax/enviar-confirmacao.json', {id:<?=$s->id?>}, function() {
		$(this).addClass('face');
	}).always(function(x) {
		$('.reenviar').removeClass('face');
		message(x.m, x.ok);
	});
});
</script>
<?
Inline::b();
?>