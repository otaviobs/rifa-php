<?
if($s->adm()){
	$id = strp('id',3);
	$S = strp('s',3)?1:0;
	$h1 = strps('h1');
	$t = tag($h1,1);
	if($t)$checkSlug = $s->checkSlug($id,$t);
	$page = 'termos';

	$d = strps('d');

	$tagt = strps('tagt')?strps('tagt'):$h1;
	$tagd = strps('tagd')?strps('tagd'):$d;

	$rs = $b->query("select id from termos where id=$id")->fetchObject();

	if($id&&!$b->query("select id from termos where id=$id limit 1")->fetchObject())$x->m = 'Esta termo não existe!';
	elseif(!$h1)$x->m = 'Digite o título do termo!';
	elseif($checkSlug=='indisponivel')$x->m = 'Este título já está sendo utilizado, por favor altere o título!';
	elseif(!$d)$x->m = 'Digite a descrição do termo!';
	else{
		$x->up = $id?1:0;
		if(!$id&&$b->exec("insert into termos (dc)values(now())"))$id = $b->lastInsertId();
		if($b->exec("update termos set s=$S,h1='$h1',t='$t',d='$d',tagd='$tagd',tagt='$tagt' where id=$id limit 1")){
			if($x->up){
				$b->exec("update termos set da=now() where id=$id limit 1");
				$s->updateSlug($id,$t,$page);
			}else $s->insertSlug($id,$t,$page);
			$x->ok = 1;
			$x->m = 'Termo '.($x->up?'alterado':'cadastrado').' com sucesso!';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar o termo!';
	}
}else $neg = true;