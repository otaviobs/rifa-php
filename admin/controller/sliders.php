<?php
//if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Sliders';
$s->titpg2 = 'Sliders';
$SPG = $s->spg;
$s->spg = 'views';
$temOrder = 1;

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
	c:{a:'slider',mt:'este Slider',ma:'Novo Slider',add:'slider/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Slider',
	l:'Buscando...',
	img:1,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'o,id desc',
	oi:['o','id','dc','da','s','t','d','i','it'],
	th:[
		{t:2,n:'Imagem',w:104,o:'i',tt:'n',a:'',c:'i',d:'default.jpg',l:2,dl:1},
		{n:'Título',w:250,o:'t',tt:'n',l:1,a:'slider/',c:'id',tb:0},
		{n:'Cadastrado em',w:130,o:'dc',tt:'_dc'},
		{n:'Alterado em',w:130,o:'da',tt:'_da'},
		{t:1,n:'Ordem',o:'o',w:80,bt:'ord'},
		{t:1,n:'Opções',w:90,o:'s,t',bt:'opt'}
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