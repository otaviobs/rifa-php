<?php
if($s->adm()){
	$x->id = $id = strp('id',3);
	if($rs=$b->query("select id from produto where id=$id limit 1")->fetchObject()){
		if($b->exec("insert into produto (idc,dc,o,oh,om,oro,h1,h2,sku,c,ref,d,obs,aroma,ingredientes,modo,precaucao,composicao,f,estoque,estoque_minimo,v,peso,comprimento,largura,altura,googleShopping,facebookShopping,palavras_chaves,tagt,tagd) select idc,now(),o,oh,om,oro,h1,h2,sku,c,ref,d,obs,aroma,ingredientes,modo,precaucao,composicao,f,estoque,estoque_minimo,v,peso,comprimento,largura,altura,googleShopping,facebookShopping,palavras_chaves,tagt,tagd from produto where id=$id")){
			$id_novo = $b->lastInsertId();
			$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
			shuffle($seed);
			foreach(array_rand($seed, 20) as $k)$tag .= $seed[$k];
			$b->query("update produto set s=0,n='$tag',t='$tag' where id=$id_novo limit 1");
			$s->insertSlug($id_novo,$tag,'produto');
			$x->m = 'Produto copiado com sucesso!';
			$x->ok = 1;

			$P = 'upload/produtos/';
			$Pt = $P.'thumb/';
			$tipo = 'produto';
			$fotos = $b->query("select * from fotos where idp=$id and tipo='$tipo'");
			if($fotos->rowCount())$s->cloneFotos($id,$id_novo,$P,$Pt,$tipo);
			$cat = $b->query("select * from produto_cat where idp=$id");
			if($cat->rowCount())$s->cloneCategorias($id,$id_novo);
		}else $x->m = 'Erro ao copiar o produto!';
	}else $x->m = 'Este produto não existe!';
}else $neg = true;