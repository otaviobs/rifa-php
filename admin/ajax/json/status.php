<?
if($s->adm()){
	$id = strp('id',3);
	$a = strp('s',3)?1:0;
	$pg = strp('pg');
	if($pg=='Produtos')$id_name = 'id_produto';
	elseif($pg=='Usuarios')$id_name = 'id_usuario';
	elseif($pg=='Lojas')$id_name = 'id_loja';

	if($b->exec($x->upd="update $pg set status=$a where $id_name=$id limit 1")){
		$x->ok = 1;
	}else $x->m = 'Ocorreu um erro, tente novamente!';
}else $neg = true;
?>