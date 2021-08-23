<?
if(!$s->idu){
	$email = strtoupper(strps($x->c='email'));

	if(!$email)$x->m = 'Digite o e-mail!';
	elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
	elseif($rs=$b->query("select id_usuario as id,codigo,nome as n from Usuarios where email='$email' and id_perfil!=4 limit 1")->fetchObject()){
		$id = $rs->id+0;
		$codigo = md5("$email".date('YmdHis'));
		if($codigo==$rs->codigo||$b->exec("update Usuarios set codigo='$codigo' where id_usuario=$id and id_perfil!=4 limit 1")){
			//$link = "{$s->base}admin/esqueci?id=$id&email=$email&cod=$cod";
			$link = "{$s->base}admin/esqueci/$id";
			$send->subject = "{$s->pftit} - Defina uma nova senha";
			$send->html = '
				<h1>Defina uma nova senha</h1>
				Clique no link abaixo ou copie e cole na barra de endereço do seu navegador para redefinir sua senha.<br/><br/>
				<a href="'.$link.'">'.$link.'</a>
			';
			$send->secure = 'ssl';
			$send->to = array(array($email,$rs->n));
			if($x->send = $s->send($send)){
				$x->m = "E-mail enviado com sucesso!\n\nVerifique sua caixa de entrada ou sua caixa de spam!";
				$x->ok = 1;
				$x->c = '';
			}else $x->m = 'Erro ao enviar o e-mail!';
		}else $x->m = 'Erro ao salvar os dados para redefinir a senha!';
	}else $x->m = 'Este e-mail não está cadastrado!';
}else $neg = true;
?>