<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$rs = $b->query("select id,h1 from blog where id='{$s->id}' limit 1")->fetchObject();

$s->titpg = 'Recortar '.$rs->h1;
$s->titpg3 = 'Recortar Blogs';
$SPG = $s->spg;
$s->spg = 'crops';
$pasta = 'blogs';
$largura_interno = 670;
$altura_interno = 317;
$largura_thumb = 670;
$altura_thumb = 317;
$largura_carrinho = 0;
$altura_carrinho = 0;
$largura_home = 0;
$altura_home = 0;
$largura_miniatura = 0;
$altura_miniatura = 0;
$largura_relacionado = 0;
$altura_relacionado = 0;
$largura_ultimos = 96;
$altura_ultimos = 45;

$sf = $b->query("select * from fotos where idp='{$s->id}' and tipo='blog'");