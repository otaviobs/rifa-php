<?php
if($s->idc)$s->loc('.');

if($s->id){
	$rs = $b->query("select * from Usuarios where id_usuario='{$s->id}' and id_perfil=4 limit 1")->fetchObject();
	if(!$rs||!$rs->codigo)$s->loc('esqueci');
}