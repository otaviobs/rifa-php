<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg3 = 'Serviços '.$rs->nome;
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
	c:{a:'servico',mt:'este Serviço',ma:'Novo Serviço',add:'servico/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhuma Categoria',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'dc desc',
	oi:['id','dc','da','s','t','d','i','it','q'],
	th:[
		//{t:2,n:'Imagem',w:104,o:'i',tt:'n',a:'upload/categorias/',c:'i',d:'default.jpg',l:2,dl:1},
		{n:'Título',w:250,o:'t',tt:'h1',l:1,a:'servico/<?=$s->id?>',c:'id',tb:0},
		{n:'Cadastrado em',w:130,o:'dc',tt:'_dc'},
		{t:1,n:'Adicionar Fotos',w:250,o:'t',bt:[{tt:1,m:'cp',a:'categoria-foto/',i:'ifolder',t:'Adicionar Fotos'}]},
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