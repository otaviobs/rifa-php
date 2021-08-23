<?php
if($s->tipoAdm==3||$s->tipoAdm==2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from grupo where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Grupos';
$s->titpg2 = 'Grupos';
$s->titpg3 = $rs->n?$rs->n:'Novo Grupo';

$a->id = $s->id;