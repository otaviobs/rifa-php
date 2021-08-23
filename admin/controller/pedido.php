<?php
// if($s->tipoAdm==2)$s->loc('admin');
if($s->id&&!($rs=$b->query("select p.*,u.nome,u.cnpj,u.email,u.telefone from Pedidos p
left join Usuarios u on p.id_usuario=u.id_usuario
where p.id_pedido={$s->id} limit 1")->fetchObject()))$s->loc($s->back);

$s->titpg = 'Pedidos';
$s->titpg2 = 'Pedido';

if($s->id){
	$a->id = $s->id;
	$a->status = $rs->status+0;
	$a->dataCadastro = $rs->dataCadastro?datef($rs->dataCadastro,9):'';
	$a->dataAlterado = $rs->dataAlterado?datef($rs->dataAlterado,9):'';
	$a->dataEmissao = $rs->dataEmissao?datef($rs->dataEmissao,9):'';
	$loja = $b->query("select nome from Lojas where cnpj='{$rs->cnpj}' limit 1")->fetchObject();
	
	$now = date("Y-m-d H:i:s");
	$datetime1 = strtotime($rs->dataAuditando);
	$datetime2 = strtotime($now);
	$interval  = abs($datetime2 - $datetime1);
	$minutes   = round($interval / 60);
	$minutes   = (int)$minutes;

	if(!$rs->auditando||($rs->auditando&&$minutes>=10)) {
		$b->query("update Pedidos set auditando={$s->idu},dataAuditando=now() where id_pedido={$s->id} limit 1");
	}
}

$a->back = $s->back;