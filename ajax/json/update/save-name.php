<?php
$id = strtoupper(strp('id_usuario',3));
$id_perfil = 4;
$id_loja = 0;
$S = strp('status',3)?1:0;

$email = strpr('email');

$nome = strps('nome');

//$rs = $b->query("select * from Usuarios where id_usuario=$id limit 1")->fetchObject();

$specialChar = preg_match("/^[(a-zA-Z\s+){6}]+$/", $nome);

//if($id&&!$b->query("select id_usuario from Usuarios where id_usuario=$id limit 1")->fetchObject())$x->m = 'Este Usuarios não existe!';
if(!$nome)$x->m = 'Digite o Nome!';
elseif(strpos($nome,' ')===false)$x->m = 'Digite o nome completo!';
elseif(strlen($nome) > 150)$x->m = 'O nome não pode ter mais do que 150 caracteres!';
//elseif(!preg_match("/^[(a-zA-Z\s+){6}]+$/", $nome))$x->m = 'O nome não pode conter caracter especial!';
//elseif(!$email)$x->m = 'Digite o E-mail!';
elseif(!isset($email)){
	if(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
}
//elseif($b->query("select id_usuario from Usuarios where email='$email' and status=1 limit 1")->rowCount())$x->m = 'Este e-mail já está cadastrado!';
else{
	/*
	$x->up = $id?1:0;
	if(!$id&&$b->exec("insert into Usuarios (dataCadastro) values (now())"))$id = $b->lastInsertId();
	if($b->exec($x->sql="update Usuarios set id_perfil=$id_perfil,id_loja=$id_loja,status=$S,cnpj='$cnpj',
	nome='$nome',rg='$rg',cpf='$cpf',email='$email',senha='$pass',data_nascimento='$data_nascimento',telefone='$telefone',
	cep='$cep',rua='$rua',numero='$numero',complemento='$comp',bairro='$bairro',cidade='$cidade',estado='$estado',camiseta='$camiseta'
	where id_usuario=$id limit 1")){
		if($x->up)$b->exec("update Usuarios set dataAlterado=now() where id_usuario=$id limit 1");
		$x->ok = 1;
		$link = "{$s->base}confirmar-cadastro/$id";
		$send->subject = "Confirme seu cadastro";
		$send->html = '
			<h1>Confirme seu Cadastro</h1>
			Clique no link abaixo ou copie e cole na barra de endereço do seu navegador para confirmar o seu cadastro.<br/><br/>
			<a href="'.$link.'">'.$link.'</a>
		';
		$send->secure = 'ssl';
		$send->to = array(array($email,$nome));
		$x->send = $s->send($send);
		// if(!$x->up)$x->l = 'admin/clientes/';
		$x->m = 'Cliente '.($x->up?'alterada':'cadastrada').' com sucesso!';
		$x->l = 'obrigado';
	}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastrar cliente!';
	*/
	$_SESSION['user'] = array('name' => $nome, 'email' => $email);
	$x->l = 'numeros';
}