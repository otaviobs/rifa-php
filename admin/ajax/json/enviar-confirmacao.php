<?php
if($s->idu){
	$id = strp('id',3);

  $rs = $b->query("select * from Usuarios where id_usuario=$id and id_perfil!=4 limit 1")->fetchObject();

	if($id&&!$rs)$x->m = 'Este usuário não existe!';
	else{
		$x->up = $id?1:0;
    $link = "{$s->base}admin/confirmar-cadastro/$id";
    $send->subject = "{$s->pftit} - Confirmar Cadastro";
    $send->html = '<h1>Confirmar Cadastro</h1>Clique no link abaixo ou copie e cole na barra de endereço do navegador para confirmar o seu cadastro.<br/><br/><a href="'.$link.'">'.$link.'</a>';
    $send->secure = 'ssl';
    $send->to = array(array($rs->email,$rs->nome));
    if($x->send = $s->send($send)){
      $x->m = 'E-mail enviado com sucesso!';
      $x->ok = 1;
    }
    else $x->m = 'Erro ao enviar e-mail!';
	}
}else $neg = true;