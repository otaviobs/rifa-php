<?php
if($s->adm()){
	$a = strp('a',3)?1:0;
	$a = 1;
	$d = strp('d',3)?1:0;
	$qt = 0;
	if($a||$d){
		$w = array();
		if($a^$d)$w[] = "s=$a";
		$w = count($w)?'where '.implode(' and ',$w):'';
		$st = $b->query("select l.cnpj as CNPJ_Loja,
		l.nome as Nome_Loja ,
			u.id_usuario as Codigo_Vendedor,
			u.nome as Nome_Vendedor,
			(CASE WHEN u.status = 1 THEN 'Elegivel'
						WHEN u.status = 1 THEN 'Confirmado'
						WHEN u.banido = 1 THEN 'Banido'
						WHEN u.id_usuario is not null THEN 'Cadastrado' ELSE NULL END) as Status_Vendedor,
			p.id_pedido as Numero_Pedido,
			p.dataCadastro as Data_Pedido, 
		(CASE WHEN p.status = 0 THEN 'Aguardando'
						WHEN p.status = 1 THEN 'Aprovado'
						WHEN p.status = 2 THEN 'Reprovado'
						WHEN p.status = 3 THEN 'Pendente' ELSE NULL END) as Status_Pedido,
		p.dataAlterado as Data_Ultima_Alteracao,
			pt.id_produto as Codigo_Produto,
			pt.nome as Nome_Produto,
			pp.quantidade as Quantidade,
			pp.valor as Valor_Unitario,
			pt.quantidade_pontos as Pontos
 from Lojas as l left join Usuarios as u on l.cnpj = u.cnpj
								 left join Pedidos as p on u.id_usuario = p.id_usuario
								 left join PedidoProdutos pp on pp.id_pedido = p.id_pedido
								 left join Produtos as pt on pp.id_produto = pt.id_produto           
UNION                   
select l.cnpj,
		l.nome,
			u.id_usuario,
			u.nome,
			(CASE WHEN u.status = 1 THEN 'Elegivel'
						WHEN u.status = 1 THEN 'Confirmado'
						WHEN u.banido = 1 THEN 'Banido'
						WHEN u.id_usuario is not null THEN 'Cadastrado' ELSE NULL END) as Status_Vendedor,
	 NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
from Usuarios as u left join Lojas as l on u.cnpj = l.cnpj
WHERE u.id_perfil = 4");
		if($st->rowCount()){
			$x->name = 'vendedores-'.date('his').'.csv';
			header( 'Content-type: application/csv' );   
			header( 'Content-Disposition: attachment; filename='.$x->name);   
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Pragma: no-cache');

			$stmt = $b->prepare("select l.cnpj as CNPJ_Loja,
			l.nome as Nome_Loja ,
				u.id_usuario as Codigo_Vendedor,
				u.nome as Nome_Vendedor,
				(CASE WHEN u.status = 1 THEN 'Elegivel'
							WHEN u.status = 1 THEN 'Confirmado'
							WHEN u.banido = 1 THEN 'Banido'
							WHEN u.id_usuario is not null THEN 'Cadastrado' ELSE NULL END) as Status_Vendedor,
				p.id_pedido as Numero_Pedido,
				p.dataCadastro as Data_Pedido, 
			(CASE WHEN p.status = 0 THEN 'Aguardando'
							WHEN p.status = 1 THEN 'Aprovado'
							WHEN p.status = 2 THEN 'Reprovado'
							WHEN p.status = 3 THEN 'Pendente' ELSE NULL END) as Status_Pedido,
			p.dataAlterado as Data_Ultima_Alteracao,
				pt.id_produto as Codigo_Produto,
				pt.nome as Nome_Produto,
				pp.quantidade as Quantidade,
				pp.valor as Valor_Unitario,
				pt.quantidade_pontos as Pontos
	 from Lojas as l left join Usuarios as u on l.cnpj = u.cnpj
									 left join Pedidos as p on u.id_usuario = p.id_usuario
									 left join PedidoProdutos pp on pp.id_pedido = p.id_pedido
									 left join Produtos as pt on pp.id_produto = pt.id_produto           
 UNION                   
 select l.cnpj,
			l.nome,
				u.id_usuario,
				u.nome,
				(CASE WHEN u.status = 1 THEN 'Elegivel'
							WHEN u.status = 1 THEN 'Confirmado'
							WHEN u.banido = 1 THEN 'Banido'
							WHEN u.id_usuario is not null THEN 'Cadastrado' ELSE NULL END) as Status_Vendedor,
		 NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
 from Usuarios as u left join Lojas as l on u.cnpj = l.cnpj
 WHERE u.id_perfil = 4");
			$stmt->execute();
			$results = $stmt->fetchAll( PDO::FETCH_ASSOC );

			$out = fopen( 'php://output', 'w' );
			fputs($out, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
			$headings = array(
				'CNPJ',
				'Nome da Loja',
				'Código do Vendedor',
				'Nome do Vendedor',
				'Status do Vendedor',
				'Codigo do Pedido',
				'Data Pedido',
				'Status Pedido',
				'Data Última Alteração',
				'Código do Produto',
				'Nome do Produto',
				'Quantidade',
				'Valor Unitário',
				'Pontos por Unidade'
			);
			fputcsv($out, array_values($headings), ';', ' ');
			foreach ( $results as $result ) {
				fputcsv($out, array_values($result), ';', ' ');
			}
			fclose( $out );
		}
	}
	if(!$qt)$x->m = 'Nenhum cadastro!';
}else $neg = true;