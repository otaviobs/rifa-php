<?php
$id = strtoupper(strp('id_usuario',3));
$id_perfil = 4;
$id_loja = 0;
$S = strp('status',3)?1:0;

$cpf = strps('cpf');
$cnpj = strps('cnpj');
$rg = strps('rg');

$email = strtoupper(strpr('email'));
$senha = strps('senha');
$confirmar_senha = strps('confirmar-senha');

$nome = strtoupper(strps('nome'));
$telefone = strps('telefone');
$data_nascimento = strps('data_nascimento');
$cep = strps('cep');
$cep = str_replace(".", "", $cep);
$rua = strtoupper(strps('rua'));
$numero = strtoupper(strps('numero'));
$complemento = strtoupper(strps('complemento'));
$bairro = strtoupper(strps('bairro'));
$cidade = strtoupper(strps('cidade'));
$estado = strtoupper(strps('estado'));
$camiseta = strtoupper(strps('camiseta'));
$camisetas = array('P','M','G','GG','XG','XXG');

$anoMinimo = date('Y-m-d', strtotime('-16 year'));
$anoMaximo = date('Y-m-d', strtotime('-80 year'));
if($_data_nascimento=preg_match($dataRE,$data_nascimento,$_m))$data_nascimento = "{$_m[3]}-{$_m[2]}-{$_m[1]}";
if($_cpf=preg_match($cpfRE,$cpf,$_m))$cpf = "{$_m[1]}.{$_m[2]}.{$_m[3]}-{$_m[4]}";
if($_cnpj=preg_match($cnpjRE,$cnpj,$_m))$cnpj = "{$_m[1]}.{$_m[2]}.{$_m[3]}/{$_m[4]}-{$_m[5]}";
if($_cep=preg_match($cepRE,$cep,$_m))$cep = "{$_m[1]}-{$_m[2]}";
if($_t1=preg_match($telRE,$telefone,$_m))$telefone = "({$_m[1]}) {$_m[2]}-{$_m[3]}";

$rs = $b->query("select * from Usuarios where id_usuario=$id limit 1")->fetchObject();

$specialChar = preg_match("/^[(a-zA-Z\s+){6}]+$/", $nome);

if($id&&!$b->query("select id_usuario from Usuarios where id_usuario=$id limit 1")->fetchObject())$x->m = 'Este Usuarios não existe!';
elseif(!$nome)$x->m = 'Digite o Nome!';
elseif(strpos($nome,' ')===false)$x->m = 'Digite o nome completo!';
elseif(strlen($nome) > 50)$x->m = 'O nome não pode ter mais do que 50 caracteres!';
elseif(!preg_match("/^[(a-zA-Z\s+){6}]+$/", $nome))$x->m = 'O nome não pode conter caracter especial!';
elseif(!$email)$x->m = 'Digite o E-mail!';
elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
elseif($b->query("select id_usuario from Usuarios where email='$email' and status=1 limit 1")->rowCount())$x->m = 'Este e-mail já está cadastrado!';
elseif(!$senha)$x->m = 'Digite a confirmação de senha!';
elseif(strlen($senha) < 8)$x->m = 'A quantidade mínima de caracteres da senha é 8!';
elseif(strlen($senha) > 50)$x->m = 'A quantidade máxima de caracteres da senha é 50!';
elseif(!$confirmar_senha)$x->m = 'Digite a senha!';
elseif(strlen($confirmar_senha) < 8)$x->m = 'A quantidade mínima de caracteres da confirmação da senha é 8!';
elseif(strlen($confirmar_senha) > 50)$x->m = 'A quantidade máxima de caracteres da confirmação da senha é 50!';
elseif($senha!=$confirmar_senha)$x->m = 'Senha é diferente da confirmação de senha!';
elseif(!$rg)$x->m = 'Digite o RG!';
//elseif($b->query("select id_usuario from Usuarios where id_usuario!=$id and rg='$rg' limit 1")->rowCount())$x->m = 'Este RG já está cadastrado!';
elseif(!$cpf)$x->m = 'Digite o CPF!';
elseif((!$_cpf||!$s->validar->cpf($cpf)))$x->m = 'CPF inválido';
elseif($b->query("select id_usuario from Usuarios where cpf='$cpf' limit 1")->rowCount())$x->m = 'Este CPF já está cadastrado!';
elseif(!$cnpj)$x->m = 'Digite o CNPJ!';
elseif((!$_cnpj||!$s->validar->cnpj($cnpj)))$x->m = 'CNPJ inválido';
// elseif($b->query("select id_usuario from Usuarios where id_usuario!=$id and cnpj='$cnpj' limit 1")->fetchObject())$x->m = 'Este CNPJ já está cadastrado!';
elseif(!$data_nascimento)$x->m = 'Digite a data de nascimento!';
elseif(!$_data_nascimento)$x->m = 'Data de nascimento inválida!';
elseif($data_nascimento>$anoMinimo)$x->m = 'Somente para maiores de 16 anos!';
elseif($data_nascimento<$anoMaximo)$x->m = 'Idade máxima 80 anos!';
elseif(!$telefone)$x->m = 'Digite o Telefone!';
elseif(!$cep)$x->m = 'Digite o CEP!';
elseif(!$_cep)$x->m = 'CEP inválido!';
elseif(!$rua)$x->m = 'Digite o Logradouro!';
elseif(!$numero)$x->m = 'Digite o Número Residencial!';
elseif(strlen($numero)>6)$x->m = 'O Número Residencial não pode ser maior que 6 dígitos!';
//elseif(!$comp)$x->m = 'Digite o Complemento Residencial!';
elseif(!$bairro)$x->m = 'Digite o Bairro!';
elseif(!$cidade)$x->m = 'Digite a Cidade!';
elseif(!$estado)$x->m = 'Selecione o Estado!';
elseif(!$camiseta)$x->m = 'Selecione o tamanho da camiseta!';
elseif(!in_array($camiseta, $camisetas))$x->m = 'Tamanho da camiseta inválido!';
else{
	$x->up = $id?1:0;
	$pass = $senha?sha1($senha):$rs->senha;
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
}