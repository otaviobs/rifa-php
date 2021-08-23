<?
if($s->adm()){
	$id = strp('id',3);
	$tipo = strps('tipo');
	$tipo = 'imagem';
	$S = strp('s',3)?1:0;
	$n = strps('n');
	$t = tag($n,1);
	$n2 = strps('n2');
	$l = strps('l');
	$l2 = strps('l2');
	$cor_n = strps('cor_n');
	$cor_n2 = strps('cor_n2');
	$cor_l = strps('cor_l');
	$background_l = strps('background_l');
	$i = $s->getfile(strp('i',3));
	$il = $s->getfile(strp('il',3));//BACKGROUND
	$N = 0;
	$P = '../upload/sliders/';
	$Pt = $P.'thumb/';
	$Pe = $P.'element/';
	$I = 'i';
	$It = 'it';
	$Im = 'im';
	$Il = 'il';
	$Iet = 'iet';
	$Iem = 'iem';
	$D = '';
	$Dt = '';
	$Dm = '';
	$De = '';
	$Det = '';
	$Dem = '';
	//$R = strp('ri',3)?1:0;
	$Re = strp('rib',3)?1:0;
	$y = strps('y');


	if(!($rs=$b->query("select i from slider where id=$id limit 1")->fetchObject())&&$id&&++$N)$x->m = 'Este Slider não existe!';
	elseif(!$tipo)$x->m = 'Selecione o tipo!';
	elseif($tipo!='imagem'&&$tipo!='video')$x->m = 'Tipo inválido!';
	elseif(!$n)$x->m = 'Digite o título!';
	elseif($tipo=='imagem'&&!$id&&!$i)$x->m = 'Escolha a imagem!';
	elseif($tipo=='imagem'&&$i&&$i->e&&++$N)$x->m = 'Ocorreu um erro ao fazer upload da imagem!';
	elseif($tipo=='imagem'&&$i&&$i->w!=1920&&++$N)$x->m = 'A largura da imagem deve ser 1920px!';
	elseif($tipo=='imagem'&&$i&&$i->h!=900&&++$N)$x->m = 'A altura da imagem deve ser 900px!';
	// elseif($tipo=='imagem'&&!$id&&!$il)$x->m = 'Escolha a imagem!';
	// elseif($tipo=='imagem'&&$il&&$il->e&&++$N)$x->m = 'Ocorreu um erro ao fazer upload da imagem!';
	// elseif($tipo=='imagem'&&$il&&$il->w!=70&&++$N)$x->m = 'A largura da imagem deve ser 70px!';
	// elseif($tipo=='imagem'&&$il&&$il->h!=70&&++$N)$x->m = 'A altura da imagem deve ser 70px!';
	else{
		$x->up = $id?1:0;
		$C = $t.'-'.date("his").'.'.$i->ex;
		if($i&&$i=$s->movefile($i->id,$P.$C)){
			$x->i->i = $P.$C;
			$I = "'$C'";
			/*$Ct = $t.'-tablet-'.date("his").'.'.$i->ex;
			$Cm = $t.'-mobile-'.date("his").'.'.$i->ex;
			$It = Img::resize($i->nf,$Pt.$Ct,1024,0,$i->ex=='png'||$i->ex=='gif'?0:90)?"'$Ct'":'null';
			$Im = Img::resize($i->nf,$Pt.$Cm,600,0,$i->ex=='png'||$i->ex=='gif'?0:90)?"'$Cm'":'null';*/
			$D = $rs->i;
			/*$Dt = $rs->it;
			$Dm = $rs->im;*/
		}
		$Cl = $t.'-'.date("his").'.'.$il->ex;
		if($il&&$il=$s->movefile($il->id,$P.$Cl)){
			$x->i->il = $P.$Cl;
			$Il = "'$Cl'";
			$Dl = $rs->il;
		}
		if(!$id&&$b->exec("insert into slider (dc)values(now())"))$id = $b->lastInsertId();
		//if($b->exec("update slider set s=$S,tipo='$tipo',n='$n',n2='$n2',t='$t',l='$l',cor_n='$cor_n',cor_n2='$cor_n2',background_l='$background_l',cor_l='$cor_l',i=$I,it=$It,im=$Im,ie=$Ie,iet=$Iet,iem=$Iem,y='$y' where id=$id limit 1")){
		if($b->exec("update slider set s=$S,n='$n',n2='$n2',l='$l',l2='$l2',i=$I where id=$id limit 1")){
			if($x->up)$b->exec("update slider set da=now() where id=$id limit 1");
			if($D)@unlink($P.$D);
			if($Dl)@unlink($Pt.$Dl);
			$x->ok = 1;
			$x->m = 'Slider '.($x->up?'alterado':'cadastrado').' com sucesso!';
			if(!$x->up)$x->l = 'slider';
		}else $x->m = $x->up?'Nenhum campo para alterar!':'Erro ao cadastar o Slider!';
	}
	if($i&&$N&&++$x->noi->i)$s->delfile($i->id);
}else $neg = true;