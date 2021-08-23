<?php
// if($s->tipoAdm==2)$s->loc('admin');
if(!$s->id)$s->loc('vendedores');
if($s->id&&!($rs=$b->query("select *  from Usuarios where id_usuario={$s->id} and id_perfil=4 limit 1")->fetchObject())){
	$s->loc($s->back);
}

$loja = $b->query("select nome from Lojas where cnpj='{$rs->cnpj}' limit 1")->fetchObject();

$s->titpg = 'Vendedores';
$s->titpg2 = 'Vendedor';

$a->back = $s->back;