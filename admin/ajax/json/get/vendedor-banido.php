<?
if($s->adm()||$s->ven()||$s->ger()){
	$Q = strps('q',0,0,0,0,0);// Query passada
	if(preg_match($cpfRE,$Q,$_m))$Q = "{$_m[1]}.{$_m[2]}.{$_m[3]}-{$_m[4]}";
	if(preg_match($cnpjRE,$Q,$_m))$Q = "{$_m[1]}.{$_m[2]}.{$_m[3]}/{$_m[4]}-{$_m[5]}";

	$rel = strp('rel',3)?1:0;
	$_qt = strp('qt',3);
	$_pg = strp('pg',3);
	$_ord = strps('ord',1);
	if(!$qt)$qt = 30;
	if($qt>500)$qt = 500;

	$qt = tag($Q,1);// Query tag
	$qe = tag($Q,1,' ');// Query tag com espaços
	$qel = '%'.tag($Q,1,'%').'%';// Query tag com % para like
	$qo = buscaTrata($Q);// Query original transformada para echo
	$qs = strs($qo);// Query original transformada escapada para SQL
	$q = buscaTrata($qe,1,1);// Query tag com espaços e * para match against
	$q = trim(preg_replace('/ \*| de\*| em\*| no\*| na\*| para\*| a\*| e\*| com\*| -\* /','',' '.$q));

	$sql = 'Usuarios u';
	$w = array("u.banido=1 and u.id_perfil=4");
	$id_perfil = strp('id_perfil',3);
	if($q)$w[] = "(
		u.nome like '$qel' or
		u.email like '$qel'";
	if($id_perfil)$w[] = "u.id_perfil=$id_perfil";
	$w = count($w)?'where '.implode(' and ',$w):'';

	$pgn = pgnl($x->sql_count="select count(1) qt from $sql $w",$_qt,$_pg);
	if($pgn->e)$pg = $pgn->b;


	$sql = "select u.*,u.id_usuario as id from $sql $w group by u.id_usuario".($_ord?" order by $_ord":'')." limit {$pgn->i},{$pgn->l}";

	if($st=$b->query($x->sql=$sql)){
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
		$tip = array('','Professor','Aluno');
		//$arq = array('Não','Sim');
		$sex = array('','M','F');
		while($rs=$st->fetchObject()){
			$rs->id += 0;
			$rs->s += $rs->status;
			$rs->t += 0;
			$rs->_t = $tip[$rs->t];
			$rs->qt += 0;
			$rs->dataCadastro .= '';
			$rs->dataAlterado .= '';
			$rs->_dataCadastro = $rs->dataCadastro?datef($rs->dataCadastro,10):'';
			$rs->_dataAlterado = $rs->dataAlterado?datef($rs->dataAlterado,10):'';
			$rs->n .= '';
			$rs->tn .= '';
			$rs->email .= '';
			$rs->u .= '';
			$img = $rs->i;
			$rs->i = $img&&file_exists("upload/users/$img")?$img:'';
 			$rs->cp = $rs->it?1:0;
			unset($rs->senha,$rs->cod);
			$rs->pg = $rs->tipoFoto = 'Usuarios';
			$rs->pastaFoto = 'users';
			$x->r[$i++] = $rs;
		}
		$x->i = $i;
		//unset($x->sql_count,$x->sql);
	}else $x->m = 'Ocorreu um erro na busca, tente novamente!';
}else $neg = true;