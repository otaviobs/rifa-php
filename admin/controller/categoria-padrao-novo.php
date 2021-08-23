<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from cat where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Categorias';
$s->titpg2 = 'Categorias';
$s->titpg3 = $rs->n?$rs->n:'Nova Categoria';
// $SPG = $s->spg;
// $s->spg = 'edit';
// $temSlug = $temOrder = 1;

$url_seo = $s->base.'produtos/categoria/'.$rs->t;

$a->id = $s->id;
$P = '../upload/categorias/';
$Pt = $P.'thumb/';
$Pa = $P.'arquivos/';
 
$a->i->i = $rs->i?$P.$rs->i:'';
$a->back = $s->back;

$NAVIGATION = array(
	array('icon'=>'fa-user','text'=>'Geral','active'=>1),
	array('icon'=>'fa-image','text'=>'Fotos Portfólio'),
	//array('icon'=>'fa-google','text'=>'SEO'),
);

$FIELDSOPTIONS = array(
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-12','name'=>'n','label'=>'* Título'),
	//array('tab'=>0,'type'=>'image','classGrid'=>'col-md-6','name'=>'i','label'=>'Ícone:','larguraMin'=>'25','alturaMin'=>'25'),
	array('tab'=>1,'type'=>'fotos','arrayName'=>'fotos','link'=>'portfolio-foto/','text'=>'FOTOS PORTFÓLIO'),
);

$FOTOS = array();
$sfotos = $b->query($teste="select * from fotos where idp='{$s->id}' and tipo='portfolio'");
if($sfotos->rowCount()){
	while($rfotos=$sfotos->fetchObject()){
		$FOTOS['fotos'][] = array('id'=>$rfotos->id,'it'=>$rfotos->it,'pasta'=>'portfolios','principal'=>$rfotos->principal,'hover'=>$rfotos->hover);
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
	a:'cat',
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