<?php
if($s->tipoAdm>2)$s->locAdmin('.');
$s->titpg = 'Produtos';
$s->titpg2 = 'Produtos';
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
	c:{a:'produto',mt:'este Produto',ma:'Novo Produto',add:'produto/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Produto',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'id_produto desc',
	oi:['id_produto','dataCadastro','dataAlterado','status','nome','quantidade_pontos'],
	th:[
		// {t:2,n:'Imagem',w:104,tt:'n',a:'upload/produtos/',c:'i',d:'default.jpg',l:2,dl:1},
		{n:'Nome',w:250,o:'nome',tt:'nome',l:1,a:'produto/',c:'id',tb:0},
		{n:'SKU',w:250,o:'sku',tt:'sku'},
		{n:'Quantidade Pontos',w:250,o:'quantidade_pontos',tt:'quantidade_pontos'},
		//{n:'Cadastrado em',w:130,o:'dataCadastro',tt:'_dataCadastro'},
		//{n:'Alterado em',w:130,o:'dataAlterado',tt:'_dataAlterado'},
		{t:1,n:'Opções',w:90,o:'s,t',bt:['s','a','']}
	]
});
ft.view = 20;
ft.qt = [10,15,20,30,50,60,100];
</script>
<?
Inline::b();
?>