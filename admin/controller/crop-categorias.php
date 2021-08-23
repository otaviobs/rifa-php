<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$rs = $b->query("select id,n,i,it,ih,ith from cat where id='{$s->id}' limit 1")->fetchObject();

$s->titpg = 'Recortar '.$rs->n;
$s->titpg3 = 'Recortar Categorias';
