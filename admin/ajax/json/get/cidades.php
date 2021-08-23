<?
if(isset($_GET['q'])){
	$Q = strgs('q',0,0,0,0,0);

	$qe = tag($Q,1,' ');
	$qel = '%'.tag($Q,1,'%').'%';
	$qer = str_replace(' ','.*',$qe);
	$qo = buscaTrata($Q);
	$q = buscaTrata($qe,1,1);
	$q = trim(preg_replace('/ \*| de\*| em\*| no\*| na\*| para\*| a\*| e\*| com\*| -\* /','',' '.$q));

	$i = 0;
	$_t = array();
	$sql = "select c.id,c.nome n,e.uf from cidade c inner join estado e on c.estado=e.id where c.nome like '$qel' order by c.nome";
	$st = $b->query($sql);
	while($rs=$st->fetchObject()){
		$n = $rs->n;
		$uf = $rs->uf;
		$id = $rs->id;
		if($n&&$uf){
			$_t[] = $t;
			$x[$i] = array('id' => $rs->id, 'text' => $rs->n.' - '.$rs->uf);
			$i++;
		}
		//if($i===10)break;
	}
}