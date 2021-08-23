<?php
if($s->idu){
	$id = strp('id',3);
	$id_auditor = $s->idu;
	$status = strps('status',3);
	$comentario = strps('comentario');

	$rs = $b->query("select * from Pedidos where id_pedido=$id limit 1")->fetchObject();

	$getCliente = $b->query("select email from Usuarios where id_usuario={$rs->id_usuario} limit 1")->fetchObject();

	if($id&&!$rs)$x->m = 'Este pedido não existe!';
	elseif($rs->status==2)$x->m = 'O pedido não pode mais ser alterado!';
	elseif(!$status)$x->m = 'Selecione o status!';
	elseif($status>3)$x->m = 'Status inválido!';
	elseif(($status==2||$status==3)&&!$comentario)$x->m = 'Digite o comentário!';
	else{
		$statusTitle = $status==0?'AGUARDANDO':($status==1?'APROVADO':($status==2?'REPROVADO':'PENDENTE'));
		$b->exec("insert into DetalhesPedido set
			dataCadastro=now(),id_pedido=$id,id_usuario='$id_auditor',status=$status,comentario='$comentario'
		");
		$b->exec("update Pedidos set id_auditor='$id_auditor',auditando=0,dataAuditando=NULL,dataAlterado=now(),status=$status
		where id_pedido=$id limit 1");
		$link = "{$s->base}alterar-pedido/$id";
		$send->subject = "Pedido Alterado";
		$send->html = '
			<h1>Pedido nº '.$id.' Alterado</h1>
			<strong>STATUS:</strong> '.$statusTitle.'<br>
			<strong>Comentário: </strong> '.$comentario.'<br><br>
			Clique no link abaixo ou copie e cole na barra de endereço do navegador para editar o pedido.<br/><br/><a href="'.$link.'">'.$link.'</a>';
		$send->secure = 'ssl';
		$send->to = $getCliente->email;
		$x->send = $s->send($send);
		$x->ok = 1;
		$x->m = 'Status alterado com sucesso!';
	}
}else $neg = true;