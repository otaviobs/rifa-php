<?php
if($s->idc){
	$id = strp('id',3);
	$id_usuario = $s->idc;
	$numero_nota_fiscal = strtoupper(strps('numero_nota_fiscal'));
	$t = tag($numero_nota_fiscal, 1);
	$serie_nota_fiscal = strtoupper(strps('serie_nota_fiscal'));
	$dataEmissao = strps('dataEmissao');
	$nota_fiscal = $s->getfile(strp('nota_fiscal',3));
	$N = 0;
	$P = 'upload/notas/';
	$Pt = $P.'thumb/';
	$NOTA_FISCAL = 'nota_fiscal';
	$D = '';

	$quantidades = strps('quantidade');
	$valores = strps('valor');
	$temProduto = 0;

	if($_dataEmissao=preg_match($dataRE,$dataEmissao,$_m))$dataEmissao = "{$_m[3]}-{$_m[2]}-{$_m[1]}";

	foreach($quantidades as $id_produto => $quantidade) {
		$valor = $valores[$id_produto];
		if($id_produto&&$quantidade&&$valor)$temProduto++;
		$pontosProduto = $b->query("select quantidade_pontos from Produtos where id_produto=$id_produto limit 1")->fetchobject();
		$pontos += $quantidade * $pontosProduto->quantidade_pontos;
	}		

	if($nota_fiscal&&$nota_fiscal->s)$fileSize = $nota_fiscal->s / 1000;

	$notaExistente = $b->query("select id_pedido from Pedidos where
	id_usuario={$s->idc} and numero_nota_fiscal='$numero_nota_fiscal' and serie_nota_fiscal='$serie_nota_fiscal'
	and status!=2 limit 1");

	if(!($rs=$b->query("select nota_fiscal from Pedidos where id_pedido=$id limit 1")->fetchObject())&&$id&&++$N)$x->m = 'Este Pedido não existe!';
	elseif(!$numero_nota_fiscal)$x->m = 'Digite o número da nota fiscal!';
	elseif(!$serie_nota_fiscal)$x->m = 'Digite o número de série da nota fiscal!';
	elseif($notaExistente->rowCount())$x->m = 'Você já possui uma nota com esses dados em andamento!';
	elseif(!$dataEmissao)$x->m = 'Digite a data de emissão!';
	elseif(!$_dataEmissao)$x->m = 'Data de emissão inválida!';
	elseif($fileSize>5000)$x->m = 'O tamanho máximo da imagem é 5MB!';
	elseif(!$id&&!$nota_fiscal)$x->m = 'Escolha a imagem da nota!';
	elseif($nota_fiscal&&$nota_fiscal->e&&++$N)$x->m = 'Ocorreu um erro ao fazer upload da imagem!';
	elseif($nota_fiscal&&$nota_fiscal->ex!='jpg'&&$nota_fiscal->ex!='jpeg'&&$nota_fiscal->ex!='png'&&++$N)$x->m = 'A imagem deve ser (jpg, ou png)!';
	elseif(!$temProduto)$x->m = 'Adicione ao menos um produto!';
	else{
		$x->up = $id?1:0;
		$C = $t.'-'.date("his").'.'.$nota_fiscal->ex;
		if($nota_fiscal&&$nota_fiscal=$s->movefile($nota_fiscal->id,$P.$C)){
			$x->i->nota_fiscal = $P.$C;
			$NOTA_FISCAL = "'$C'";
			// $D = $rs->i;
		}else{
			$x->m = 'Pedido não cadastrado! Não foi possível fazer o upload da nota fiscal. Se o erro persistir entre em contato.';
		}
		if($b->exec("insert into Pedidos set dataCadastro=now(),
		id_usuario=$id_usuario,dataEmissao='$dataEmissao',numero_nota_fiscal='$numero_nota_fiscal',
		serie_nota_fiscal='$serie_nota_fiscal',nota_fiscal=$NOTA_FISCAL,pontos='$pontos',quantidade_produto=$temProduto")){
			$id = $b->lastInsertId();
			foreach($quantidades as $id_produto => $quantidade) {
				$valor = $valores[$id_produto];
				$total = $valor * $quantidade;
				if($id_produto&&$quantidade&&$valor){
					$b->exec("insert into PedidoProdutos set
					id_pedido=$id,dataCadastro=now(),id_produto='$id_produto',
					quantidade='$quantidade',valor='$valor',total='$total'
					");
				}
			}
			if($D)@unlink($P.$D);
			$x->ok = 1;
			$x->m = 'Pedido '.($x->up?'alterado':'cadastrado').' com sucesso!';
			// if(!$x->up)$x->l = 'pedidos';
		}else $x->m = $x->up?'Nenhum campo para alterar!':'Erro ao cadastar o Pedido!';
	}
	if($i&&$N&&++$x->noi->i)$s->delfile($i->id);
}else $neg = true;