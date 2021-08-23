<?php
if($s->tipoAdm>2)$s->locAdmin('.');
if($s->id&&!($rs=$b->query("select * from Usuarios where id_usuario={$s->id} limit 1")->fetchObject()))$s->locAdmin($s->back);

$s->titpg = 'Usuário';
$s->titpg2 = 'Usuário';
$s->titpg3 = $rs->n?$rs->n:'Novo Usuário';

$s->id==1&&$s->idu!=1?$s->locAdmin('users'):'';

$a->id = $s->id;
$P = 'upload/users/';
$Pt = $P.'thumb/';
$a->i->i = $rs->i?$P.$rs->i:'';
$a->id_perfil = $rs->id_perfil+0;



$a->perfil = array(array('-- Selecione o Perfil --',0));
$sc = $b->query("select id_perfil as id,nome as h1 from PerfilUsuarios where id_perfil=2 or id_perfil=3");
while($rc=$sc->fetchObject())$a->perfil[] = array($rc->h1,$rc->id+0);

$a->back = $s->back;