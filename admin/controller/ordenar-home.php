<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Ordenar Produtos da Home';
$s->titpg2 = 'Ordenar Produtos da Home';

$SPG = $s->spg;
$s->spg = 'order';
$order = 'oh';
$pgAjax = 'ordenar-home';
$temImg = 1;
$pasta = 'produtos';
$mostrarHome = 1;
$FILTROSJS = '';