<?
if(!$s->idu){
	$id = strp('id',3);
	$email = strtoupper(strpr('email'));
	$codigo = strpr('codigo',1);
	$p1 = strpr('p1');
	$p2 = strpr('p2');

	if(!$id&&$x->c='id')$x->m = 'Digite o ID!';
	elseif(!$email&&$x->c='email')$x->m = 'Digite o e-mail!';
	elseif(!preg_match($emailRE,$email)&&$x->c='email')$x->m = 'E-mail inválido!';
	elseif(!$codigo&&$x->c='cod')$x->m = 'Digite o Código!';
	elseif(!preg_match($md5RE,$codigo)&&$x->c='cod')$x->m = 'Código inválido!';
	elseif(!$p1&&$x->c='p1')$x->m = 'Digite a nova senha!';
	elseif(strlen($p1) < 8)$x->m = 'A quantidade mínima de caracteres da nova senha é 8!';
	elseif(strlen($p1) > 50)$x->m = 'A quantidade máxima de caracteres da nova senha é 50!';
	elseif(!$p2&&$x->c='p2')$x->m = 'Digite a confirmação da nova senha!';
	elseif(strlen($p2) < 8)$x->m = 'A quantidade mínima de caracteres da confirmação da nova senha é 8!';
	elseif(strlen($p2) > 50)$x->m = 'A quantidade máxima de caracteres da confirmação da nova senha é 50!';
	elseif($p1!=$p2&&$x->c='p2')$x->m = 'Confirmação da nova senha diferente!';
	else{
		$p1 = sha1($p1);
		$x->c = 'id';
		if($rs=$b->query("select email,codigo from Usuarios where id_usuario=$id and id_perfil!=4 limit 1")->fetchObject()){
			$x->c = 'email';
			if($rs->email==$email){
				$x->c = 'cod';
				if($rs->codigo==$codigo){
					$x->c = '';
					if($b->exec("update Usuarios set senha='$p1',codigo=null where id_usuario=$id and id_perfil!=4 limit 1")){
						$x->m = 'Senha redefinida com sucesso!';
						$x->ok = 1;
					}else $x->m = 'Erro ao redefinir a senha!';
				}elseif($rs->cod)$x->m = 'Código Diferente!';
				else $x->m = 'Não foi enviado um link de redefinição de senha!';
			}else $x->m = 'E-mail diferente!';
		}else $x->m = 'Este ID não existe!';
	}
}else $neg = true;
?>