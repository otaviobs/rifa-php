<?php
//if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Otimizar Fotos';
$s->titpg2 = 'Otimizar Fotos';
$SPG = $s->spg;
$s->spg = 'views';
$hideADD = 1;

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
	c:{a:'otimizar',mt:'',ma:'',add:'',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhuma Foto',
	l:'Buscando...',
	img:1,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'id desc',
	oi:['id','tp','tipo','dc','da','s','t','d','i','it','q'],
	th:[
		{t:2,n:'Imagem',w:104,tt:'n',a:'',c:'i',d:'default.jpg',l:2,dl:1},
		//{n:'Título',w:250,o:'t',tt:'n',l:1,a:'admin/blog/',c:'id',tb:0},
		{t:1,n:'Otimizar',w:80,o:'id',c:'id',tb:0,bt:[{tt:6,i:'iblock',t:'Otimizar Foto'}]},
		//{t:1,n:'Otimizar',w:90,o:'s,t',bt:'opt'}
	]
});
ft.view = 30;
ft.qt = [10,15,20,30,50,60,100];
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
</script>
<?
Inline::b();
?>