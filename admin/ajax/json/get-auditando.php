<?php
if($s->idu){
	$id = strg('id',3);
	$id_auditor = $s->idu;

	$rs = $b->query("select * from Pedidos where id_pedido=$id limit 1")->fetchObject();

	$now = date("Y-m-d H:i:s");
	$datetime1 = strtotime($rs->dataAuditando);
	$datetime2 = strtotime($now);
	$interval  = abs($datetime2 - $datetime1);
	$minutes   = round($interval / 60);
	$minutes = (int)$minutes;

	if($rs->auditando&&$minutes>=5)$x->renew = 1;
	else $x->renew = 0;

	if($rs->auditando&&$minutes>=10)$x->expired = 1;
	else $x->expired = 0;
}else $neg = true;