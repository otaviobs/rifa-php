<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$rs = $b->query("select id,h1 from produto where id='{$s->id}' limit 1")->fetchObject();

$s->titpg = 'Recortar '.$rs->h1;
$s->titpg3 = 'Recortar Produtos';
$SPG = $s->spg;
$s->spg = 'crops';
$pasta = 'produtos';
$largura_interno = 526;
$altura_interno = 526;
$largura_thumb = 320;
$altura_thumb = 320;
$largura_carrinho = 0;
$altura_carrinho = 0;
$largura_home = 0;
$altura_home = 0;
$largura_miniatura = 0;
$altura_miniatura = 0;
$largura_relacionado = 0;
$altura_relacionado = 0;
$largura_ultimos = 0;
$altura_ultimos = 0;

$sf = $b->query("select * from fotos where idp='{$s->id}' and tipo='produto'");