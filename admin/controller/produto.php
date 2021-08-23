<?php
if($s->tipoAdm>2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from Produtos where id_produto={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Produtos';
$s->titpg2 = 'Produtos';
$s->titpg3 = $rs->n?$rs->n:'Novo Produto';
$a->id = $s->id;

$P = 'upload/produtos/';
$Pt = $P.'thumb/';
$Pa = $P.'arquivos/';
 
$a->back = $s->back;