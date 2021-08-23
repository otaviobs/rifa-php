<?php
if($s->idc){
	$p = strpr('pass');
	$p1 = strpr('p1');
	$p2 = strpr('p2');
	if(!$p)$x->m = 'Digite a senha antiga!';
	elseif(!$p1)$x->m = 'Digite a nova senha!';
	elseif(strlen($p1) < 8)$x->m = 'A quantidade mínima de caracteres da nova senha é 8!';
	elseif(strlen($p1) > 50)$x->m = 'A quantidade máxima de caracteres da nova senha é 50!';
	elseif(!$p2)$x->m = 'Digite a confirmação da nova senha!';
	elseif(strlen($p2) < 8)$x->m = 'A quantidade mínima de caracteres da confirmação da nova senha é 8!';
	elseif(strlen($p2) > 50)$x->m = 'A quantidade máxima de caracteres da confirmação da nova senha é 50!';
	elseif($p1!=$p2)$x->m = 'Confirmação da nova senha diferente!';
	elseif($p==$p1)$x->m = 'Senha antiga e nova senha são iguais!';
	else{
		$p = sha1(strpr('pass'));
		$p1 = sha1(strpr('p1'));
		$p2 = sha1(strpr('p2'));
		$rs = $b->query("select senha as p from Usuarios where id_usuario={$s->idc} limit 1")->fetchObject();

		if($rs&&$p==$rs->p){
			if($b->exec("update Usuarios set senha='$p1' where id_usuario={$s->idc} limit 1")){
				$x->m = 'Senha alterada com sucesso!';
				$x->ok = 1;
			}else $x->m = 'Ocorreu um erro, tente novamente!';
		}else $x->m = 'Senha antiga incorreta!';
	}
}else $neg = true;