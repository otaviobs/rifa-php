<?php
if($s->idu){
	$id = strp('id',3);
	$b->exec("update Pedidos set dataAuditando=now() where id_pedido=$id limit 1");
}else $neg = true;