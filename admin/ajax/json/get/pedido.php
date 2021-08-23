<?
if($s->adm()){
	$Q = strps('q',0,0,0,0,0);// Query passada
	$rel = strp('rel',3)?1:0;
	$_qt = strp('qt',3);
	$_pg = strp('pg',3);
	$_ord = strps('ord',1);
	if(!$_qt)$_qt = 30;
	if($_qt>500)$_qt = 500;

	$qt = tag($Q,1);// Query tag
	$qe = tag($Q,1,' ');// Query tag com espaços
	$qel = '%'.tag($Q,1,'%').'%';// Query tag com % para like
	$qo = buscaTrata($Q);// Query original transformada para echo
	$qs = strs($qo);// Query original transformada escapada para SQL
	$q = buscaTrata($qe,1,1);// Query tag com espaços e * para match against
	$q = trim(preg_replace('/ \*| de\*| em\*| no\*| na\*| para\*| a\*| e\*| com\*| -\* /','',' '.$q));

	$id = str($Q,3);
	$status = strp('status',3);//STATUS PEDIDO
	//$importado = strp('importado',3);//IMPORTADO NA BL
	if(!array_key_exists($a,$s->ps->stt))$a = 0;
	if(!array_key_exists($p,$s->ps->sttPedido))$p = 0;
	if(!array_key_exists($tf,$s->ps->envio))$tf = 0;

	$sql = 'Pedidos p';
	$w = array();
	// if($id)$w[] = "p.id_pedido=$id";
	if($s->tipoAdm==4)$w[] = "p.id_usuario={$s->idu}";
	if($status!='-1')$w[] = "p.status=$status";
	if($q)$w[] = "(u.nome like '$qel' or p.numero_nota_fiscal like '$qel' or p.numero_nota_fiscal = '$qt' or p.id_pedido = '$Q')";
	$w = count($w)?'where '.implode(' and ',$w):'';

	$sql .= ' left join Usuarios u on p.id_usuario=u.id_usuario';

	// $pgn = pgnl($x->sql_count="select count(1) qt from $sql $w",$_qt,$_pg);
	$pgn = pgnl($x->sql_count="$sql $w",$_qt,$_pg);
	if($pgn->e)$_pg = $pgn->c;

	$sql = "select p.*,p.id_pedido id,u.nome from $sql $w".($_ord?" order by $_ord":'')." limit {$pgn->i},{$pgn->l}";

	if($st=$b->query($sql)){
		$i = 0;
		$x->ok = 1;
		$x->ps = pgnbt($pgn->a,$pgn->b,$pgn->c,7,' ','<a pgn="[!num!]">[!txt!]</a>','<a class="active" pgn="[!num!]">[!txt!]</a>','','','&laquo;','&raquo;',1);
		$x->sql = $sql;
		$x->p = $pgn;
		$x->_q = $Q;
		$x->qo = $id?$id:'';
		$x->r = array();
		while($rs=$st->fetchObject()){
			$rs->id += 0;
			$rs->idu += 0;
			$rs->a += 0;
			$rs->_a = $s->ps->stt[$rs->statusPagseguro];
			$rs->statusPedido = $rs->status==0?'AGUARDANDO':($rs->status==1?'APROVADO':($rs->status==2?'REPROVADO':'PENDENTE'));
			$rs->_p = $s->ps->sttPedido[$rs->statusPedido];
			//$rs->_importado = $rs->importado?'SIM':'NÃO';
			$rs->dataCadastro .= '';
			$rs->dataAlterado .= '';
			$rs->_dataCadastro = $rs->dataCadastro?datef($rs->dataCadastro,10):'';
			$rs->_dataAlterado = $rs->dataAlterado?datef($rs->dataAlterado,10):'';
			$rs->v += 0;
			$rs->_v = nreal($rs->v);
			$rs->t += 0;
			$rs->_t = nreal($rs->t);
			$rs->i += 0;
			$rs->nome .= '';
			$x->r[$i++] = $rs;
		}
		$x->i = $i;
		//unset($x->sql_count,$x->sql);
	}else $x->m = 'Ocorreu um erro na busca, tente novamente!';
}else $neg = true;


?>