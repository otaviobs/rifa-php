<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Ordenar Produtos do Menu';
$s->titpg2 = 'Ordenar Produtos do Menu';

$a->cat = array(array('-- Categoria --',0));

$sc = $b->query("select id,h1 n from cat where s order by t");
while($rc=$sc->fetchObject())$a->cat[] = array($rc->n,$rc->id+0);

$SPG = $s->spg;
$s->spg = 'order';
$order = 'om';
$pgAjax = 'ordenar-produto-menu';
$temImg = 1;
$pasta = 'produtos';
$mostrarHome = 0;
$FILTROSJS = '
	e = f.idc;
	o = e.options;
	$.each(_.cat,function(i,v){
		o[i=o.length] = new Option(v[0],v[1]);
		if(v[1]==_.idc)e.selectedIndex = i;
	});
';
$FILTROS = array('idc');