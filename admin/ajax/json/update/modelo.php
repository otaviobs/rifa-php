<?
if($s->adm()){
	$id = strp('id',3);
	$idc = strp('idc',3);
	$S = strp('s',3)?1:0;
	$h1 = strps('h1');
	$n = strps('n');
	$t = tag($n,1);
	//if($t)$checkSlug = $s->checkSlug($id,$t);
	$d = strps('d');
//SEO
	$tagd = strps('tagd');
	$tagt = strps('tagt')?strps('tagt'):$h1;
//SEO

	$rs = $b->query("select id from modelo where id=$id")->fetchObject();

	if($id&&!$b->query("select id from modelo where id=$id limit 1")->fetchObject())$x->m = 'Este modelo não existe!';
	elseif(!$h1)$x->m = 'Digite o h1 do modelo!';
	elseif(!$n)$x->m = 'Digite a slug do modelo!';
	elseif($b->query("select id from modelo where id!=$id and t='$t' limit 1")->fetchObject())$x->m = 'Este modelo já está cadastrada!';
	//elseif($checkSlug=='indisponivel')$x->m = 'Esta slug já está sendo utilizada, por favor altere a slug!';
	//elseif($idc&&$idc==$id)$x->m = 'A modelo pai não pode ser a mesma modelo!';
	else{
		$x->up = $id?1:0;
		if(!$id&&$b->exec("insert into modelo (dc) values (now())"))$id = $b->lastInsertId();
		if($b->exec("update modelo set s=$S,h1='$h1',n='$n',t='$t',d='$d',tagd='$tagd',tagt='$tagt' where id=$id limit 1")){
			$s->siteMap('modelo-sitemap','modelo');
			if($x->up)$b->exec("update modelo set da=now() where id=$id limit 1");
			$x->ok = 1;
			$x->m = 'Modelo '.($x->up?'alterado':'cadastrado').' com sucesso!';
			if(!$x->up)$x->l = 'admin/modelo';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar o modelo!';
	}
}else $neg = true;
?>