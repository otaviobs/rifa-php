<?php
//if($s->tipoAdm==3)$s->loc('admin');
//if($s->tipoAdm==2)$s->loc('admin');
if($s->id&&!($rs=$b->query("select * from blog where id={$s->id} limit 1")->fetchObject()))$s->loc($s->back);

$s->titpg = 'Blog';
$s->titpg2 = 'Blog';
$s->titpg3 = $rs->n?$rs->n:'Novo Post';

$a->id = $s->id;
$a->idc = $rs->idc;
$a->tipo = $rs->tipo;
$P = '../upload/blogs/';
$Pt = $P.'thumb/';
$a->i->i = $rs->i?$P.$rs->i:'';
$a->i->it = $rs->it?$Pt.$rs->it:'';

if($s->id)$url_seo = $s->base.'/'.$rs->t;

$a->back = $s->back;

$a->cat = array(array('-- Selecione a Categoria --',''));
$sc = $b->query("select id,h1 from cat where s order by t");
while($rc=$sc->fetchObject())$a->cat[] = array($rc->h1,$rc->id+0);