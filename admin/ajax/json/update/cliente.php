<?php
$id = strp('id_usuario',3);
$id_perfil = 3;
$id_loja = 1;
$S = strp('status',3)?1:0;

$cpf = strps('cpf');
$cnpj = strps('cnpj');
$rg = strps('rg');

$email = strtoupper(strps('email'));
$senha = strps('senha');

$nome = strps('nome');
$telefone = strps('telefone');
$data_nascimento = strps('data_nascimento');
$cep = strps('cep');
$cep = str_replace(".", "", $cep);
$rua = strps('rua');
$numero = strps('numero');
$complemento = strps('complemento');
$bairro = strps('bairro');
$cidade = strps('cidade');
$estado = strps('estado');

$anoMinimo = date('Y-m-d', strtotime('-16 year'));
if($_data_nascimento=preg_match($dataRE,$data_nascimento,$_m))$data_nascimento = "{$_m[3]}-{$_m[2]}-{$_m[1]}";
if($_cpf=preg_match($cpfRE,$cpf,$_m))$cpf = "{$_m[1]}.{$_m[2]}.{$_m[3]}-{$_m[4]}";
if($_cnpj=preg_match($cnpjRE,$cnpj,$_m))$cnpj = "{$_m[1]}.{$_m[2]}.{$_m[3]}/{$_m[4]}-{$_m[5]}";
if($_cep=preg_match($cepRE,$cep,$_m))$cep = "{$_m[1]}-{$_m[2]}";
if($_t1=preg_match($telRE,$telefone,$_m))$telefone = "({$_m[1]}) {$_m[2]}-{$_m[3]}";

$rs = $b->query("select * from Usuarios where id=$id limit 1")->fetchObject();

if($id&&!$b->query("select id from Usuarios where id=$id limit 1")->fetchObject())$x->m = 'Este Usuarios não existe!';
elseif(!$nome)$x->m = 'Digite o Nome!';
elseif(strpos($nome,' ')===false)$x->m = 'Digite o nome completo!';
elseif(!$email)$x->m = 'Digite o E-mail!';
elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
elseif(!$senha)$x->m = 'Digite a senha!';
elseif(!$rg)$x->m = 'Digite o RG!';
elseif($b->query("select id from Usuarios where id!=$id and rg='$rg' limit 1")->fetchObject())$x->m = 'Este RG já está cadastrado!';
elseif(!$cpf)$x->m = 'Digite o CPF!';
elseif((!$_cpf||!$s->validar->cpf($cpf)))$x->m = 'CPF inválido';
elseif($b->query("select id from Usuarios where id!=$id and cpf='$cpf' limit 1")->fetchObject())$x->m = 'Este CPF já está cadastrado!';
elseif(!$cnpj)$x->m = 'Digite o CNPJ!';
elseif((!$_cnpj||!$s->validar->cnpj($cnpj)))$x->m = 'CNPJ inválido';
// elseif($b->query("select id from Usuarios where id!=$id and cnpj='$cnpj' limit 1")->fetchObject())$x->m = 'Este CNPJ já está cadastrado!';
elseif(!$data_nascimento)$x->m = 'Digite a data de nascimento!';
elseif(!$_data_nascimento)$x->m = 'Data de nascimento inválida!';
elseif($data_nascimento<$anoMinimo)$x->m = 'Somente para maiores de 16 anos!';
elseif(!$telefone)$x->m = 'Digite o Telefone!';
elseif(!$cep)$x->m = 'Digite o CEP!';
elseif(!$_cep)$x->m = 'CEP inválido!';
elseif(!$rua)$x->m = 'Digite o Logradouro!';
//elseif(!$num)$x->m = 'Digite o Número Residencial!';
//elseif(!$comp)$x->m = 'Digite o Complemento Residencial!';
elseif(!$bairro)$x->m = 'Digite o Bairro!';
elseif(!$cidade)$x->m = 'Digite a Cidade!';
elseif(!$estado)$x->m = 'Selecione o Estado!';
else{
	$x->up = $id?1:0;
	$pass = $senha?sha1($senha):$rs->senha;
	if(!$id&&$b->exec("insert into Usuarios (dataCadastro) values (now())"))$id = $b->lastInsertId();
	if($b->exec($x->sql="update Usuarios set id_perfil=$id_perfil,id_loja=$id_loja,status=$S,cnpj='$cnpj',
	nome='$nome',rg='$rg',cpf='$cpf',email='$email',senha='$pass',data_nascimento='$data_nascimento',telefone='$telefone',
	cep='$cep',rua='$rua',numero='$numero',complemento='$comp',bairro='$bairro',cidade='$cidade',estado='$estado'
	where id_usuario=$id limit 1")){
		if($x->up)$b->exec("update Usuarios set dataAlterado=now() where id_usuario=$id limit 1");
		$x->ok = 1;
		// if(!$x->up)$x->l = 'admin/clientes/';
		$x->m = 'Cliente '.($x->up?'alterada':'cadastrada').' com sucesso!';
	}else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastrar cliente!';
}