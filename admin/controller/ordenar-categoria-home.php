<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Ordenar Categorias na Home';
$s->titpg2 = 'Ordenar Categorias na Home';
$SPG = $s->spg;
$s->spg = 'order';
$order = 'oh';
$pgAjax = 'ordenar-categoria-home';
$temImg = 0;
$pasta = 'categorias';
$mostrarHome = 0;
$FILTROSJS = '';