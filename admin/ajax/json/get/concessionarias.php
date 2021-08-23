<?
if(isset($_GET['q'])){
	$Q = strgs('q',0,0,0,0,0);
	$id = strg('id',3);

	$qe = tag($Q,1,' ');
	$qel = '%'.tag($Q,1,'%').'%';
	$qer = str_replace(' ','.*',$qe);
	$qo = buscaTrata($Q);
	$q = buscaTrata($qe,1,1);
	$q = trim(preg_replace('/ \*| de\*| em\*| no\*| na\*| para\*| a\*| e\*| com\*| -\* /','',' '.$q));

	$i = 0;
	$_t = array();
	$sql = "select id,nome,nf,r,i from concessionaria where (nome like '$qel' or r like '$qel' or nf like '$qel' or cnpj like '$qel') order by nf";
	$st = $b->query($sql);
	while($rs=$st->fetchObject()){
		$n = $rs->nome;
		$nf = $rs->nf;
		$t = $rs->t;
		$id = $rs->id;
		$img = 'upload/concessionarias/'.($rs->i&&$rs->i!=NULL?$rs->i:'thumb/default.jpg');
		if($nf){
			$x[$i] = array('image' => $img, 'id' => $rs->id, 'text' => $rs->nf);
			$i++;
		}
		//if($i===10)break;
	}
}