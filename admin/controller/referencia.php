<?php
//if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->id = 1;
if($s->id&&!($rs=$b->query("select * from referencia where id={$s->id} limit 1")->fetchObject()))$s->locAdmin('produtos');

$s->titpg = 'Texto de Referência';
$s->titpg2 = 'Texto de Referência';
$s->titpg3 = 'Alterar Texto de Referência';
$SPG = $s->spg;
$s->spg = 'edit';
$temSlug = $temOrder = 0;

$a->id = $s->id;
$a->back = $s->back;

$NAVIGATION = array(
	array('icon'=>'fa-user','text'=>'Geral','active'=>1),
	//array('icon'=>'fa-image','text'=>'Imagens','onlyID'=>1),
);

$FIELDSOPTIONS = array(
	array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'d','label'=>'* Descrição'),
);

$NAVS = $s->navs($NAVIGATION,$s->id);
$TABS = $s->tabs($NAVIGATION,$FIELDSOPTIONS,$FOTOS,$s->id);

//$tableNoExist = $s->tableExist('referencia');
//if($tableNoExist)$s->createTable('referencia',$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder);
Inline::a();
?>
<script type="text/javascript">
var adm = $.form({
	a:'referencia',
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
		d: {required: true},
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