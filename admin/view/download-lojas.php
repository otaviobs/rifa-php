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
		$st = $b->query("select nome from Lojas group by id_loja order by id_loja");
		if($st->rowCount()){
			$x->name = 'lojas-'.date('his').'.csv';
			header( 'Content-type: application/csv' );   
			header( 'Content-Disposition: attachment; filename='.$x->name);   
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Pragma: no-cache');

			$stmt = $b->prepare("select dataCadastro,cnpj,nome,nomeResponsavel,email,telefone,cidade,estado,cep,rua,bairro,numero from Lojas group by id_loja order by id_loja");
			$stmt->execute();
			$results = $stmt->fetchAll( PDO::FETCH_ASSOC );

			$out = fopen( 'php://output', 'w' );
			fputs($out, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
			$headings = array('Data de Cadastro', 'CNPJ', 'Nome', 'Nome do Responsável', 'E-mail', 'Telefone', 'Cidade', 'Estado', 'CEP', 'Rua', 'Bairro', 'Número');
			fputcsv($out, array_values($headings), ';', ' ');
			foreach ( $results as $result ) {
				fputcsv($out, array_values($result), ';', ' ');
			}
			fclose( $out );
		}
	}
	if(!$qt)$x->m = 'Nenhum cadastro!';
}else $neg = true;