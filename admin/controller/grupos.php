<?php
if($s->tipoAdm==3||$s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Grupos';
$s->titpg2 = 'Grupos';
$SPG = $s->spg;
$s->spg = 'views';

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

});

var adm = $.tab({
	c:{a:'grupo',mt:'este Grupo',ma:'Novo Grupo',add:'admin/grupo/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Grupo',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'dv desc',
	oi:['id','dc','da','s','qt','t'],
	th:[
		{n:'Grupo',w:250,o:'t',tt:'n',l:1,a:'admin/grupo/',c:'id',tb:0},
		{n:'E-mails',w:100,o:'qt,t'},
		{n:'Cadastrado em',w:130,o:'dc',tt:'_dc'},
		{n:'Alterado em',w:130,o:'da',tt:'_da'},
		{t:1,n:'Opções',w:90,o:'s,t',bt:['a',' ','d']}
	]
});
ft.view = 10;
ft.qt = [10,15,20,30,50,60,100];
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
</script>
<?
Inline::b();
?>