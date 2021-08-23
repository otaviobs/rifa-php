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
		$st = $b->query("select id_pedido from Pedidos group by id_pedido order by id_pedido");
		if($st->rowCount()){
			$x->name = 'pedidos-'.date('his').'.csv';
			header( 'Content-type: application/csv' );   
			header( 'Content-Disposition: attachment; filename='.$x->name);   
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Pragma: no-cache');

			$stmt = $b->prepare("select id_pedido,dataCadastro,dataAlterado,
			(CASE WHEN status = 0 THEN 'Aguardando'
			WHEN status = 1 THEN 'Aprovado'
			WHEN status = 2 THEN 'Reprovado' ELSE NULL END) as status,
			numero_nota_fiscal,serie_nota_fiscal,pontos
			from Pedidos
			group by id_pedido order by id_pedido");
			$stmt->execute();
			$results = $stmt->fetchAll( PDO::FETCH_ASSOC );

			$out = fopen( 'php://output', 'w' );
			fputs($out, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
			$headings = array('ID Pedido', 'Data do Pedido', 'Data Alteração do Pedido', 'Status', 'Número da NF', 'Série da NF', 'Pontos');
			fputcsv($out, array_values($headings), ';', ' ');
			foreach ( $results as $result ) {
				fputcsv($out, array_values($result), ';', ' ');
			}
			fclose( $out );
		}
	}
	if(!$qt)$x->m = 'Nenhum cadastro!';
}else $neg = true;