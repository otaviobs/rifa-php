<?php
//if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Blogs';
$s->titpg2 = 'Blogs';
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

	/*e = f.tipo;
	o = e.options;
	$.each(_.tp,function(i,v){
		o[i=o.length] = new Option(v[0],v[1]);
		if(v[1]==_.tipo)e.selectedIndex = i;
	});*/
});

var adm = $.tab({
	c:{a:'blog',mt:'este Post',ma:'Novo Post',add:'blog/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Post',
	l:'Buscando...',
	img:1,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'dc desc',
	oi:['id','tp','tipo','dc','da','s','t','d','i','it','q'],
	th:[
		{t:2,n:'Imagem',w:104,tt:'n',a:'../upload/blogs/',c:'i',d:'default.jpg',l:2,dl:1},
		//{n:'Tipo de Post',w:250,o:'tipo',tt:'tp',l:1},
		{n:'Título',w:250,o:'t',tt:'n',l:1,a:'blog/',c:'id',tb:0},
		{n:'Cadastrado em',w:130,o:'dc',tt:'_dc'},
		//{n:'Alterado em',w:130,o:'da',tt:'_da'},
		{t:1,n:'Recortar Imagens',w:115,o:'it',bt:[{tt:1,m:'cp',a:'crop-blogs/',i:['icrop','icropped'],t:['Recortar Imagens','Imagens Recortadas']}]},
		{t:1,n:'Adicionar Fotos',w:250,o:'t',bt:[{tt:1,m:'cp',a:'blog-foto/',i:'ifolder',t:'Adicionar Fotos'}]},
		{t:1,n:'Opções',w:90,o:'s,t',bt:'opt'}
	]
});
ft.view = 10;
ft.qt = [10,15,20,30,50,60,100];
//ft.tp = [['-- Selecione o Tipo de Post --',0],['Patrocinados','atletas'],['Novidades','novidades'],['Receitas','receitas'],['Treinos','treinos']];
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
</script>
<?
Inline::b();
?>