<?php
$id = strtoupper(strp('id_usuario',3));
$id_perfil = 4;
$id_loja = 0;
$S = strp('status',3)?1:0;

$numeros = strpr('numbers');
$nome = $_SESSION['user']['name'];
$email = $_SESSION['user']['email'];


if(!$numeros)$x->m = 'Escolha algum número disponível';
else{
	$implodeNum = implode(',',$numeros);
	$rs = $b->query(
		"SELECT 
			numero 
		FROM 
			rifa
		WHERE
			numero
				IN (
					{$implodeNum}
				)"
		);
		if($rs->rowCount())$x->m = sizeof($numeros)>1?'Este número não está disponível':'Estes números não estão disponíveis';
		elseif(!$nome)$x->l = '.';
		else{
			$insert = [];
			$info = [];
			foreach ($numeros as $key => $value) {
				$i++;
				if($value <= 11){
					$fralda = 'Pacote de fralda tamanho P + 1 mimo';
				  }elseif ($value > 11 && $value <= 61) {
					$fralda = 'Pacote de fralda tamanho M + 1 mimo';
				  }else{
					$fralda = 'Pacote de fralda tamanho G + 1 mimo';
				  }
                array_push($_SESSION['user']['fralda'], $fralda);
                array_push($insert, "('{$nome}','{$email}',{$value},'{$fralda}',1,now())");
				$info[$value] = $fralda;
			}

			if($b->exec("insert into rifa (nome,email,numero,fralda,status,createddate) values ".implode(',',$insert))){
				$x->ok = 1;
				if($email){
					$send->subject = "Número(s) do chá rifa";
					$send->html = '
						<h1>Chá rifa da Heloa</h1>
						Você está participando do chá rifa da Eloah e você escolheu o(s) número(s):
						<ul>						
					';
					foreach ($info as $key => $value) {
						$send->html .= '
							<li style="list-style-type:none">
								<span style="background:#fc7db0;color:#fff;padding: 2px 5px;box-shadow: 2px 1px #00000042;">'.$key.'</span>'.$value.'
							</li>';
					}
					$send->html .= '</ul>';
					$send->secure = 'ssl';
					$send->to = array(array($email,$nome));
					$x->send = $s->send($send);	
				}
				// if(!$x->up)$x->l = 'admin/clientes/';
				$x->m = 'Número '.($x->up?'alterado':'cadastrado').' com sucesso!';
				$x->l = 'obrigado';
			}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao registrar!';
						
			$x->l = 'confirmado';
		}
}
