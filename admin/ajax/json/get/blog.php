<?
if($s->adm()){
	$Q = strps('q',0,0,0,0,0);// Query passada
	$_rel = strp('rel',3)?1:0;
	$_qt = strp('qt',3);
	$_pg = strp('pg',3);
	$_ord = strps('ord',1);

	if(!$_qt)$_qt = 30;
	if($_qt>500)$_qt = 500;

	$qe = tag($Q,1,' ');// Query tag com espaços
	$qel = '%'.tag($Q,1,'%').'%';// Query tag com % para like
	$qo = buscaTrata($Q);// Query original transformada para echo
	$q = buscaTrata($qe,1,1);// Query tag com espaços e * para match against
	$q = trim(preg_replace('/ \*| de\*| em\*| no\*| na\*| para\*| a\*| e\*| com\*| -\* /','',' '.$q));


	$sql = 'blog b';
	$w = array();

	$tipo = strps('tipo');
	if($tipo)$w[] = "b.tipo='$tipo'";
	/*if($ids&&$b->query("select * from scat where id=$ids limit 1")->fetchObject())$w[] = "b.ids=$ids";
	if($idf&&$b->query("select * from fabricante where id=$idf limit 1")->fetchObject())$w[] = "b.idf=$idf";*/

	if($q)$w[] = "(b.n like '$qel'".($_rel?" or (match(b.n)against('$q' in boolean mode))":'').' )';
	$w = count($w)?'where '.implode(' and ',$w):'';
	$pgn = pgnl($x->sql_count="$sql $w",$_qt,$_pg);
	if($pgn->e)$pg = $pgn->c;

	/*$sql .= ' left join cat c on b.idc=c.id';
	$sql .= ' left join scat s on b.ids=s.id';
	$sql .= ' left join fabricante f on b.idf=f.id';*/

	$sql = 'select b.*'.
	($q&&$_rel?",(match(b.n)against('$q' in boolean mode)) rel":'').
	" from $sql $w".
	($_ord?" order by $_ord":'')." limit {$pgn->i},{$pgn->l}";

	if($st=$b->query($sql)){
		$i = 0;
		$x->ok = 1;
		$x->ps = pgnbt($pgn->a,$pgn->b,$pgn->c,7,' ','<a pgn="[!num!]">[!txt!]</a>','<a class="active" pgn="[!num!]">[!txt!]</a>','','','&laquo;','&raquo;',1);
		$x->sql = $sql;
		$x->p = $pgn;
		$x->_q = $Q;
		$x->qo = $qo;
		$x->q = $q;
		$x->qe = $qe;
		$x->qel = $qel;
		$x->r = array();
		while($rs=$st->fetchObject()){
			$rs->id += 0;
			$rs->s += 0;
			$rs->o += 0;
			$rs->dc .= '';
			$rs->da .= '';
			$rs->_dc = $rs->dc?datef($rs->dc,10):'';
			$rs->_da = $rs->da?datef($rs->da,10):'';
			$rs->t .= '';
			$rs->q += 0;
			$rs->tp = $rs->tipo=='atletas'?'Patrocinados':($rs->tipo=='novidades'?'Novidades':($rs->tipo=='receitas'?'Receitas':($rs->tipo=='treinos'?'Treinos':'SEM TIPO')));
			$rf = $b->query("select * from fotos where idp={$rs->id} and tipo='blog'")->fetchObject();
			$rpr = $b->query("select * from fotos where idp={$rs->id} and tipo='blog' and principal")->fetchObject();
			$img = 'thumb/'.($rpr->it?$rpr->it:($rf->it?$rf->it:'default.jpg'));
			$rs->i = $img&&file_exists("../upload/blogs/$img")?$img:'';
 			//$rs->cp = $rf&&($rs->tipo=='atletas'?($rs->i?($rs->it?1:0):1):1)?1:0;
			$rs->cp = $rf?1:0;
			$rs->e .= '';
			$rs->pg = $rs->tipoFoto = 'blog';
			$rs->pastaFoto = 'blogs';
			$x->r[$i++] = $rs;
		}
		$x->i = $i;
		//unset($x->sql_count,$x->sql);
	}else $x->m = 'Ocorreu um erro na busca, tente novamente!';
}else $neg = true;
?>