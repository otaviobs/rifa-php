<?php
if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from fotos where id={$s->id} limit 1")->fetchObject()))$s->locAdmin('.');

$s->titpg = 'Title e Alt da Foto';
$s->titpg2 = 'Title e Alt da Foto';

$a->id = $s->id;
$a->back = 'admin/'.$rs->tipo.'-foto/'.$rs->idp;