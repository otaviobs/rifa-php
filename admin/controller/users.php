<?php
if($s->tipoAdm>2)$s->locAdmin('.');
$s->titpg = 'Usuários';
$s->titpg2 = 'Usuários';
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

	/*e = f.t;
	o = e.options;
	$.each(_.tipo,function(i,v){
		o[i=o.length] = new Option(v[0],v[1]);
		if(v[1]==_.t)e.selectedIndex = i;
	});*/
});

var adm = $.tab({
	c:{a:'user',mt:'este Usuário',ma:'Novo Usuário',add:'user/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Usuário',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'id_usuario desc',
	oi:['id_usuario','status','dataCadastro','dataAlterado','nome','email','id_perfil'],
	th:[
		{n:'Nome',w:290,o:'nome',l:1,a:'user/',c:'id',tb:0},
		{n:'E-mail',w:290,o:'email',l:1},
		{n:'Perfil',w:290,o:'id_perfil',tt:'perfil',l:1},
		{n:'Cadastrado em',w:130,o:'dataCadastro',tt:'_dataCadastro'},
		{t:1,n:'Opções',w:90,o:'s,u',bt:['s', 'a', '']}
	]
});
ft.view = 20;
ft.qt = [10,15,20,30,50,60,100];
ft.tipo = [['-- Selecione o Tipo de Usuário --',0],['Administrador Geral',1],['Marketing',2],['Faturamento',3]];
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
</script>
<?
Inline::b();
?>