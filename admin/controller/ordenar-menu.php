<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Ordenar Categorias no Menu';
$s->titpg2 = 'Ordenar Categorias no Menu';
$SPG = $s->spg;
$s->spg = 'order';
$order = 'om';
$pgAjax = 'ordenar-menu';
$temImg = 0;
$pasta = 'categorias';
$mostrarHome = 0;
$FILTROSJS = '';