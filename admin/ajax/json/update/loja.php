<?php
if($s->adm()){
	$id = strp('id',3);
  $S = strp('s',3)?1:0;

  $cnpj = strps('cnpj');

  $nome = strtoupper(strps('nome'));
  $nomeResponsavel = strtoupper(strps('nomeResponsavel'));
  $telefone = strps('telefone');
  $email = strtoupper(strpr('email',1));

  $cep = strps('cep');
  $cep = str_replace(".", "", $cep);
  $rua = strtoupper(strps('rua'));
  $numero = strtoupper(strps('numero'));
  $complemento = strtoupper(strps('complemento'));
  $bairro = strtoupper(strps('bairro'));
  $cidade = strtoupper(strps('cidade'));
  $estado = strtoupper(strps('estado'));

  if($_cpf=preg_match($cpfRE,$cpf,$_m))$cpf = "{$_m[1]}.{$_m[2]}.{$_m[3]}-{$_m[4]}";
  if($_cnpj=preg_match($cnpjRE,$cnpj,$_m))$cnpj = "{$_m[1]}.{$_m[2]}.{$_m[3]}/{$_m[4]}-{$_m[5]}";
  if($_cep=preg_match($cepRE,$cep,$_m))$cep = "{$_m[1]}-{$_m[2]}";
  if($_t1=preg_match($telRE,$telefone,$_m))$telefone = "({$_m[1]}) {$_m[2]}-{$_m[3]}";

  $rs = $b->query("select * from Lojas where id_loja=$id limit 1")->fetchObject();

  if($id&&!$b->query("select id_loja from Lojas where id_loja=$id limit 1")->fetchObject())$x->m = 'Esta loja não existe!';
  elseif(!$cnpj)$x->m = 'Digite o CNPJ!';
  elseif((!$_cnpj||!$s->validar->cnpj($cnpj)))$x->m = 'CNPJ inválido';
  elseif($b->query("select id_loja from Lojas where id_loja!=$id and cnpj='$cnpj' limit 1")->fetchObject())$x->m = 'Este CNPJ já está cadastrado!';
  elseif(!$nome)$x->m = 'Digite o nome da loja!';
  // elseif(strpos($nome,' ')===false)$x->m = 'Digite o nome completo!';
  elseif(strlen($nome) > 100)$x->m = 'O nome não pode ter mais do que 100 caracteres!';
  // elseif(!$nomeResponsavel)$x->m = 'Digite o nome do responsável!';
  // elseif(strlen($nomeResponsavel) > 50)$x->m = 'O nome do responsável não pode ter mais do que 50 caracteres!';
  // elseif(!$telefone)$x->m = 'Digite o Telefone!';
  // elseif(!$email)$x->m = 'Digite o E-mail!';
  // elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
  // elseif($b->query("select id_usuario from Lojas where id_loja!=$id and email='$email' limit 1")->fetchObject())$x->m = 'Este e-mail já está cadastrado!';
  // elseif(!$cep)$x->m = 'Digite o CEP!';
  // elseif(!$_cep)$x->m = 'CEP inválido!';
  // elseif(!$rua)$x->m = 'Digite o Logradouro!';
  // //elseif(!$num)$x->m = 'Digite o Número Residencial!';
  // elseif(!$bairro)$x->m = 'Digite o Bairro!';
  // elseif(!$cidade)$x->m = 'Digite a Cidade!';
  // elseif(!$estado)$x->m = 'Selecione o Estado!';
  else{
    $x->up = $id?1:0;
    $pass = $senha?sha1($senha):$rs->senha;
    if(!$id&&$b->exec("insert into Lojas (id_usuario,dataCadastro) values ('{$s->idu}',now())"))$id = $b->lastInsertId();
    if($rs->status==$S&&$rs->cnpj==$cnpj&&$rs->nome==$nome&&$rs->nomeResponsavel==$nomeResponsavel&&$rs->email==$email&&$rs->telefone==$telefone&&$rs->cep==$cep&&$rs->rua==$rua&&$rs->numero==$numero&&$rs->complemento==$comp&&$rs->bairro==$bairro&&$rs->cidade==$cidade&&$rs->estado==$estado){
      $update = "update Lojas set status=$S,cnpj='$cnpj',
      nome='$nome',nomeResponsavel='$nomeResponsavel',email='$email',telefone='$telefone',
      cep='$cep',rua='$rua',numero='$numero',complemento='$comp',bairro='$bairro',cidade='$cidade',estado='$estado'
      where id_loja=$id limit 1";
    } else {
      $update = "update Lojas set status=$S,cnpj='$cnpj',
      nome='$nome',nomeResponsavel='$nomeResponsavel',email='$email',telefone='$telefone',
      cep='$cep',rua='$rua',numero='$numero',complemento='$comp',bairro='$bairro',cidade='$cidade',estado='$estado',dataAlterado=now(),id_usuario_alterou='{$s->idu}'
      where id_loja=$id limit 1";
    }
    if($b->exec($x->sql=$update)){
      $x->ok = 1;
      // if(!$x->up)$x->l = 'admin/clientes/';
      $x->m = 'Loja '.($x->up?'alterada':'cadastrada').' com sucesso!';
    }else $x->m = $x->up&&++$x->noup?'Nenhum campo para alterar!':'Erro ao cadastrar a loja!';
  }
}else $neg = true;