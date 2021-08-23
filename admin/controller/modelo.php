<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from modelo where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Modelos';
$s->titpg2 = 'Modelos';
$s->titpg3 = $rs->n?$rs->n:'Novo Modelo';
$SPG = $s->spg;
$s->spg = 'edit';
$temSlug = $temOrder = 1;

$url_seo = $s->base.'produtos/modelo/'.$rs->t;

$a->id = $s->id;
$a->back = $s->back;

$NAVIGATION = array(
	array('icon'=>'fa-user','text'=>'Geral','active'=>1),
	//array('icon'=>'fa-image','text'=>'Imagens','onlyID'=>1),
	array('icon'=>'fa-google','text'=>'SEO'),
);

$FIELDSOPTIONS = array(
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-12','name'=>'h1','label'=>'* Título (H1)'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-12','name'=>'n','label'=>'* Slug (usado para url do modelo)'),
	array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'d','label'=>'* Descrição'),
	//array('tab'=>1,'type'=>'fotos','link'=>'admin/modelo-foto/','text'=>'FOTOS'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-12','name'=>'tagt','label'=>'Meta Title'),
	array('tab'=>2,'type'=>'meta','classGrid'=>'col-md-12','name'=>'tagd','label'=>'Meta Description'),
);

$sfotos = $b->query("select * from fotos where idp='{$s->id}' and tipo='modelo'");
if($sfotos->rowCount()){
	$FOTOS = array();
	while($rfotos=$sfotos->fetchObject()){
		$FOTOS[] = array('id'=>$rfotos->id,'it'=>$rfotos->it,'pasta'=>'modelos','principal'=>$rfotos->principal,'hover'=>$rfotos->hover);
	}
}

$NAVS = $s->navs($NAVIGATION,$s->id);
$TABS = $s->tabs($NAVIGATION,$FIELDSOPTIONS,$FOTOS,$s->id);

//$tableNoExist = $s->tableExist('cat');
//if($tableNoExist)$s->createTable('cat',$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder);
Inline::a();
?>
<script type="text/javascript">
var adm = $.form({
	a:'modelo',
	load:function(_,F,f,e,o,i){}
});
</script>
<script type="text/javascript">
$.extend(true,adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript" src="assets/js/admin/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/admin/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">
var validator = $('#id-form').validate({
	rules: {
		h1: {required: true},
	}
});
$(document).ready(function() {
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