<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Ordenar Produtos do Rodapé';
$s->titpg2 = 'Ordenar Produtos do Rodapé';
$SPG = $s->spg;
$s->spg = 'order';
$order = 'oro';
$pgAjax = 'ordenar-produto-rodape';
$temImg = 1;
$pasta = 'produtos';
$mostrarHome = 0;
$FILTROSJS = '';