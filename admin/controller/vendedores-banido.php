<?php
// if($s->tipoAdm>2)$s->locAdmin('.');
$s->titpg = 'Vendedores Banidos';
$s->titpg2 = 'Vendedores Banidos';
$SPG = $s->spg;
$hideADD = 1;
$s->spg = 'views';

// $EXPORT = '
// 	<div class="cell itxt pull-right">
// 		<a class="btn btn-success" href="download-vendedores-banidos">EXPORTAR VENDEDORES</a>
// 	</div>
// ';

Inline::a();
?>
<script type="text/javascript">
var ft = {}

$(function(){
	var _ = ft,f = $('#id-form-filtro')[0],e,o,i=0,k;
	_.f = f;

	e = f.qt;
	o = e.options;
	$.each(_.qt,function(i,v){
		o[i=o.length] = new Option(v,v);
		if(_.view==v)e.selectedIndex = i;
	});

	/*e = f.t;
	o = e.options;
	$.each(_.tipo,function(i,v){
		o[i=o.length] = new Option(v[0],v[1]);
		if(v[1]==_.t)e.selectedIndex = i;
	});*/
});

var adm = $.tab({
	c:{a:'vendedor-banido',mt:'este Vendedor',ma:'Novo Vendedores',add:'vendedor/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Vendedor',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'id_usuario desc',
	oi:['id_usuario','status','dataCadastro','dataAlterado','nome','email'],
	th:[
		{n:'Nome',w:290,o:'nome',l:1,a:'vendedor/',c:'id',tb:0},
		{n:'E-mail',w:290,o:'email',l:1},
		{n:'Cadastrado em',w:130,o:'dataCadastro',tt:'_dataCadastro'},
		{t:1,n:'Opções',w:90,o:'s,u',bt:['', '', 'd']}
	]
});
ft.view = 20;
ft.qt = [10,15,20,30,50,60,100];
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
</script>
<?
Inline::b();
?>