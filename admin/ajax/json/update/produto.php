<?php
if($s->idu){
	$id = strp('id',3);
	$nome = strps('nome');
	$sku = strps('sku');
	$quantidade_pontos = strps('quantidade_pontos');

	$rs = $b->query("select * from Produtos where id_produto=$id limit 1")->fetchObject();

	if($id&&!$rs)$x->m = 'Este produto não existe!';
	elseif(!$sku)$x->m = 'Digite o sku!';
	elseif($b->query("select id_produto from Produtos where id_produto!=$id and sku='$sku' limit 1")->fetchObject())$x->m = 'Este sku já está cadastrado!';
	elseif(!$nome)$x->m = 'Digite o nome do produto!';
	elseif(strlen($nome) > 100)$x->m = 'O nome do produto não pode ter mais do que 100 caracteres!';
	elseif(!$quantidade_pontos)$x->m = 'Digite a quantidade de pontos!';
	elseif($quantidade_pontos > 100000)$x->m = 'A quantidade de pontos não pode ser maior que 100000!';
	else{
		$x->up = $id?1:0;
		if(!$id&&$b->exec("insert into Produtos (id_usuario,dataCadastro)values('{$s->idu}',now())"))$id = $b->lastInsertId();
		if($rs->nome==$nome&&$rs->sku==$sku&&$rs->quantidade_pontos==$quantidade_pontos) {
			$update = "update Produtos set nome='$nome',sku='$sku',quantidade_pontos='$quantidade_pontos'
			where id_produto=$id limit 1";
		} else {
			$update = "update Produtos set nome='$nome',sku='$sku',quantidade_pontos='$quantidade_pontos',dataAlterado=now(),id_usuario_alterou='{$s->idu}'
			where id_produto=$id limit 1";
		}
		if($b->exec($update)){
			$x->ok = 1;
			$x->m = 'Produto '.($x->up?'alterado':'cadastrado').' com sucesso!';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar o produto!';
	}
}else $neg = true;