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
		$st = $b->query("select nome from Usuarios where id_perfil=4 group by id_usuario order by id_usuario");
		if($st->rowCount()){
			$x->name = 'vendedores-'.date('his').'.csv';
			header( 'Content-type: application/csv' );   
			header( 'Content-Disposition: attachment; filename='.$x->name);   
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Pragma: no-cache');

			$stmt = $b->prepare("
				select u.cpf,u.dataCadastro,
				(CASE WHEN u.status = 1 THEN 'Elegivel'
				WHEN u.status = 0 THEN 'Aguardando Confirmação'
				WHEN u.status = 1 THEN 'Confirmado' ELSE NULL END) as status,
				u.nome,u.email,u.telefone,u.cidade,u.estado,u.cep,u.rua,u.bairro,u.numero,u.camiseta,l.id_loja,l.nome nomeLoja
				from Usuarios u
				left join Lojas l on u.cnpj=l.cnpj
				where u.id_perfil=4
				group by u.id_usuario,l.id_loja order by u.id_usuario
			");
			$stmt->execute();
			$results = $stmt->fetchAll( PDO::FETCH_ASSOC );

			$out = fopen( 'php://output', 'w' );
			fputs($out, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
			$headings = array(
				'CPF',
				'Data de Cadastro',
				'Status',
				'Nome',
				'E-mail',
				'Telefone',
				'Cidade',
				'Estado',
				'CEP',
				'Rua',
				'Bairro',
				'Número',
				'Tamanho da Camiseta',
				'ID Loja',
				'Nome da Loja'
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