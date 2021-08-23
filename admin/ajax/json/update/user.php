<?php
if($s->idu){
	$id = strp('id',3);
	$id_criador = $s->idu;
	$id_perfil = strp('id_perfil',3);
	$nome = strps('nome');
	$email = strtoupper(strps('email'));
	$cpf = strps('cpf');

	if($_cpf=preg_match($cpfRE,$cpf,$_m))$cpf = "{$_m[1]}.{$_m[2]}.{$_m[3]}-{$_m[4]}";

	$rs = $b->query("select * from Usuarios where id_usuario=$id limit 1")->fetchObject();

	if($id&&!$rs)$x->m = 'Este usuário não existe!';
	elseif(!$id_perfil)$x->m = 'Selecione o perfil de usuário!';
	elseif($id_perfil!=2&&$id_perfil!=3)$x->m = 'Perfil de usuário inválido!';
	elseif(!$nome)$x->m = 'Digite o nome do usuário!';
	elseif(strpos($nome,' ')===false)$x->m = 'Digite o nome completo!';
	elseif(strlen($nome) > 50)$x->m = 'O nome não pode ter mais do que 100 caracteres!';
	elseif(!$email)$x->m = 'Digite o e-mail do usuário!';
	elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
	elseif($b->query("select id_usuario from Usuarios where id_usuario!=$id and email='$email' limit 1")->fetchObject())$x->m = 'Este e-mail já está cadastrado!';
	elseif(!$cpf)$x->m = 'Digite o CPF!';
	elseif((!$_cpf||!$s->validar->cpf($cpf)))$x->m = 'CPF inválido';
	elseif($b->query("select id_usuario from Usuarios where cpf='$cpf' limit 1")->rowCount())$x->m = 'Este CPF já está cadastrado!';
	else{
		$x->up = $id?1:0;
		$codigo = md5("$email".date('YmdHis'));
		//$p = $p1?"'$p1'":'p';
		$p = $p1?sha1($p1):$rs->p;
		if(!$id&&$b->exec("insert into Usuarios (dataCadastro)values(now())"))$id = $b->lastInsertId();
		if($b->exec("update Usuarios set id_criador=$id_criador,id_perfil=$id_perfil,nome='$nome',email='$email',codigo='$codigo',cpf='$cpf'
		where id_usuario=$id limit 1")){
			$link = "{$s->base}admin/confirmar-cadastro/$id";
			$send->subject = "{$s->pftit} - Confirmar Cadastro";
			$send->html = '<h1>Confirmar Cadastro</h1>Clique no link abaixo ou copie e cole na barra de endereço do navegador para confirmar o seu cadastro.<br/><br/><a href="'.$link.'">'.$link.'</a>';
			$send->secure = 'ssl';
			$send->to = array(array($email,$nome));
			$x->send = $s->send($send);
			if($x->up)$b->exec("update Usuarios set dataAlterado=now() where id_usuario=$id limit 1");
			$x->ok = 1;
			$x->m = 'Usuário '.($x->up?'alterado':'cadastrado').' com sucesso!';
		}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastar o usuário!';
	}
}else $neg = true;