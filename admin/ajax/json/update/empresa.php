<?
if($s->adm()){
	$id = strp('id',3);
	$idc = strp('idc',3);// ID CATEGORIA
	$S = strp('s',3)?1:0;

	$nome = strps('nome');
	$t = tag($nome,1);
	$area = strps('area');
	$d = strps('d');
	$d_count = str_replace('\n', ' ', $d);
	$horario = strps('horario');
	$email = strpr('email',1);
	$site = strps('site');
	$t1 = strps('t1');
	$t2 = strps('t2');
	$whatsapp = strps('whatsapp');
	$texto_call = strps('texto_call');
	$url_call = strps('url_call');
	$cor_call = strps('cor_call');

	$cep = strps('cep');
	$endereco = strps('endereco');
	$ruat = tag($endereco,1);
	$num = strps('num');
	$comp = strps('comp');
	$bairro = strps('bairro');
	$bairrot = tag($bairro,1);
	$city = strps('city');
	$cityt = tag($city,1);
	$uf = strps('uf');
	$map = strps('map');

	$facebook = strps('facebook');
	$instagram = strps('instagram');
	$twitter = strps('twitter');
	$linkedin = strps('linkedin');
	$youtube = strps('youtube');
	$pinterest = strps('pinterest');
	$plus = strps('plus');

	$i = $s->getfile(strp('i',3));
	$il = $s->getfile(strp('il',3));
	$N = 0;
	$P = '../upload/empresas/';
	$Pt = $P.'thumb/';
	$I = 'i';
	$It = 'it';
	$Il = 'il';
	$D = '';
	$Dt = '';
	$Dl = '';

	$page = 'empresa';
	$siteMap = 'empresa-sitemap';

	if($_cep=preg_match($cepRE,$cep,$_m))$cep = "{$_m[1]}-{$_m[2]}";
	if($_t1=preg_match($telRE,$t1,$_m))$t1 = "({$_m[1]}) {$_m[2]}-{$_m[3]}";
	if($_t2=preg_match($telRE,$t2,$_m))$t2 = "({$_m[1]}) {$_m[2]}-{$_m[3]}";
	if($_whatsapp=preg_match($telRE,$whatsapp,$_m))$whatsapp = "({$_m[1]}) {$_m[2]}-{$_m[3]}";
	if($_la=preg_match($laRE,$latitude,$_m))$latitude = "({$_m[1]}).{$_m[2]}";
	if($_lo=preg_match($loRE,$longitude,$_m))$longitude = "({$_m[1]}).{$_m[2]}";

	if($_ccep=preg_match($cepRE,$ccep,$_m))$ccep = "{$_m[1]}-{$_m[2]}";

	//if($_ie=preg_match($ieRE,$ie,$_m))$ie = "{$_m[1]}.{$_m[2]}.{$_m[3]}.{$_m[4]}";

	//if(!$t)$tn = $tc = $ts = $tt1 = $tt2 = '';

	$rs = $b->query("select * from empresa where id=$id limit 1")->fetchObject();

	if($id&&!$b->query("select id from empresa where id=$id limit 1")->fetchObject())$x->m = 'Esta empresa não existe!';
	elseif(!$nome)$x->m = 'Digite o nome!';
	elseif(!$d)$x->m = 'Digite a descrição sobre a empresa!';
	elseif(mb_strlen($d_count, 'utf8')>2000)$x->m = 'O limite de caracteres da descrição é 2000!';
	//elseif(!$email)$x->m = 'Digite o E-mail!';
	//elseif(!preg_match($emailRE,$email))$x->m = 'E-mail inválido!';
	//elseif(!$telefone)$x->m = 'Digite o Telefone Principal!';
	// elseif(!$cep)$x->m = 'Digite o CEP!';
	// elseif(!$_cep)$x->m = 'CEP inválido!';
	// elseif(!$endereco)$x->m = 'Digite o Logradouro!';
	//elseif(!$num)$x->m = 'Digite o Número Residencial!';
	//elseif(!$comp)$x->m = 'Digite o Complemento Residencial!';
	// elseif(!$bairro)$x->m = 'Digite o Bairro!';
	// elseif(!$city)$x->m = 'Digite a cidade!';
	// elseif(!$uf)$x->m = 'Selecione o Estado!';
	// elseif(!$id&&!$i)$x->m = 'Escolha a imagem!';
	elseif($cor_call=='#fff'||$cor_call=='#ffffff')$x->m = 'A cor do botão não pode ser branco!';
	elseif($i&&$i->e&&++$N)$x->m = 'Ocorreu um erro ao fazer upload do banner!';
	elseif($i&&$i->w!=2560&&++$N)$x->m = 'A largura do banner deve ser 2560px!';
	elseif($i&&$i->h!=525&&++$N)$x->m = 'A altura do banner deve ser 525px!';
	// elseif(!$id&&!$il)$x->m = 'Escolha o logo!';
	elseif($il&&$il->e&&++$N)$x->m = 'Ocorreu um erro ao fazer upload do logo!';
	elseif($il&&$il->w<150&&++$N)$x->m = 'A largura da mínima do logo deve ser 150px!';
	elseif($il&&$il->h<150&&++$N)$x->m = 'A altura da mínima do logo deve ser 150px!';
	elseif($il&&$il->w!=$il->h&&++$N)$x->m = 'O logo deve ser quadrado!';
	elseif($il&&$il->w>1000&&++$N)$x->m = 'A largura máxima do logo deve ser 1000px!';
	elseif($il&&$il->h>1000&&++$N)$x->m = 'A altura da máxima do logo deve ser 1000px!';
	else{
		// $address = $ruat.','.$num.','.$bairrot.'-'.$cityt.','.$uf.'-brasil';
		// $geocode = file_get_contents($x->geo='https://maps.google.com/maps/api/geocode/json?key=AIzaSyBJjfyznATtRcaBY2D_9ECDMlJfskEdUAo&address='.$address.'&sensor=false');	
		// $output= json_decode($geocode);	
		// $latitude = $output->results[0]->geometry->location->lat;
		// $longitude = $output->results[0]->geometry->location->lng;
		// $latitude = strps($latitude);
		// $longitude = strps($longitude);
		// if(!$latitude&&!$longitude){
		// 	$x->m = 'Digite o endereço corretamente!<br>Para encontrar a latitude e longitude!';
		// }else{
		$C = $t.'-banner-'.date("his").'.'.$i->ex;
		if($i&&$i=$s->movefile($i->id,$P.$C)){
			$x->i->i = $P.$C;
			$I = "'$C'";
			$Ct = $t.'-thumb-'.date("his").'.'.$i->ex;
			$It = Img::resize($i->nf,$Pt.$Ct,738,0,$i->ex=='png'||$i->ex=='gif'?0:90)?"'$Ct'":'null';
			$s->convertWebp($P.$C);
			$s->convertWebp($Pt.$Ct);
			$D = $rs->i;
			$Dt = $rs->it;
		}
		$Cl = $t.'-logo-'.date("his").'.'.$il->ex;
		if($il&&$il=$s->movefile($il->id,$P.$Cl)){
			$x->i->il = $P.$Cl;
			$Il = "'$Cl'";
			if($il->w>150&&++$N)$Il = Img::resize($il->nf,$P.$Cl,150,0)?"'$Cl'":'null';
			$s->convertWebp($P.$Cl);
			$Dl = $rs->il;
		}

		$x->up = $id?1:0;		
		if(!$id&&$b->exec("insert into empresa (dc) values (now())"))$id = $b->lastInsertId();
		if($b->exec($x->sql="update empresa set s=$S,nome='$nome',t='$t',area='$area',d='$d',horario='$horario',email='$email',site='$site',t1='$t1',t2='$t2',whatsapp='$whatsapp',texto_call='$texto_call',url_call='$url_call',cor_call='$cor_call',cep='$cep',endereco='$endereco',num='$num',comp='$comp',bairro='$bairro',city='$city',uf='$uf',map='$map',facebook='$facebook',instagram='$instagram',twitter='$twitter',linkedin='$linkedin',youtube='$youtube',pinterest='$pinterest',plus='$plus',i=$I,it=$It,il=$Il where id=$id limit 1")){
			if($x->up)$b->exec("update empresa set da=now() where id=$id limit 1");
			if($D)@unlink($P.$D);
			if($Dt)@unlink($Pt.$Dt);
			if($Dl)@unlink($P.$Dl);
			$x->ok = 1;}elseif($x->up)$x->noup = 1;
		else $x->m = 'Erro ao cadastar a empresa!';
		if($id){
			//CATEGORIAS
			if($idc)foreach($idc as $k=>&$v){
				$idc = &$v;
				$rs = $b->query("select idc from empresa_cat where idc='$idc' and ide=$id limit 1")->fetchObject();
				if(!$rs&&$idc&&$b->exec("insert into empresa_cat (idc,ide,dc)values($idc,$id,now())"))$x->ok = 1;
				$re = $b->query("select idc from empresa_cat where idc='$idc' and ide=$id")->fetchObject();
				$nidc[] = $re->idc;
			}
			if($nidc){
				$nidc2 = implode(",",$nidc);
				$del = $b->query("delete from empresa_cat where ide=$id and idc not in($nidc2)");
				if($del->rowCount())$x->ok = 1;
			}else{
				$del = $b->query("delete from empresa_cat where ide=$id and idc!=$idc");
				if($del->rowCount())$x->ok = 1;
			}
		}
		if($x->ok){
			$s->siteMap($siteMap,$page);
			if($x->up)$b->exec("update empresa set da=now() where id=$id limit 1");
			if(!$x->m)$x->m = 'Empresa '.($x->up?'alterada':'cadastrada').' com sucesso!';
			$x->ok = 1;
			if(!$x->up)$x->l = 'empresa';
		}elseif($x->noup)$x->m = 'Nenhum campo para alterar!';
		// }
	}
}