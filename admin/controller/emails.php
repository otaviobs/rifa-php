<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'E-mails';
$s->titpg2 = 'E-mails';
$SPG = $s->spg;
$s->spg = 'views';

$a->gru = array(array('-- Todos os Grupos --',0));
$sc = $b->query('select * from grupo order by t');
while($rc=$sc->fetchObject())$a->gru[] = array($rc->n,$rc->id+0);

$FILTROSOPTIONS = array(
	array('type'=>'select','name'=>'idg'),
);

$FILTROS = $s->filtros($FILTROSOPTIONS);

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
	
	e = f.idg;
	o = e.options;
	$.each(_.gru,function(i,v){
		o[i=o.length] = new Option(v[0],v[1]);
		if(v[1]==_.idg)e.selectedIndex = i;
	});
});

var adm = $.tab({
	c:{a:'email',mt:'este E-mail',ma:'Novo E-mail',add:'admin/email/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum E-mail',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'dv desc',
	oi:['id','dc','da','s','qt','t','t1'],
	th:[
		{n:'E-mail',w:300,o:'email',l:1,a:'admin/email/',c:'id',tb:0},
		//{n:'Telefone',w:300,o:'t1',l:1,a:'https://wa.me/',c:'whats',tb:1},
		{n:'Grupo',w:250,o:'t',tt:'n',l:1,a:'admin/email/',c:'id',tb:0},
		{t:1,n:'Receber',w:70,o:'s,e',bt:['s']},
		{t:1,n:'Opções',w:70,bt:['a',' ','d']}
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