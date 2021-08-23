<?
if(true){
	$ip = $s->ip;
	$n = strpr('nome');
	$email = strpr('email',1);
	$t1 = strps('telefone');
	$empresa = strps('empresa');
	$msg = strpr('mensagem');
		
	$x->pg = $pg = strpr('pg');
	$recaptchaResponse = strpr('g-recaptcha-response');
	$secretKey = '';
	if($recaptchaResponse){
		$x->url = $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$recaptchaResponse;
		$x->request = $request = json_decode(file_get_contents($url));
	}

	$topo = "{$s->base}assets/img/email/topo.jpg";
	$rodape = "{$s->base}assets/img/email/rodape.jpg";
	$site = "{$s->base}";

	if(!$n)$x->m = 'Digite o Nome!';
	elseif(!$email)$x->m = 'Digite o E-mail!';
	elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
	elseif(!$t1)$x->m = 'Digite o Telefone!';
	elseif(!$msg)$x->m = 'Digite a mensagem!';
	else{
		$send->subject = 'Fale Conosco Ibbl';
		//$send->debug = 5;
		$send->html = '
		<strong>Nome:</strong> '.strh($n).'<br/>
		<strong>E-mail:</strong> '.strh($email).'<br/>
		'.($t1?'<strong>Telefone:</strong> '.strh($t1).'<br/>':'').'
		'.($empresa?'<strong>Empresa:</strong> '.strh($empresa).'<br/>':'').'
		'.($msg?'<strong>Mensagem:</strong><div style="margin: 0;padding: 10px">'.strhb($msg).'</div>':'');
		$send->secure = 'ssl';
		//$send->debug = true;
		//$send->reply = array($email);
		// $send->to = array('contato@ibbl.com.br');
		$send->bcc = array('rodrigodeananias@gmail.com');
		if($x->send=$s->send($send)){
			$x->ok = 1;
			//$x->m = 'Mensagem enviada com sucesso!';
			$x->l = 'obrigado';
		}else{
			$x->m = "Ocorreu um erro inesperado. Tente novamente. Se o erro persistir, envie sua mensagem para {$send->to[0]->mail}.";
		}
	}
}else $neg = true;