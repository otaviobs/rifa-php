<?
if($s->adm()){
	$id = strp('id',3);
	$idc = strp('idc',3);
	$S = strp('s',3)?1:0;
	$h1 = strps('h1');
	$n = strps('n');
	$t = tag($h1,1);
	//if($t)$checkSlug = $s->checkSlug($id,$t);
	$d = strps('d');
	$i = $s->getfile(strp('i',3));
	$N = 0;
	$P = '../upload/categorias/';
	$I = 'i';
	$D = '';
	$R = strp('ri',3)?1:0;

	$tagt = strps('tagt')?strps('tagt'):$h1;
	$tagd = strps('tagd')?strps('tagd'):$d;

	$rs = $b->query("select id from cat where id=$id")->fetchObject();

	$page = 'categoria';
	$siteMap = 'categoria-sitemap';

	if($id&&!$b->query("select id from cat where id=$id limit 1")->fetchObject())$x->m = 'Esta categoria não existe!';
	elseif(!$h1)$x->m = 'Digite o título da categoria!';
	elseif($b->query("select id from cat where id!=$id and t='$t' limit 1")->fetchObject())$x->m = 'Esta categoria já está cadastrada!';
	// elseif(!$id_icone)$x->m = 'Selecione o ícone!';
	// elseif(!$id&&!$i)$x->m = 'Escolha a imagem!';
	// elseif($i&&$i->e&&++$N)$x->m = 'Ocorreu um erro ao fazer upload da imagem!';
	// elseif($i&&$i->w<25&&++$N)$x->m = 'A largura mínima da imagem deve ser 25px!';
	// elseif($i&&$i->h<25&&++$N)$x->m = 'A altura mínima da imagem deve ser 25px!';
	// elseif($i&&$i->w!=$i->h&&++$N)$x->m = 'A imagem deve ser quadrada!';
	else{
		$x->up = $id?1:0;
		$C = $t.'-'.date("his").'.'.$i->ex;
		// if($i&&$i=$s->movefile($i->id,$P.$C)){
		// 	$x->i->i = $P.$C;
		// 	$I = "'$C'";
		// 	$D = $rs->i;
		// 	if($i->w>25&&++$N)$I = Img::resize($i->nf,$P.$C,25,25)?"'$C'":'null';
		// }
		if(!$id&&$b->exec("insert into cat (dc)values(now())"))$id = $b->lastInsertId();
		if($b->exec("update cat set s=$S,h1='$h1',t='$t',tagd='$tagd',tagt='$tagt' where id=$id limit 1")){
			if($x->up)$b->exec("update cat set da=now() where id=$id limit 1");
			$s->siteMap($siteMap,$page);
			$x->ok = 1;
			$x->m = 'Categoria '.($x->up?'alterada':'cadastrada').' com sucesso!';
			if(!$x->up)$x->l = 'categorias/';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar a categoria!';
	}
}else $neg = true;