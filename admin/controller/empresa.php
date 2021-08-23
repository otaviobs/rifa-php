<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from empresa where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Empresas';
$s->titpg2 = 'Empresas';
$s->titpg3 = $rs->n?$rs->n:'Nova Empresa';
$SPG = $s->spg;
$s->spg = 'edit';
$mostraHome = $temSlug = 0;
$temOrder = 1;

$a->id = $s->id;
$a->tipo = $rs->tipo;
$a->uf = $rs->uf;
$a->city = $rs->city;
$P = '../upload/empresas/';
$Pt = $P.'thumb/';
$a->i->i = $rs->i?$P.$rs->i:'';
$a->i->it = $rs->it?$Pt.$rs->it:'';
$a->i->il = $rs->il?$P.$rs->il:'';

$a->ufs = array(array('-- Selecione o Estado --',0));
$sc = $b->query('select id,uf from estado order by nome');
while($rc=$sc->fetchObject())$a->ufs[] = array($rc->uf,$rc->uf);

$a->cidades = array(array('-- Selecione a Cidade --',0,0));
$sc = $b->query('select id,nome,uf from cidade order by nome');
while($rc=$sc->fetchObject())$a->cidades[] = array($rc->nome,$rc->nome,$rc->uf);

$a->back = $s->back;

if($s->id){
	// CATEGORIAS
	$categorias = $b->query("select e.idc,c.h1 from empresa_cat e inner join cat c on e.idc=c.id where e.ide='{$s->id}' group by e.id");
	if($categorias->rowCount()){
		$CATEGORIAOPTIONS = array();
		while($categoria=$categorias->fetchObject())$CATEGORIAOPTIONS[]= '<option value="'.$categoria->idc.'" selected>'.$categoria->h1.'</option>';
	}
}

$NAVIGATION = array(
	array('icon'=>'fa-user','text'=>'Geral','active'=>1),
	array('icon'=>'fa-map-marker','text'=>'Endereço'),
	array('icon'=>'fa-facebook','text'=>'Redes Sociais'),
	array('icon'=>'fa-image','text'=>'Fotos'),
);

$FIELDSOPTIONS = array(
	array('tab'=>0,'type'=>'multiple','classGrid'=>'col-md-12','class'=>'js-categorias','name'=>'idc','label'=>'Categorias','limit'=>0,'multipleOptions'=>$CATEGORIAOPTIONS),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'nome','label'=>'Nome da Empresa'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'area','label'=>'Área de Atuação'),
	array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'d','label'=>'Sobre a Empresa'),
	array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'horario','label'=>'Horário de Funcionamento'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'email','label'=>'E-mail'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-6','name'=>'site','label'=>'Website'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-4','class'=>'mk-cel','name'=>'t1','label'=>'Telefone / Celular'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-4','class'=>'mk-cel','name'=>'t2','label'=>'Telefone / Celular'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-4','class'=>'mk-cel','name'=>'whatsapp','label'=>'Whatsapp'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-4','name'=>'texto_call','label'=>'Texto Call to Action'),
	array('tab'=>0,'type'=>'text','classGrid'=>'col-md-4','name'=>'url_call','label'=>'Link Call to Action'),
	array('tab'=>0,'type'=>'color','classGrid'=>'col-md-4','class'=>'color {hash:true,caps:false}','name'=>'cor_call','label'=>'Cor do Botão Call to Action','color'=>'#ff9e00'),
	array('tab'=>1,'type'=>'text','classGrid'=>'col-md-5','class'=>'mk-cep','name'=>'cep','label'=>'* CEP'),
	array('tab'=>1,'type'=>'text','classGrid'=>'col-md-5','name'=>'endereco','label'=>'* Endereço'),
	array('tab'=>1,'type'=>'text','classGrid'=>'col-md-2','name'=>'num','label'=>'Número'),
	array('tab'=>1,'type'=>'text','classGrid'=>'col-md-12','name'=>'comp','label'=>'Complemento'),
	array('tab'=>1,'type'=>'text','classGrid'=>'col-md-5','name'=>'bairro','label'=>'* Bairro'),
	// array('tab'=>1,'type'=>'text','classGrid'=>'col-md-5','name'=>'city','label'=>'* Cidade'),
	array('tab'=>1,'type'=>'select','classGrid'=>'col-md-2','name'=>'uf','label'=>'* Estado'),
	array('tab'=>1,'type'=>'select','classGrid'=>'col-md-5','name'=>'city','label'=>'* Cidade'),
	array('tab'=>1,'type'=>'text','classGrid'=>'col-md-12','name'=>'map','label'=>'Código Google Maps','tooltip'=>'<i class="fa fa-question-circle" data-toggle="tooltip" title="" style="font-size:16px" data-original-title="Na página do google maps clicar em compartilhar. Depois clicar em incorporar mapa depois COPIAR HTML"></i>'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'facebook','label'=>'Facebook'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'instagram','label'=>'Instagram'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'youtube','label'=>'Youtube'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'twitter','label'=>'Twitter'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'linkedin','label'=>'Linkedin'),
	array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'pinterest','label'=>'Pinterest'),
	// array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'plus','label'=>'Google Plus'),
	array('tab'=>3,'type'=>'image','classGrid'=>'col-md-6','name'=>'i','label'=>'Banner:','largura'=>'2560','altura'=>'525'),
	array('tab'=>3,'type'=>'image','classGrid'=>'col-md-6','name'=>'il','label'=>'Logo:','largura'=>'150','altura'=>'150'),
);

$NAVS = $s->navs($NAVIGATION,$s->id);
$TABS = $s->tabs($NAVIGATION,$FIELDSOPTIONS,$FOTOS,$s->id);

//$tableNoExist = $s->tableExist('empresa');
//if($tableNoExist)$s->createTable('empresa',$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder);
Inline::a();
?>
<link href="assets/css/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="assets/js/admin/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/admin/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/js/jscolor/jscolor.js"></script>
<script type="text/javascript" src="assets/js/admin/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/admin/select2.min.js"></script>
<script type="text/javascript">
var adm = $.form({
	a:'empresa',
	cgC:function(s){
		var _ = this,f = _.f,e = f.city,o = e.options,id = $(f.uf).val();
		o.length = 0;
		$.each(_.cidades,function(i,v){
			if(i&&v[2]!=id)return;
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.city)e.selectedIndex = i;
		});
	},
	cgCep:function(){
		var _ = this,f = _.f,c = $(f.cep),cep = c.val(),re = /^\D*(\d{2})\D*(\d{3})\D*(\d{3})\D*$/,l,x;
		if(re.test(cep))cep = cep.replace(re,'$1$2-$3'),c.val(cep);
		else return false;
		if(_.cep==cep)return false;
		_.cep = cep;
		c.val('Carregando...').attr('disabled',true);
		l = c.next().show();
		//$.getJSON('http://cep.paicon.com.br/jsonp/'+cep.replace('-','')+'?callback=?',function(j){
		$.getJSON('https://viacep.com.br/ws/'+cep+'/json/?callback=?',function(j){
			x = j;
		}).complete(function(){
			$(f.endereco).val(x?x.logradouro:'');
			$(f.bairro).val(x?x.bairro:'');
			$(f.uf).val(x?x.uf.toUpperCase():'');
			_.cgC();
			setTimeout(function(){
				$(f.city).val(x?x.localidade:'');
			}, 1000);
			c.val(cep).attr('disabled',false);
			$(f.num).focus();
			l.hide();
		});
	},
	load:function(_,F,f,e,o,i){
		$(f.cep).bind('change keyup',function(){
			_.cgCep();
		}).after($('<span class="ico load2 ml"/>').hide());

		e = f.uf;
		o = e.options;
		$.each(_.ufs,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.uf)e.selectedIndex = i;
		});
		$(e).change(function(){
			_.cgC();
		});
		_.cgC();

		$.mask.definitions['~']='[-]?';
		
		$('.mk-cep').mask('99999-999');		
		$('.mk-cel').focusout(function(){
			var e = $(this);
			e.unmask().mask(e.val().replace(/\D/g,'').length>10?'(99) 99999-999?9':'(99) 9999-9999?9');
		}).focusout();
	}
});</script>
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

$(document).ready(function() {
	$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
		var oldRemoveChoice = Search.prototype.searchRemoveChoice;
		
		Search.prototype.searchRemoveChoice = function () {
			oldRemoveChoice.apply(this, arguments);
			this.$search.val('');
		};
		$('.js-categorias').select2({
			placeholder: 'Buscar Categorias',
			ajax: {
				url:'ajax/g/categorias.json',
				dataType:'json',
				delay:250,
				data:function(params){
					return{
						q:params.term
					};
				},
				processResults:function(data){
					return {
						results: data
					};
				},
				cache: true
			},
			minimumInputLength: 2,
		});
	});
});

$('#d').caracters({max:2000});

$(document).on('paste', '#map', function(e) {
	e.preventDefault();
  var map = e.originalEvent.clipboardData.getData('text');
  var maps = map.split(" ");
  var url = maps[1].replace('src=', '').replace(/"/g, '');
  $(this).val(url);
});
</script>
<?
Inline::b();
?>