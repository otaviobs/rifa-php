<?php
if($s->id&&!($rs=$b->query("select * from Lojas where id_loja={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Lojas';
$s->titpg2 = 'Lojas';
$s->titpg3 = $rs->n?$rs->n:'Nova Loja';
$a->id = $s->id;
$a->estado = $rs->estado;

$a->back = $s->back;