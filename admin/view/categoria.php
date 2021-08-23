<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<h4 class="panel-title"><?=$s->id?'Alterar':'Nova'?> Categoria</h4>
		</div>
		<div class="panel-body">
			<div id="rootwizard">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Geral</a></li>
<?
$sfotos = $b->query("select * from fotos where idp='{$s->id}' and tipo='categoria'");
if($s->id){
?>
					<li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-image m-r-xs"></i>Imagens</a></li>
<?
}
?>					<li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fab fa-google m-r-xs"></i>SEO</a></li>
				</ul>
				<div class="progress progress-sm m-t-sm">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					</div>
				</div>
				<form id="id-form">
					<div class="tab-content">
						<div class="tab-pane active fade in" id="tab1">
							<div class="form-group col-md-12">
								<label for="h1">* Título (H1)</label>
								<input type="text" class="form-control" id="h1" name="h1" placeholder="Digite o título (h1)" value="<?=strh($rs->h1)?>">
							</div>
							<?php/*<div class="form-group col-md-12">
								<label for="id_icone">Ícone</label>
								<select class="form-control selectpicker" name="id_icone" id="id_icone">
									<option>-- SELECIONE O ÍCONE--</option>
<?
$sicones = $b->query("select * from icons order by fa asc");
while($ricones=$sicones->fetchObject()){
?>
									<option <?=$ricones->id==$rs->id_icone?'selected':''?> value="<?=$ricones->id?>" data-content="<i class='<?=$ricones->tipo.' '.$ricones->fa?>'></i> <?=$ricones->fa?>"></option>
<?
}
?>
								</select>
							</div>*/?>
						</div>
<?
if($s->id){
?>
						<div class="tab-pane fade" id="tab2">
<?
	if($sfotos->rowCount()){
		while($rfotos=$sfotos->fetchObject()){
?>
							<div class="form-group col-xs-12 col-lg-3">
								<label for="principal-<?=$rfotos->id?>" class="text-center">
									<img src="../upload/categorias/thumb/<?=$rfotos->it?>" class="view-imgs"/>
									<input type="radio" id="principal-<?=$rfotos->id?>" name="principal" value="<?=$rfotos->id?>" <?=$rfotos->principal?'checked':''?>/>
									IMAGEM PRINCIPAL
								</label>
							</div>
<?
		}
?>
							<div class="clearfix"></div>
							<a href="categoria-foto/<?=$s->id?>" class="btn btn-danger">ALTERAR FOTOS</a>
<?
	}else echo '<a href="categoria-foto/'.$s->id.'" class="btn btn-success">ADICIONAR FOTOS</a>';
?>
						</div>
<?
}
?>
						<div class="tab-pane fade" id="tab3">
							<div class="form-group col-md-12">
								<label for="tagt">Meta Title</label>
								<input type="text" class="form-control" id="tagt" name="tagt" placeholder="Digite a Meta Tag title" value="<?=strh($rs->tagt)?>">
							</div>
							<div class="form-group col-md-12">
								<label for="tagd">Meta Description</label>
								<textarea class="form-control" id="tagd" name="tagd" placeholder="Digite a Meta Tag description" rows="8"><?=strh($rs->tagd)?></textarea>
							</div>
							<div class="clearfix"></div>
							<div class="container-seo form-group col-md-12">
								<div class="wrapper">
									<div class="main">
										<h3>PRÉVIA <i class="fa fa-question-circle" data-toggle="tooltip" title="" style="font-size:16px" data-original-title="Este é um exemplo de como este artigo pode aparecer nos resultados de busca do Google."></i></h3>
										<div class="title-seo">
											<span><?=strh($rs->tagt)?></span>
										</div>
<?
if($s->id){
?>
										<div class="url-seo">
											<span><?=$url_seo?></span>
										</div>
<?
}
?>
										<div class="description-seo">
											<span><?=strh($rs->tagd)?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="s">
								<span style="display:block;float:left;margin-right:5px">Ativo</span>
								<span><input type="checkbox" id="s" name="s" value="1" class="ckb"<?=$rs->s||!$s->id?' checked':''?>></span>
							</label>
						</div>
						<div class="clearfix" style="height:40px"></div>
						<div class="form-group col-md-12">
							<input type="submit" class="btn btn-success"/>
						</div>
						<ul class="pager wizard">
							<li class="previous"><a href="<?=$s->spg.($s->id?'/'.$s->id:'')?>#" class="btn btn-default">Anterior</a></li>
							<li class="next"><a href="<?=$s->spg.($s->id?'/'.$s->id:'')?>#" class="btn btn-default">Próximo</a></li>
						</ul>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?
Inline::a();
?>
<style>		
.text i {font-size: 40px;padding-right: 15px;width: 65px;text-align: center;}
.bootstrap-select>.dropdown-toggle{height: 34px;line-height: 34px;padding: 0 15px;}
.dropdown.bootstrap-select.form-control{padding:0 !important}
</style>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select-1.13.2/dist/css/bootstrap-select.min.css">
<link href="assets/css/awesome/fontawesome-all.min.css?" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/plugins/bootstrap-select-1.13.2/dist/js/bootstrap-select.min.js"></script>
<script type='text/javascript'>
$('.selectpicker').selectpicker();
</script>
<script type="text/javascript" src="assets/js/admin/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/admin/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">
var adm = $.form({
	a:'cat',
	load:function(_,F,f,e,o,i){},
});
</script>
<script type="text/javascript">
$.extend(adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript">
$(document).ready(function() {
	/*var validator = $('#id-form').validate({
		rules: {
			n: {
				required: true
			},
			r: {
				required: true
			},
			i:{required: "<?=$s->id?'false':'true'?>"},
		}
	});*/
	$('#rootwizard').bootstrapWizard({
		'tabClass': 'nav nav-tabs',
		onTabShow: function(tab, navigation, index) {
			var total = navigation.find('li').length;
			var current = index+1;
			var percent = (current/total) * 100;
			$('#rootwizard').find('.progress-bar').css({width:percent+'%'});
		},
		'onNext': function(tab, navigation, index) {
			var valid = $('#id-form').valid();
			if(!valid) {
				validator.focusInvalid();
				return false;
			}
		},
		'onTabClick': function(tab, navigation, index) {
			var valid = $('#id-form').valid();
			if(!valid) {
				validator.focusInvalid();
				return false;
			}
		},
	});
});
</script>
<?
Inline::b();
?>