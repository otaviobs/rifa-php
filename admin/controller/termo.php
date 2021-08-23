<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from termos where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Termos';
$s->titpg2 = 'Termos';
$s->titpg3 = $rs->n?$rs->n:'Novo Termo';
$SPG = $s->spg;
$s->spg = 'edit';
// $temSlug = $temOrder = 1;

$url_seo = $s->base.$rs->t;

$a->id = $s->id; 
$a->back = $s->back;

$NAVIGATION = array(
	array('icon'=>'fa-user','text'=>'Geral','active'=>1),
	array('icon'=>'fa-google','text'=>'SEO'),
);

$FIELDSOPTIONS = array(
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-12','name'=>'h1','label'=>'* Título'),
  array('tab'=>0,'type'=>'summernote','classGrid'=>'col-md-12','name'=>'d','label'=>'* Descrição'),
  array('tab'=>1,'type'=>'text','classGrid'=>'col-md-12','name'=>'tagt','label'=>'Meta Title'),
  array('tab'=>1,'type'=>'meta','classGrid'=>'col-md-12','name'=>'tagd','label'=>'Meta Description'),
);

$FOTOS = array();

$NAVS = $s->navs($NAVIGATION,$s->id);
$TABS = $s->tabs($NAVIGATION,$FIELDSOPTIONS,$FOTOS,$s->id);

//$tableNoExist = $s->tableExist('cat');
//if($tableNoExist)$s->createTable('cat',$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder);

Inline::a();
?>
<script type="text/javascript" src="assets/js/admin/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/admin/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">
var adm = $.form({
  a:'termo',
  load:function(_,F,f,e,o,i){},
});
</script>
<script type="text/javascript">
$.extend(true,adm,<?=json_encode($a)?>);
</script>
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#id-form').validate({
    rules: {
      h1: {required: true},
    }
  });
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
echo $s->summernote();
Inline::b();
?>