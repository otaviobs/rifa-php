<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Ordenar Todos os Produtos';
$s->titpg2 = 'Ordenar Todos os Produtos';
$SPG = $s->spg;
$s->spg = 'order';
$order = 'o';
$pgAjax = 'ordenar-produto-geral';
$temImg = 1;
$pasta = 'produtos';
$mostrarHome = 0;
$FILTROSJS = '';