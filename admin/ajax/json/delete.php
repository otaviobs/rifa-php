<?
if($s->adm()){
	$id = strp('id',3);
	$pg = strp('pg');
	$tipo = strp('tipoFoto');
	$pasta = strp('pastaFoto');
	$P = 'upload/'.$pasta.'/';
	$Pt = $P.'thumb/';
	if($pg=='user'&&($id==1||$id==2))$x->m = 'Esse usuário não pode ser excluído!';
	else{
		if($rs=$b->query($x->sel="select * from $pg where id_usuario=$id limit 1")->fetchObject()){
			if($rs->banido==1)$update = "update $pg set banido=0 where id_usuario=$id limit 1";
			else $update = "update $pg set banido=1 where id_usuario=$id limit 1";
			if($b->exec($update)){
				$x->m = 'Banido com sucesso!';
				$x->ok = 1;
			}else $x->m = 'Erro ao banir item!';
		}else $x->m = 'Este item não existe!';
	}
}else $neg = true;