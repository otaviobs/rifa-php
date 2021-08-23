<?php
if($s->tipoAdm==3||$s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Contatos';
$s->titpg2 = 'Contatos';
$SPG = $s->spg;
$s->spg = 'views';

Inline::a();
?>
<script type="text/javascript">
var ft = {}

$(function(){
	var _ = ft,f = $('#id-form-filtro')[0],e,o;
	_.f = f;

	e = f.qt;
	o = e.options;
	$.each(_.qt,function(i,v){
		o[i=o.length] = new Option(v,v);
		if(_.view==v)e.selectedIndex = i;
	});
});

var adm = $.tab({
	c:{a:'contatos',mt:'este Contato',ma:'Novo Contato',add:'admin/contato/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Contato',
	l:'Buscando...',
	ajax:1,
	debugBusca:0,
	o:'dc desc',
	oi:['id','dc','da','nome','email','telefone'],
	th:[
		{n:'ID',w:80,o:'id',a:'contato/',c:'id',tb:0},
		{n:'Nome',w:150,o:'nome',l:1},
		{n:'E-mail',w:150,o:'email',l:1},
		{n:'Telefone',w:150,o:'telefone',l:1},
		{t:1,n:'VER',w:80,o:'id',c:'id',tb:0,bt:[{tt:1,m:'cp',a:'contato/',i:['isearch'],t:['Ver Contato']}]},
	]
});
ft.qt = [10,15,20,30,50,60,100];
</script>
<?php
Inline::b();
?>