<?
if($s->adm()){
	$id = strp('id',3);
	$idc = strp('idc',3);
	$S = strp('s',3)?1:0;
	$h1 = strps('h1');
	$n = strps('n');
	$t = tag($n,1);
	$d = strps('d');

//SEO
	$tagd = strps('tagd');
	$tagt = strps('tagt')?strps('tagt'):$n;
//SEO

	$rs = $b->query("select id,i,it from cat where id=$id")->fetchObject();

	if($id&&!$b->query("select id from cat where id=$id limit 1")->fetchObject())$x->m = 'Esta Categoria não existe!';
	elseif(!$h1)$x->m = 'Digite o h1 da página!';
	elseif(!$n)$x->m = 'Digite o nome da categoria!';
	elseif($idc&&$idc==$id)$x->m = 'A categoria pai não pode ser a mesma categoria!';
	//elseif(!$d)$x->m = 'Digite a descrição da categoria!';
	elseif($b->query("select id from cat where id!=$id and t='$t' limit 1")->fetchObject())$x->m = 'Esta Categoria já está cadastrada!';
	else{
		$x->up = $id?1:0;
		if(!$id&&$b->exec("insert into cat (dc)values(now())"))$id = $b->lastInsertId();
		if($b->exec("update cat set s=$S,idp=$idc,h1='$h1',n='$n',t='$t',d='$d',tagd='$tagd',tagt='$tagt' where id=$id limit 1")){
			if($x->up)$b->exec("update cat set da=now() where id=$id limit 1");
			$x->ok = 1;
			$x->m = 'Categoria '.($x->up?'alterada':'cadastrada').' com sucesso!';
			if(!$x->up)$x->l = 'admin/taxonomy';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar a categoria!';
	}
}else $neg = true;
?>