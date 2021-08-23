<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from slider where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Sliders';
$s->titpg2 = 'Sliders';
$s->titpg3 = $rs->n?$rs->n:'Novo Slider';
$SPG = $s->spg;
$s->spg = 'edit';
$mostraHome = $temSlug = 0;
$temOrder = 1;

$a->id = $s->id;
$a->tipo = $rs->tipo;
$P = '../upload/sliders/';
$Pt = $P.'thumb/';
$a->i->i = $rs->i?$P.$rs->i:'';
$a->i->it = $rs->it?$Pt.$rs->it:'';
$a->i->il = $rs->il?$P.$rs->il:'';

$a->back = $s->back;

$NAVIGATION = array(
	array('icon'=>'fa-user','text'=>'Geral','active'=>1),
);

$FIELDSOPTIONS = array(
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'n','label'=>'Título'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'n2','label'=>'Subtítulo'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'l','label'=>'Link'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'l2','label'=>'Link 2'),
	array('tab'=>0,'type'=>'image','classGrid'=>'col-md-6','name'=>'i','label'=>'* Imagem:','largura'=>'1920','altura'=>'900'),
);

$NAVS = $s->navs($NAVIGATION,$s->id);
$TABS = $s->tabs($NAVIGATION,$FIELDSOPTIONS,$FOTOS,$s->id);

//$tableNoExist = $s->tableExist('slider');
//if($tableNoExist)$s->createTable('slider',$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder);
Inline::a();
?>
<link href="assets/css/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="assets/js/admin/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/js/admin/select2.min.js"></script>
<script type="text/javascript" src="assets/js/jscolor/jscolor.js"></script>
<script type="text/javascript">
var adm = $.form({
	a:'slider',
	y:{y:''},
	cgT:function(h){
		//var _ = this,f = _.f,tipo = $(this.f.tipo).val();
		var tipo = 'imagem';
		$('.imagem')[tipo=='imagem'?'show':'hide']();
		$('.video')[tipo=='video'?'show':'hide']();
	},
	load:function(_,F,f,e,o,i){
		/*e = f.tipo;
		o = e.options;
		$.each(_.tp,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.tipo)e.selectedIndex = i;
		});
		$(e).change(function(){
			_.cgT();
		});
		_.cgT(0);*/
		_.cgT(0);
	},
	tp:[['-- Selecione o Tipo de Slider --',0],['Imagem','imagem'],['Vídeo','video']]
});
</script>
<script type="text/javascript">
$.extend(adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript">
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