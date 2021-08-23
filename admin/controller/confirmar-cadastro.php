<?php
if($s->adm())$s->locAdmin('.');

if($s->id){
	$rs = $b->query("select * from Usuarios where id_usuario='{$s->id}' limit 1")->fetchObject();
	if(!$rs||!$rs->codigo)$s->locAdmin('esqueci');
}