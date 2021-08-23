<?
$id = strg('id',3);
if($id){
	$rs = $b->query("select v,nutricional from produto where id=$id limit 1")->fetchObject();
	if($rs){
		$x->preco = nreal($rs->v);
		$x->nutricional = $rs->nutricional;
	}
}