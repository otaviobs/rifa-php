<?php
if(!$s->id)$s->locAdmin($s->back);
if($s->id&&!($rs=$b->query("select * from formulario where id={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);


$s->titpg = 'Contatos';
$s->titpg2 = 'Contatos';
$s->titpg3 = $rs->nome;

$a->id = $s->id;
$a->back = $s->back;