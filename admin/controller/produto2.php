<?php
//if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&$s->tipoAdm<3&&!($rs=$b->query("select * from produto where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);
if($s->id&&$s->tipoAdm==3&&!($rs=$b->query("select * from produto where id={$s->id} and ido={$s->idu} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Produtos';
$s->titpg2 = 'Produtos';
$s->titpg3 = $rs->n?$rs->n:'Novo Produto';
$SPG = $s->spg;
$s->spg = 'edit';
$temSlug = $temOrder = 1;
if($s->tipoAdm==3)$hideSTATUS = 1;

$a->id = $s->id;
if($s->tipoAdm<3)$a->ido = $rs->ido;
if($s->tipoAdm==3)$a->ido = $s->idu;
$a->idc = $rs->idc;
$a->idf = $rs->idf;
$a->idm = $rs->idm;
$a->ano = $rs->ano;
$a->opcao = $rs->opcao;
$a->uf = $rs->uf;

$P = 'upload/produtos/';
$Pt = $P.'thumb/';
$Pa = $P.'arquivos/';
 
$a->i->i = $rs->i?$P.$rs->i:'';
$a->i->laudo = $rs->laudo?$P.$rs->laudo:'';

$url_seo = $s->base.'/'.$rs->t;

$a->cat = array(array('-- Selecione a Categoria --',''));
$sc = $b->query("select id,h1 from cat where s order by t");
while($rc=$sc->fetchObject())$a->cat[] = array($rc->h1,$rc->id+0);	

$a->fab = array(array('-- Selecione o Fabricante --',''));
$sc = $b->query("select id,h1 from fabricante order by t");
while($rc=$sc->fetchObject())$a->fab[] = array($rc->h1,$rc->id+0);

$a->mod = array(array('-- Selecione o Modelo --',''));
$sc = $b->query("select id,h1 from modelo order by t");
while($rc=$sc->fetchObject())$a->mod[] = array($rc->h1,$rc->id+0);

$a->back = $s->back;

if($s->id){
	//CONCESSIONARIA
	$concessionarias = $b->query("select p.ido,c.r,c.i from concessionaria c inner join produto p on c.id=p.ido where p.id='{$s->id}' limit 1");
	if($concessionarias->rowCount()){
		$CONCESSIONARIASOPTIONS = array();
		$pastaOptions = 'upload/concessionarias/';
		while($concessionaria=$concessionarias->fetchObject())$CONCESSIONARIASOPTIONS[]= '<option value="'.$concessionaria->ido.'" selected data-image="'.$pastaOptions.$concessionaria->i.'">'.$concessionaria->r.'</option>';
	}
}elseif(!$s->id&&$s->tipoAdm==3){
	//CONCESSIONARIA
	$concessionarias = $b->query("select id,r,i from concessionaria where id='{$s->idu}' limit 1");
	if($concessionarias->rowCount()){
		$CONCESSIONARIASOPTIONS = array();
		$pastaOptions = 'upload/concessionarias/';
		while($concessionaria=$concessionarias->fetchObject())$CONCESSIONARIASOPTIONS[]= '<option value="'.$concessionaria->id.'" selected data-image="'.$pastaOptions.$concessionaria->i.'">'.$concessionaria->r.'</option>';
	}
}

if($s->tipoAdm<3){
	$NAVIGATION = array(
		array('icon'=>'fa-user','text'=>'Geral','active'=>1),
		array('icon'=>'fa-image','text'=>'Fotos'),
		//array('icon'=>'fa-image','text'=>'Fotos Adicionais','onlyID'=>1),
		//array('icon'=>'fa-image','text'=>'Fotos Anexos','onlyID'=>1),
		array('icon'=>'icon-size-actual','text'=>'Espeficiações Técnicas'),
		array('icon'=>'fa-map-marker','text'=>'Endereço'),
		//array('icon'=>'fa-google','text'=>'SEO'),
	);

	$FIELDSOPTIONS = array(
		array('tab'=>0,'type'=>'multiple','classGrid'=>'col-md-12','class'=>'js-concessionarias','name'=>'ido','label'=>'* Concessionária','limit'=>1,'multipleOptions'=>$CONCESSIONARIASOPTIONS,'required'=>1),
		array('tab'=>0,'type'=>'select','classGrid'=>'col-md-4','name'=>'idc','label'=>'* Categoria','required'=>1),
		array('tab'=>0,'type'=>'select','classGrid'=>'col-md-4','name'=>'idf','label'=>'* Fabricante','required'=>1),
		array('tab'=>0,'type'=>'select','classGrid'=>'col-md-4','name'=>'idm','label'=>'* Modelo','required'=>1),
		//array('tab'=>0,'type'=>'text','classGrid'=>'col-md-12','name'=>'h1','label'=>'* Título (H1)','required'=>1),
		array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'d','label'=>'* Descrição','required'=>1),
		//array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'palavras_chaves','label'=>'Palavras Chaves para Busca','required'=>1),
		array('tab'=>1,'type'=>'image','classGrid'=>'col-md-6','name'=>'i','label'=>'Foto do Número de Série:','required'=>1),
		array('tab'=>1,'type'=>'image','classGrid'=>'col-md-6','name'=>'laudo','label'=>'Laudo Técnico:','required'=>1),
		array('tab'=>1,'type'=>'fotos','arrayName'=>'fotos','link'=>'admin/produto-foto/','text'=>'FOTOS','required'=>1),
		//array('tab'=>2,'type'=>'fotos','arrayName'=>'adicionais','link'=>'admin/produto-foto-adicionais/','text'=>'FOTOS ADICIONAIS'),
		//array('tab'=>3,'type'=>'fotos','arrayName'=>'anexos','link'=>'admin/produto-foto-anexos/','text'=>'ANEXOS LAUDOS E NF'),
		array('tab'=>2,'type'=>'number','float'=>2,'min'=>'0.01','step'=>'0.10','classGrid'=>'col-md-4','name'=>'v','label'=>'Valor','required'=>1),
		array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'combustivel','label'=>'Combustível','required'=>1),
		array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'horimetro','label'=>'Horímetro','required'=>1),
		array('tab'=>2,'type'=>'select','classGrid'=>'col-md-4','name'=>'ano','label'=>'* Ano','required'=>1),
		array('tab'=>2,'type'=>'select','classGrid'=>'col-md-4','name'=>'opcao','label'=>'Opção','required'=>1),
		array('tab'=>2,'type'=>'text','classGrid'=>'col-md-4','name'=>'rodagem','label'=>'Rodagem','required'=>1),
		array('tab'=>2,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'opcionais','label'=>'Opcionais','required'=>1),
		array('tab'=>3,'type'=>'text','classGrid'=>'col-md-3','class'=>'mk-cep','name'=>'cep','label'=>'* CEP','required'=>1),
		array('tab'=>3,'type'=>'text','classGrid'=>'col-md-4','name'=>'rua','label'=>'* Endereço','required'=>1),
		array('tab'=>3,'type'=>'text','classGrid'=>'col-md-2','name'=>'num','label'=>'Número','required'=>1),
		array('tab'=>3,'type'=>'text','classGrid'=>'col-md-3','name'=>'comp','label'=>'Complemento','required'=>1),
		array('tab'=>3,'type'=>'text','classGrid'=>'col-md-5','name'=>'bairro','label'=>'* Bairro','required'=>1),
		array('tab'=>3,'type'=>'text','classGrid'=>'col-md-5','name'=>'city','label'=>'* Cidade','required'=>1),
		array('tab'=>3,'type'=>'select','classGrid'=>'col-md-2','name'=>'uf','label'=>'* Estado','required'=>1),
		//array('tab'=>4,'type'=>'text','classGrid'=>'col-md-12','name'=>'tagt','label'=>'Meta Title'),
		//array('tab'=>4,'type'=>'meta','classGrid'=>'col-md-12','name'=>'tagd','label'=>'Meta Description'),
	);	
}else{
	$NAVIGATION = array(
		array('icon'=>'fa-user','text'=>'Geral','active'=>1),
		array('icon'=>'fa-image','text'=>'Fotos','onlyID'=>1),
		array('icon'=>'fa-image','text'=>'Fotos Adicionais','onlyID'=>1),
		array('icon'=>'fa-image','text'=>'Fotos Anexos','onlyID'=>1),
		array('icon'=>'icon-size-actual','text'=>'Espeficiações Técnicas'),
		array('icon'=>'fa-map-marker','text'=>'Endereço'),
	);

	$FIELDSOPTIONS = array(
		array('tab'=>0,'type'=>'multiple','classGrid'=>'col-md-12','class'=>'js-concessionarias','name'=>'ido','label'=>'* Concessionária','limit'=>1,'multipleOptions'=>$CONCESSIONARIASOPTIONS,'required'=>1),
		array('tab'=>0,'type'=>'select','classGrid'=>'col-md-4','name'=>'idc','label'=>'* Categoria','required'=>1),
		array('tab'=>0,'type'=>'select','classGrid'=>'col-md-4','name'=>'idf','label'=>'* Fabricante','required'=>1),
		array('tab'=>0,'type'=>'select','classGrid'=>'col-md-4','name'=>'idm','label'=>'* Modelo','required'=>1),
		//array('tab'=>0,'type'=>'text','classGrid'=>'col-md-12','name'=>'h1','label'=>'* Título (H1)','required'=>1),
		array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'d','label'=>'* Descrição','required'=>1),
		//array('tab'=>0,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'palavras_chaves','label'=>'Palavras Chaves para Busca'),
		array('tab'=>1,'type'=>'fotos','link'=>'admin/produto-foto/','text'=>'FOTOS'),
		array('tab'=>2,'type'=>'fotos','link'=>'admin/produto-foto-adicionais/','text'=>'FOTOS ADICIONAIS'),
		array('tab'=>3,'type'=>'fotos','link'=>'admin/produto-foto-anexos/','text'=>'ANEXOS LAUDOS E NF'),
		//array('tab'=>1,'type'=>'image','classGrid'=>'col-md-6','name'=>'i','label'=>'Foto do Número de Série:'),
		//array('tab'=>1,'type'=>'image','classGrid'=>'col-md-6','name'=>'laudo','label'=>'Laudo Técnico:'),
		array('tab'=>4,'type'=>'number','float'=>2,'min'=>'0.01','step'=>'0.10','classGrid'=>'col-md-4','name'=>'v','label'=>'Valor','required'=>1),
		array('tab'=>4,'type'=>'text','classGrid'=>'col-md-4','name'=>'combustivel','label'=>'Combustível','required'=>1),
		array('tab'=>4,'type'=>'text','classGrid'=>'col-md-4','name'=>'horimetro','label'=>'Horímetro','required'=>1),
		array('tab'=>4,'type'=>'select','classGrid'=>'col-md-4','name'=>'ano','label'=>'* Ano','required'=>1),
		array('tab'=>4,'type'=>'select','classGrid'=>'col-md-4','name'=>'opcao','label'=>'Opção','required'=>1),
		array('tab'=>4,'type'=>'text','classGrid'=>'col-md-4','name'=>'rodagem','label'=>'Rodagem','required'=>1),
		array('tab'=>4,'type'=>'textarea','classGrid'=>'col-md-12','name'=>'opcionais','label'=>'Opcionais','required'=>1),
		array('tab'=>5,'type'=>'text','classGrid'=>'col-md-3','class'=>'mk-cep','name'=>'cep','label'=>'* CEP','required'=>1),
		array('tab'=>5,'type'=>'text','classGrid'=>'col-md-4','name'=>'rua','label'=>'* Endereço','required'=>1),
		array('tab'=>5,'type'=>'text','classGrid'=>'col-md-2','name'=>'num','label'=>'Número','required'=>1),
		array('tab'=>5,'type'=>'text','classGrid'=>'col-md-3','name'=>'comp','label'=>'Complemento','required'=>1),
		array('tab'=>5,'type'=>'text','classGrid'=>'col-md-5','name'=>'bairro','label'=>'* Bairro','required'=>1),
		array('tab'=>5,'type'=>'text','classGrid'=>'col-md-5','name'=>'city','label'=>'* Cidade','required'=>1),
		array('tab'=>5,'type'=>'select','classGrid'=>'col-md-2','name'=>'uf','label'=>'* Estado','required'=>1),
	);
}


$FOTOS = array();
$sfotos = $b->query("select * from fotos where idp='{$s->id}' and tipo='produto'");
if($sfotos->rowCount()){
	while($rfotos=$sfotos->fetchObject()){
		$FOTOS['fotos'][] = array('id'=>$rfotos->id,'it'=>$rfotos->it,'pasta'=>'produtos','principal'=>$rfotos->principal,'hover'=>$rfotos->hover);
	}
}

$sfotosAdicionais = $b->query("select * from fotos where idp='{$s->id}' and tipo='produto-adicionais'");
if($sfotosAdicionais->rowCount()){
	while($rfotos=$sfotosAdicionais->fetchObject()){
		$FOTOS['adicionais'][] = array('id'=>$rfotos->id,'it'=>$rfotos->it,'pasta'=>'produtos','principal'=>$rfotos->principal,'hover'=>$rfotos->hover);
	}
}

$sfotosAnexos = $b->query("select * from fotos where idp='{$s->id}' and tipo='produto-anexos'");
if($sfotosAnexos->rowCount()){
	while($rfotos=$sfotosAnexos->fetchObject()){
		$FOTOS['anexos'][] = array('id'=>$rfotos->id,'it'=>$rfotos->it,'pasta'=>'produtos','principal'=>$rfotos->principal,'hover'=>$rfotos->hover);
	}
}

$NAVS = $s->navs($NAVIGATION,$s->id);
$TABS = $s->tabs($NAVIGATION,$FIELDSOPTIONS,$FOTOS,$s->id);

//$tableNoExist = $s->tableExist('produtos');
//if($tableNoExist)$s->createTable('produto',$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder);
Inline::a();
?>
<link href="assets/css/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="assets/js/admin/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/admin/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/js/admin/select2.min.js"></script>
<script type="text/javascript">
var adm = $.form({
	a:'',
	cgCep:function(){
		var _ = this,f = _.f,c = $(f.cep),cep = c.val(),re = /^\D*(\d{2})\D*(\d{3})\D*(\d{3})\D*$/,l,x;
		if(re.test(cep))cep = cep.replace(re,'$1$2-$3'),c.val(cep);
		else return false;
		if(_.cep==cep)return false;
		_.cep = cep;
		c.val('Carregando...').attr('disabled',true);
		l = c.next().show();
		//$.getJSON('http://cep.paicon.com.br/jsonp/'+cep.replace('-','')+'?callback=?',function(j){
		$.getJSON('//viacep.com.br/ws/'+cep+'/json/?callback=?',function(j){
			x = j;
		}).complete(function(){
			$(f.rua).val(x?x.logradouro:'');
			$(f.bairro).val(x?x.bairro:'');
			$(f.city).val(x?x.localidade:'');
			$(f.uf).val(x?x.uf.toUpperCase():'');
			c.val(cep).attr('disabled',false);
			$(f.num).focus();
			l.hide();
		});
	},
	load:function(_,F,f,e,o,i){
		e = f.idc;
		o = e.options;
		$.each(_.cat,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.idc)e.selectedIndex = i;
		});

		e = f.idf;
		o = e.options;
		$.each(_.fab,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.idf)e.selectedIndex = i;
<?
if(!$s->id){
?>
			if(v[1]==1)e.selectedIndex = i;
<?	
}
?>
		});

		e = f.idm;
		o = e.options;
		$.each(_.mod,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v[1]==_.idm)e.selectedIndex = i;
		});
	
		e = f.ano;
		o = e.options;
		nowY = new Date().getFullYear();
		for(var Y=nowY; Y>=1950; Y--) {
			o[i=o.length] = new Option(Y,Y);
			if(Y==_.ano)e.selectedIndex = i;
		}

		$(f.cep).bind('change keyup',function(){
			_.cgCep();
		}).after($('<span class="ico load2 ml"/>').hide());

		e = f.uf;
		o = e.options;
		$.each(_.ufs,function(i,v){
			o[i=o.length] = new Option(v,v);
			if(v==_.uf)e.selectedIndex = i;
		});

		e = f.opcao;
		o = e.options;
		$.each(_.opcoes,function(i,v){
			o[i=o.length] = new Option(v[0],v[1]);
			if(v==_.opcao)e.selectedIndex = i;
		});
		
		$('.mk-cep').mask('99999-999');		
		$('.mk-cel').focusout(function(){
			var e = $(this);
			e.unmask().mask(e.val().replace(/\D/g,'').length>10?'(99) 99999-999?9':'(99) 9999-9999?9');
		}).focusout();
	},
	ufs:['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PR','PB','PA','PE','PI','RJ','RN','RS','RO','RR','SC','SE','SP','TO'],
	opcoes:[['Selecione a Opção',''],['Em Operação','Em Operação'],['Em Estoque','Em Estoque']]
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
		$('.js-produtos').select2({
			placeholder: 'Buscar Produtos Relacionados',
			ajax: {
				url:'ajax/g/produto-relacionado.json',
				dataType:'json',
				delay:250,
				data:function(params){
					return{
						q:params.term,
<?
if($s->id){
?>
						id:<?=$s->id?>
<?
}
?>
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
			templateResult:formatState,
			templateSelection:formatState,
		});
<?
if($s->tipoAdm<3){
?>
		$('.js-concessionarias').select2({
			placeholder: 'Buscar Concessionária',
			ajax: {
				url:'ajax/g/concessionarias.json',
				dataType:'json',
				delay:250,
				data:function(params){
					return{
						q:params.term,
<?
	if($s->id){
?>
						id:<?=$s->id?>
<?
	}
?>
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
			templateResult:formatState,
			templateSelection:formatState,
		});

<?
}
?>
		function formatState (data) {
			if (!data.id)return data.text;
			var image = $(data.element).data('image');
			var datad = $(
				'<span><img width=\"100\" src=\"'+(data.image?data.image:image)+'\" class=\"img-flag\" style=\"margin-right:15px\">'+data.text+'</span>'
			);
			return datad;
		};
		function formatStateColor (data) {
			if (!data.id)return data.text;
			var image = $(data.element).data('image');
			var datad = $(
				'<div style="line-height:60px"><div style="float:left;width:60px;height:60px;margin-right:7px;background:'+(image?image:data.image)+'"></div><strong>'+data.text+'</strong></div>'
			);
			return datad;
		};
	});
});

$('#d').caracters({max:250});
$('#opcionais').caracters({max:250});
</script>
<?
echo $s->summernote();
Inline::b();
?>