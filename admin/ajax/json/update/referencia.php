<?
if($s->adm()){
	$id = strp('id',3);
	$S = strp('s',3)?1:0;
	$d = strps('d');

	$rs = $b->query("select id from referencia where id=$id")->fetchObject();

	if($id&&!$b->query("select id from referencia where id=$id limit 1")->fetchObject())$x->m = 'Este texto de referência não existe!';
	elseif(!$d)$x->m = 'Digite a descrição!';
	else{
		$x->up = $id?1:0;
		if($b->exec("update referencia set s=$S,d='$d' where id=$id limit 1")){
			if($x->up)$b->exec("update referencia set da=now() where id=$id limit 1");
			$x->ok = 1;
			$x->m = 'Texto de referência '.($x->up?'alterado':'cadastrado').' com sucesso!';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar o texto de referência!';
	}
}else $neg = true;
?>