<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'constants.php';
require_once('jbr.php');
//require_once('frete.php');
ini_set('display_errors',1);
ini_set('max_execution_time',30); 
error_reporting(E_ERROR | E_PARSE);
// ----- ----- //
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME,'pt_BR','ptb');
session_start();

//Random cookie
$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
shuffle($seed);
foreach (array_rand($seed, 32) as $k) $valc .= $seed[$k];
if(!$_SESSION["cookie_cart"])$_SESSION["cookie_cart"] = $valc;

class Sys{
	public $validar;
	public $dom;
	public $dir;
	public $dirAdmin;
	public $base;
	public $baseAdmin;
	public $db;
	public $mailC;
	public $mailU;

	public $laySL = 1;

	public $b;
	public $ip;
	public $vis = 0;
	public $on = 0;

	public $idu;
	public $idc;
	public $tipo;
	public $user;
	public $nome;
	public $email;
	public $cli;
	public $end;
	public $alu;
	public $envio;
	public $pagamento;

	public $langs = array(
		0=>'',
		1=>'Português',
		2=>'Inglês',
		3=>'Espanhol'
	);
	public $_langs = array(
		0=>'',
		1=>'br',
		2=>'en',
		3=>'es'
	);
	public $lang = 1;
	public $_lang;
	public $langp = '';

	//SEO
	public $tagd = '';
	public $tagk = '';
	public $tagt = '';
	public $seo = array(
		'/canonical'=>'',
		'/alternate'=>'',
		'/publisher'=>'',
		'/prev'=>'',
		'/next'=>'',

		'description'=>'',
		'keywords'=>'',
		'google-site-verification'=>'',
		'author'=>'',
		'revisit-after'=>'',
		'theme-color'=>'#ffffff',
		'+apple-mobile-web-app-status-bar-style'=>['black-translucent','#ffffff'],
		'apple-mobile-web-app-capable'=>'yes',
		'msapplication-navbutton-color'=>'#ffffff',

		'geo.region'=>'BR-SP',
		'geo.placename'=>'São Paulo',
		'geo.position'=>'',
		'ICBM'=>'',

		'@fb:page_id'=>'',

		'@og:email'=>'',
		'@og:phone_number'=>'',
		'@og:fax_number'=>'',
		'@og:latitude'=>'',
		'@og:longitude'=>'',
		'@og:street-address'=>'',
		'@og:locality'=>'',
		'@og:region'=>'',
		'@og:postal-code'=>'',
		'@og:country-name'=>'',
		'@og:locale'=>'pt_BR',
		'@og:type'=>'website',
		'@og:title'=>'',
		'@og:description'=>'',
		'@og:url'=>'',
		'@og:site_name'=>'',
		'@og:image'=>'',

		'@article:publisher'=>'',
		'@article:author'=>'',
		'@article:published_time'=>'',
		'@article:modified_time'=>'',
		'@og:updated_time'=>'',

		'twitter:card'=>'summary_large_image',
		'twitter:description'=>'',
		'twitter:title'=>'',
		'twitter:site'=>'',
		'twitter:image'=>'',
		'twitter:creator'=>''
	);
	// END SEO

	/*public $ps;
	public $cepO;
	public $codigoCorreios;
	public $senhaCorreios;
	public $frete;
	public $FreteGratis = false;
	public $FreteGratisValor = 130;
	public $FreteDesconto = 0;*/

	public $set404 = 1;
	public $is404 = 0;

	public $pg;
	public $spg;
	public $_pg;
	public $_spg;
	public $id;
	public $tag;
	public $slug;
	public $act;
	public $cod;
	public $ord;
	public $qt;
	public $q;
	public $pgn;

	public $uf;
	public $city;

	public $cat;
	public $scat;
	public $sscat;

	public $catn;
	public $scatn;
	public $sscatn;

	public $dominio;
	public $referer;

	public $cid = 0;
	public $sid = 0;
	public $ssid = 0;

	public $pga;
	public $pgb;
	public $pgc;
	public $pgd;
	public $pge;
	public $loc;

	public $pftit = 'Ibbl';
	public $pftitm = 'Ibbl';
	public $tit = '';
	public $lay = 'default';
	public $AJAX = 'ajax/';
	public $LAYOUT = 'layout/';
	public $VIEW = 'view/';
	public $CONTROLLER = 'controller/';
	public $imgPrimaria = 'img/logo.png';
	public $onde = array('./'=>'Home');

	public $css = array('css/css.css','css/jbr.admin-1.0.0.css');
	public $css2 = array('');

	//public $js = array('js/jquery-1.8.1.min.js');
	public $js = array('');
	public $jsl = array('');
	public $ijs = array('');
	public $ijsl = array('');
	public $titpg = '';
	public $titpg2 = '';
	public $titpg3 = '';

	//PAYPAL
	public $token;
	public $sandbox;
 	public $sandboxUser;
	public $sandboxPass;
	public $sandboxSign;
	public $prodUser;
	public $prodPass;
	public $prodSign;
	//PAYPAL

	//IMPOSTO
	public $val_imposto_deposito;
	public $val_imposto_boleto;
	public $val_imposto_paypal;
	public $linha;
	//IMPOSTO

//TOKEN API DATAS
	public $tokenApiData = '';
//TOKEN API DATAS

//VALIDATION
	public $errorMessages = [
		'notEmpty' => '{{name}} é obrigatório',
		'email' => 'E-mail inválido.',
		'cep' => 'CEP inválido.',
		'length' => 'Custom length message.',
		'alnum' => 'Custom alnum message.',
		'cpf' => 'CPF inválido.',
		'cnpj' => 'CNPJ inválido.',
		'date' => 'Data inválida.',
		'intVal' => 'O campo {{name}} deve ser inteiro.',
		'hexRgbColor' => 'O campo {{name}} precisa ser RGB hexadecimal.',
	];
//VALIDATION

	function __construct(){
		$this->ip = $_SERVER['REMOTE_ADDR'];
		$this->tit = $this->pftit;
		$this->_pg = $this->pg;
		$this->_spg = $this->spg;
		$this->pg = str_replace('\/','',strgs('pg',1));
		$this->spg = str_replace('\/','',strgs('spg',1));
		if(!$this->pg)$this->pg = 'home';
		if(!$this->spg)$this->spg = 'home';

		$this->id = strg('id',3);
		$this->tag = strgs('tag',1);
		$this->slug = strgs('slug',1);
		$this->token = strgs('token',1);
		$this->act = strgs('act',1);
		$this->cod = strgs('cod');
		$this->ord = strgs('ord',1);
		$this->qt = strg('qt',3);
		$this->q = strgs('q',0,0,0,0,0);
		$this->pgn = strg('pgn',3);

		$this->uf = strgs('uf',1);
		$this->city = strgs('city',1);

		$this->cat = strgs('cat',1);
		$this->scat = strgs('scat',1);
		$this->sscat = strgs('sscat',1);

		$this->dominio = strg('dominio',1);
		$this->referer = strg('referer',1);

		$this->idu = $_SESSION['idu'];
		$this->idc = $_SESSION['idc'];
		$this->tipo = $_SESSION['tipo'];
		$this->user = $_SESSION['user'];
		$this->nome = $_SESSION['nome'];
		$this->email = $_SESSION['email'];
		$this->tipoAdm = $_SESSION['tipoAdm'];
		$this->userAdm = $_SESSION['userAdm'];
		$this->nomeAdm = $_SESSION['nomeAdm'];
		$this->emailAdm = $_SESSION['emailAdm'];
		$this->timeoutAdm = $_SESSION['timeoutAdm'];
		$this->timeoutCli = $_SESSION['timeoutCli'];
		$this->cli = $_SESSION['cli'];
		$this->end = $_SESSION['end'];
		$this->alu = $_SESSION['alu'];
		$this->envio = $_SESSION['envio'];
		$this->pagamento = $_SESSION['pagamento'];
		$this->fb_access_token = $_SESSION['fb_access_token'];
		if(!$this->idu&&!is_numeric($this->idu))$this->logoutAdm();
		if(!$this->idc&&!is_numeric($this->idc))$this->logoutCli();
		if(!$this->idc&&!is_numeric($this->idc))$this->logout();

		if(!is_array($_SESSION['carrinho']))$_SESSION['carrinho'] = array();

		$this->_lang = strgs('lang',1);
		if($_k=array_search($this->_lang,$this->_langs))$this->lang = $_k;
		$this->_lang = $this->_langs[$this->lang];
		if($this->lang!=1){
			$this->lay = $this->_lang;
			$this->AJAX .= $this->_lang.'/';
			$this->LAYOUT .= $this->_lang.'/';
			$this->VIEW .= $this->_lang.'/';
			$this->CONTROLLER .= $this->_lang.'/';
			$this->langp .= $this->_lang.'/';
		}
		$this->admin->pages = array(
			'home'=>'Home',
			'blog'=>'Blog',
			'obrigado'=>'Obrigado',
		);

		//$this->ps->frete = new PgsFrete();

		$this->ps->envio = array(
			0=>'',
			1=>'PAC',
			2=>'SEDEX',
			//3=>'E-SEDEX'
		);
		$this->ps->sttPedido = array(
			0=>'',
			1=>'Aguardando pagamento',
			2=>'Pedido feito',
			3=>'Pagamento OK',
			4=>'Separando em estoque',
			5=>'Pronto para enviar',
			6=>'Enviando',
			7=>'Entregue',
			8=>'Voltou',
			9=>'Cancelado',
			10=>'Negado'
		);
		$this->ps->stt = array(
			0=>'',
			1=>'Aguardando pagamento',
			2=>'Em análise',
			3=>'Pago',
			4=>'Disponível',
			5=>'Em disputa',
			6=>'Devolvido',
			7=>'Cancelado'
		);
		$this->ps->tipo = array(
			0=>'',
			1=>'Cartão de crédito',
			2=>'Boleto',
			3=>'Débito online (TEF)',
			4=>'Saldo PagSeguro',
			5=>'Oi Paggo'
		);
		$this->ps->meio = array(
			0=>'',
			101=>'Cartão de crédito Visa',
			102=>'Cartão de crédito MasterCard',
			103=>'Cartão de crédito American Express',
			104=>'Cartão de crédito Diners',
			105=>'Cartão de crédito Hipercard',
			106=>'Cartão de crédito Aura',
			107=>'Cartão de crédito Elo',
			108=>'Cartão de crédito PLENOCard',
			109=>'Cartão de crédito PersonalCard',
			110=>'Cartão de crédito JCB',
			111=>'Cartão de crédito Discover',
			112=>'Cartão de crédito BrasilCard',
			113=>'Cartão de crédito FORTBRASIL',
			201=>'Boleto Bradesco',
			202=>'Boleto Santander',
			301=>'Débito online Bradesco',
			302=>'Débito online Itaú',
			303=>'Débito online Unibanco',
			304=>'Débito online Banco do Brasil',
			305=>'Débito online Banco Real',
			306=>'Débito online Banrisul',
			307=>'Débito online HSBC',
			401=>'Saldo PagSeguro',
			501=>'Oi Paggo'
		);
	}
// '+key' multiple: [<meta name="$key" content="$val[$i]">,...]
	// ' key' escape: <meta name="$key" content="$val">
	// 'key&prop1&prop2...' escape: <meta name="$key" content="$val[0]" $prop1="$val[1]" $prop2="$val[2]" ...>

	// 'key' or '+key' <meta name="$key" content="$val">
	// '@key' or '+@key' <meta name="$key" content="$val">
	// '/key' or '+/key' <link rel="$key" href="$val">
	public function printTags($tags){
		foreach($tags as $k=>$value){
			if(!$value)continue;
			if($k[0]==='+')$k = substr($k,1);
			else $value = array($value);

			$tag = 'meta';
			$prop = ['name','content'];
			$val = ['',''];

			if($k[0]===' '){
				$k = substr($k,1);
			}elseif($k[0]==='@'){
				$prop[0] = 'property';
				$k = substr($k,1);
			}elseif($k[0]==='/'){
				$tag = 'link';
				$prop[0] = 'rel';
				$prop[1] = 'href';
				$k = substr($k,1);
			}

			if($props=strpos($k,'&')!==false){
				$k = explode('&',$k);
				$val[0] = array_shift($k);
				foreach($k as $p)$prop[] = $p;
			}else $val[0] = $k;

			foreach($value as $v){
				if(!$v)continue;
				$val[1] = $props?$v[0]:$v;
				echo '<'.$tag;
				foreach($prop as $i=>$p){
					if($i>1)$val[$i] = $v[$i-1];
					if(!$p||!$val[$i])continue;
					echo ' '.$p.'="'.$val[$i].'"';
				}
				echo ">\r\n";
			}
		}
	}

	// '...' <meta name="..." content="">
	// '@...' <meta name="..." content="">
	// '/...' <link rel="..." href="">
	// '\...' escape: <meta name="..." content="">
	public function printSEO(){
		foreach ($this->seo as $k => $v) {
			if(!$v)continue;
			$tag = 'meta';
			$name = 'name';
			$val = 'content';

			if($k[0]==='\\'){
				$k = substr($k,1);
			}elseif($k[0]==='@'){
				$name = 'property';
				$k = substr($k,1);
			}elseif($k[0]==='/'){
				$tag = 'link';
				$name = 'rel';
				$val = 'href';
				$k = substr($k,1);
			}

			if(is_array($v)){
				foreach($v as $_v){
					if($_v)echo "<$tag $name=\"$k\" $val=\"$_v\"/>\r\n";
				}
			}else echo "<$tag $name=\"$k\" $val=\"$v\"/>\r\n";
		}
	}

	public function logoutAdm($p=0,$r=0){
		$this->idu = $_SESSION['idu'] = 0;
		$this->tipoAdm = $_SESSION['tipoAdm'] = 0;
		$this->userAdm = $_SESSION['userAdm'] = '';
		$this->nomeAdm = $_SESSION['nomeAdm'] = '';
		$this->emailAdm = $_SESSION['emailAdm'] = '';
		$this->timeoutAdm = $_SESSION['timeoutAdm'] = '';
		$this->loc($p,$r);
	}

	public function logout($p=0,$r=0){
		$this->idc = $_SESSION['idc'] = 0;
		$this->tipo = $_SESSION['tipo'] = 0;
		$this->user = $_SESSION['user'] = '';
		$this->nome = $_SESSION['nome'] = '';
		$this->email = $_SESSION['email'] = '';
		$this->end = $_SESSION['end'] = '';
		$this->loc($p,$r);
	}

	public function logoutCli($p=0,$r=0){
		$this->idc = $_SESSION['idc'] = 0;
		$this->tipo = $_SESSION['tipo'] = 0;
		$this->user = $_SESSION['user'] = '';
		$this->nome = $_SESSION['nome'] = '';
		$this->email = $_SESSION['email'] = '';
		$this->timeoutCli = $_SESSION['timeoutCli'] = '';
		$this->loc($p,$r);
	}

	public function initMySQL(){
		if($this->db->host&&$this->db->user&&$this->db->base){
			try{
				$this->b = new PDO("mysql:host={$this->db->host};dbname={$this->db->base}",$this->db->user,$this->db->pass);
				$this->b->exec('SET CHARACTER SET utf8');
				$this->b->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'ERRO PDO: '.$e->getMessage();
			}catch(Exception $e){
				echo 'ERRO GERAL: '.$e->getMessage();
			}
		}
		$this->base = $this->dom.$this->dir;
		$this->baseAdmin = $this->dom.$this->dirAdmin;
		$this->validar = new Validar;
		//$this->contador();
		//$this->loginCheck();
	}

	public function initFireBird(){
		if($this->db->host&&$this->db->user&&$this->db->base){
			try{
				$this->b = new PDO("firebird:dbname={$this->db->base};host={$this->db->host};charset=utf8",$this->db->user,$this->db->pass);
			}catch(PDOException $e){
				echo "<h4>Erro de Conexão: ".$e->getMessage()."</h4>";
				exit;
			}
		}
		$this->base = $this->dom.$this->dir;
		$this->baseAdmin = $this->dom.$this->dirAdmin;
		$this->validar = new Validar;
		//$this->contador();
		//$this->loginCheck();
		//$this->freteup(0);HABILITAR FRETE DEPOIS
	}

	public function initSqlServer(){
		if($this->db->host&&$this->db->base){
			try{
				$this->B = new PDO("sqlsrv:server={$this->db->host};Database={$this->db->base}",$this->db->user,$this->db->pass);
				$this->B->exec('SET CHARACTER SET utf8');
			}catch(PDOException $e){
				echo "<h4>Erro de Conexão: ".$e->getMessage()."</h4>";
				exit;
			}
		}
		$this->base = $this->dom.$this->dir;
		$this->baseAdmin = $this->dom.$this->dirAdmin;
		$this->validar = new Validar;
		//$this->contador();
		//$this->loginCheck();
		//$this->freteup(0);
	}

	// ------------------ Email
	public function send(&$c=0){
		if(!$c||!is_object($c))return false;
		if(!$c->login)$c->login = 0;
		foreach(array('login','from','to','cc','bcc','reply') as $v){
			if($c->$v===0)$c->$v = $this->mailU;
			if($c->$v===1)$c->$v = $this->mailC;
		}
		foreach(array('login'=>array('host','mail','pass','name','port','user','secure'),'from'=>array('mail','name','sender')) as $k=>$v){
			if(is_array($c->$k)){
				$f = $c->$k;
				unset($c->$k);
				foreach($v as $i=>$w){
					unset($a);
					if(isset($f[$i]))$a = $f[$i];
					if(isset($f[$w]))$a = $f[$w];
					if(isset($a))$c->$k->$w = $a;
				}
				unset($f);
			}
		}
		if(!isset($c->login->user))$c->login->user = $c->login->mail;
		if(!$c->from)$c->from = $c->login;
		if(!isset($c->from->sender))$c->from->sender = $c->from->mail;
		if(!$c->to)$c->to = $c->from;
		if(!$c->char)$c->char = 'UTF-8';
		if(!$c->lang)$c->lang = 'br';
		//require_once 'class/phpmailer-5.2/class.phpmailer.php';
		//require_once 'class/vendor/autoload.php';
		$mail = new PHPMailer();
		if(is_string($c->lang)&&$c->lang)$mail->SetLanguage($c->lang,'phpmailer/language/');
		if(is_string($c->char)&&$c->char)$mail->CharSet = $c->char;
		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
		if(is_string($c->secure)&&$c->secure)$mail->SMTPSecure = $c->secure; // 'ssl' por exemplo
		if(is_int($c->debug)&&$c->debug)$mail->SMTPDebug = $c->debug; // DEBUG
		if(is_string($c->login->host)&&$c->login->host)$mail->Host = $c->login->host; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host seudomínio)
		if(is_int($c->login->port))$mail->Port = $c->login->port; // Porta do servidor
		if(is_string($c->login->user)&&$c->login->user)$mail->Username = $c->login->user; // Usuário do servidor SMTP
		if(is_string($c->login->pass)&&$c->login->pass)$mail->Password = $c->login->pass; // Senha do servidor SMTP
		// Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		if(is_string($c->from->sender)&&$c->from->sender)$mail->Sender = $c->from->sender;
		if(is_string($c->from->mail)&&$c->from->mail)$mail->From = $c->from->mail; // Seu e-mail
		if(is_string($c->from->name)&&$c->from->name)$mail->FromName = $c->from->name; // Seu nome
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		// Define os destinatário(s), CC, BCC, Reply e anexo
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		foreach(array('to'=>'AddAddress','cc'=>'AddCC','bcc'=>'AddBCC','reply'=>'AddReplyTo','file'=>'AddAttachment') as $k=>$v){
			$tk = $k=='file'?$k:'mail';
			if(is_string($c->$k)||is_object($c->$k)||(is_array($c->$k)&&isset($c->$k[$tk])))$c->$k = array($c->$k);
			if(is_array($c->$k))foreach($c->$k as $w){
				$e = '';
				$n = '';
				if(is_string($w))$e = $w;
				if(is_array($w)){
					if(is_string($w[0]))$e = $w[0];
					if(is_string($w[1]))$n = $w[1];
					if(is_string($w[$tk]))$e = $w[$tk];
					if(is_string($w['name']))$n = $w['name'];
				}
				if(is_object($w)){
					if(is_string($w->$tk))$e = $w->$tk;
					if(is_string($w->name))$n = $w->name;
				}
				if($e)$mail->$v($e,$n);
			}
		}
		// Define os dados técnicos da Mensagem
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		if(is_int($c->priority))$mail->Priority = $c->priority; // Prioridade
		if(is_string($c->subject)&&$c->subject)$mail->Subject = $c->subject; // Assunto da mensagem
		if(is_string($c->html)&&$c->html)$mail->Body = $c->html;
		if(is_string($c->txt)&&$c->txt)$mail->AltBody = $c->txt; 
		return $mail->Send();
	}

	public function metatag($pg=0,$d=0,$h1=0,$t=0){
		$r->id = 0;
		if($pg&&(is_int($pg)||is_string($pg))){
			if(($rs=$this->b->query('select * from metatag where '.(is_int($pg)?"id=$pg":"pg='$pg'").' limit 1')->fetchObject())&&($r=$rs))$r->id += 0;
		}else return false;
		$r->up = $r->id?1:0;
		if(!$r->id&&(is_int($pg)||($d===0&&$h1===0&&$t===0)||!$this->b->exec("insert into metatag set dc=now(),pg='$pg'")||!($r->id=$this->b->lastInsertId())))return false;
		//if(($d===0||$d===$r->d&&$h1===0||$t===$r->t&&$t===0||$t===$r->t))return $r;
		if(($d===0||$d===$r->d)&&($h1===0||$h1===$r->h1)&&($t===0||$t===$r->t))return $r;
		$a = array();
		if(is_string($d))$a[] = "d='".strs($r->d=$d)."'";
		if(is_string($h1))$a[] = "h1='".strs($r->h1=$h1)."'";
		if(is_string($t))$a[] = "t='".strs($r->t=$t)."'";
		if(!count($a)||!($r->exec=$this->b->exec('update metatag set '.implode(',',$a)." where id={$r->id} limit 1")))return false;
		if($r->up)$this->b->exec("update metatag set da=now() where id={$r->id} limit 1");
		return $r;
	}

	public function pgs($p=0,$pg=0,$tit=0,$cnt=0){
		if($cnt===0){
			$cnt = $tit;
			$tit = $pg;
			$pg = $p;
		}
		if($r=$this->b->query('select * from paginas where '.(is_numeric($p)?"id=$p":"pg='$p'").' limit 1')->fetchObject()){
			$a = 0;
			$u = 0;
			if(is_string($pg)&&$pg!=$r->pg&&++$u&&++$a)$r->pg = $pg;
			if($tit!==0&&++$u&&$tit!=$r->tit&&++$a)$r->tit = $tit;
			if($cnt!==0&&++$u&&$cnt!=$r->cnt&&++$a)$r->cnt = $cnt;
			if($a){
				$r->update = 1;
				$r->exec = $this->b->exec("update paginas set pg='".strs($r->pg)."',tit='".strs($r->tit)."',cnt='".strs($r->cnt)."' where id={$r->id} limit 1");
			}elseif($u)$r->noup = 1;
			else $r->select = 1;
			return $r;
		}
		$q->pg = $pg?$pg:'';
		$q->tit = $tit?$tit:'';
		$q->cnt = $cnt?$cnt:'';
		if($q->pg){
			$q->insert = 1;
			$q->exec = $this->b->exec("insert into paginas values(null,'".strs($q->pg)."','".strs($q->tit)."','".strs($q->cnt)."')");
		}
		return $q;
	}

	public function adm($a=0,$b=0){
		if($a&&!$b){
			$b = $a;
			$a = 1;
		}
		if(!$a)$a = 1;
		if(!$b)$b = 100000;
		return $this->tipoAdm>=$a&&$this->tipoAdm<=$b;
	}

	public function usr(){
		return $this->tipo==5;
	}

	public function cli(){
		return $this->tipo==3;
	}

	public function alu(){
		return $this->tipo==3;
	}

	public function loc($p=0,$r=0){
		if(!$p&&!is_string($p)&&!$r)return;
		if($r===301)header('HTTP/1.1 301 Moved Permanently');
		if($r===404)header('HTTP/1.1 404 Not Found');
		if($p&&is_string($p)){
			$p = preg_match('/^(https?|ftp):\/\//',$p)?$p:$this->dir.$p;
			header('Location: '.$p);
		}
		exit;
	}

	public function locAdmin($p=0,$r=0){
		if(!$p&&!is_string($p)&&!$r)return;
		if($r===301)header('HTTP/1.1 301 Moved Permanently');
		if($r===404)header('HTTP/1.1 404 Not Found');
		if($p&&is_string($p)){
			$p = preg_match('/^(https?|ftp):\/\//',$p)?$p:$this->dirAdmin.$p;
			header('Location: '.$p);
		}
		exit;
	}

	public function locCliente($p=0,$r=0){
		if(!$p&&!is_string($p)&&!$r)return;
		if($r===301)header('HTTP/1.1 301 Moved Permanently');
		if($r===404)header('HTTP/1.1 404 Not Found');
		if($p&&is_string($p)){
			$p = preg_match('/^(https?|ftp):\/\//',$p)?$p:$this->dirCliente.$p;
			header('Location: '.$p);
		}
		exit;
	}

	public function upLink($end=0,$red=false,$r=0){
		$a = $this->pga;
		$b = $this->pgb;
		$n = $this->pgn;
		$this->loc = $a.($n>1?'/'.$n:'').$b;

		if($n>1)$this->seo['/prev'] = $this->base.$a.($n-1>1?'/'.($n-1):'').$b;
		if($n<$end)$this->seo['/next'] = $this->base.$a.($n+1>1?'/'.($n+1):'').$b;

		if($red)$this->loc($this->loc,$r);
	}

	public function addfile($i,$tmp=1){
		if(!is_string($tmp)&&!is_numeric($tmp))$tmp = 1;
		if($tmp===0)$tmp = 'class/tmp/';
		if($tmp===1)$tmp = 'tmp/';
		if($tmp===2)$tmp = 'img/';
		if($tmp===3)$tmp = 'img/tmp/';
		$tmp_name = $i['tmp_name'];
		$e = $i['error'];
		$s = $i['size'];
		$t = strs($i['type']);
		$n = $i['name'];
		$ex = '';
		$nm = $n;
		$w = 0;
		$h = 0;
		$n = strs($n,1);
		$this->b->exec("insert into jbr_file(m,d,e,s,dc,t,n)values(0,0,$e,$s,now(),'$t','$n')");
		$id = $this->b->lastInsertId();
		if(!$e){
			if(preg_match('/^(.*)\.([^\.]+)$/',$nm,$_m)){
				$nm = strs($_m[1],1);
				$ex = strs($_m[2],1);
			}else $nm = $n;
			$tn = tag($nm,1);
			$f = "$id.$ex";
			$tf = $tmp.$f;
			move_uploaded_file($tmp_name,$tf);
			if($get=@getimagesize($tf)){
				$w = $get[0];
				$h = $get[1];
			}
			$this->b->exec("update jbr_file set w=$w,h=$h,ex='$ex',nm='$nm',tn='$tn',f='$f',tf='$tf' where id=$id limit 1");
		}
		return $this->getfile($id);
	}

	public function getfile($id=0,$nm=1,$nd=1){
		if($id&&$rs=$this->b->query("select * from jbr_file where id=$id".($nm?' and m=0':'').($nd?' and d=0':'').' limit 1')->fetchObject())return $rs;
		return false;
	}

	public function delfile($id=0){
		if($rs=$this->getfile($id)){
			$f;
			$a = $rs->tf;
			$b = $rs->nf;
			if($a&&file_exists($a))$f = $a;
			if($b&&file_exists($b))$f = $b;
			if($rs->d||$this->b->exec("update jbr_file set d=1,dd=now() where id=$id limit 1")){
				if($f)@unlink($f);
				return true;
			}
		}
		return false;
	}

	public function movefile($id=0,$n=0,$nm=0,$nd=1){
		if($n&&is_string($n)&&$rs=$this->getfile($id,0)){
			$a = $rs->tf;
			$b = $rs->nf;
			if($b&&file_exists($b))$a = $b;
			if($a&&file_exists($a)){
				if($a===$n)return $rs;
				if(rename($a,$n)){
					$this->b->exec("update jbr_file set m=1,dm=now(),nf='$n' where id=$id limit 1");
					return $this->getfile($id,$nm,$nd);
				}
			}
		}
		return false;
	}

	public function getFotos($idp=0){
		$stf = $this->b->query("select i from produto_foto where idp=$idp");
		$array = array();
		while($rstf=$stf->fetch())array_push($array,$rstf["i"]);
		return $array;
	}
	public function getIdFotos($file_name){
		$rstf = $this->b->query("select id from produto_foto where i='$file_name' limit 1")->fetchObject();
		return $rstf->id;
	}
	public function deleteFotos($id=0){
		$rstf = $this->b->query("select i,it,itm from produto_foto where id=$id limit 1")->fetchObject();
		$P = 'upload/produtos/';
		$Pt = $P.'thumb/';
		if($rstf->i)@unlink($P.$rstf->i);
		if($rstf->it)@unlink($Pt.$rstf->it);
		if($rstf->itm)@unlink($Pt.$rstf->itm);
		$this->b->exec("delete from produto_foto where id=$id limit 1");
	}
	public function insertFotos($idp=0,$file_name){
		$this->b->exec("insert into produto_foto (idp,i) values ($idp,'$file_name')");
	}
	public function updateFotosIt($id=0,$it){
		$this->b->exec("update produto_foto set it='$it' where id=$id limit 1");
	}
	public function updateFotosItm($id=0,$itm){
		$this->b->exec("update produto_foto set itm='$itm' where id=$id limit 1");
	}
	public function cartDel($id=0,$idc=0){
		$rc = $this->b->query("select a.idc,c.id,c.i,c.editando,c.f,c.idd from cart_ax a inner join cart c on a.idc=c.id where a.id=$id and c.idu=$idc and c.s=1 limit 1")->fetchObject();
		$this->b->exec("delete from cart_ax where id=$id limit 1");
		$rt = $this->b->query("select sum(t) as tot ,count(*) as qp,sum(q) as qtd,sum(w) as peso from cart_ax where idc={$rc->id}")->fetchObject();
		$q = --$rc->i;
		$tot = $rt->tot?$rt->tot:'';
		$vtot = $rt->tot+$rc->f;
		$id_cupom = $rc->idd;

		if($id_cupom){
			$ru = $this->b->query("select * from cupom where id=$id_cupom limit 1")->fetchObject();
			if($ru->tipo_cupom=='produto'){
				$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom_ax u on a.idp=u.idp where a.idc='{$rc->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
			}elseif($ru->tipo_cupom=='produtos'){
				$cupom = $this->b->query("select sum(t) t from(select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom u on c.idd=u.id where a.idc='{$rc->id}' group by a.idp) t1")->fetchObject();
			}elseif($ru->tipo_cupom=='categoria'){
				$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join produto p on a.idp=p.id left join cat ca on p.idc=ca.id or p.idc2=ca.id left join cupom_ax u on ca.id=u.ida where a.idc='{$rc->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
			}
			if($ru->tipo_desconto=='porcentagem'){
				$des = ($cupom->t*$ru->dp)/100;
				$vtot = $vtot - $des;
			}else{
				if($ru->df>$cupom->t)$des = $cupom->t;
				else $des = $ru->df;
				$vtot = $vtot - $des;
			}
		}
	
		if($tot)$this->b->exec("update cart set v='$tot',t='$vtot',vd='$des',da=now(),i='{$rt->qp}',q='{$rt->qtd}',w='{$rt->peso}' where id={$rc->id}");
		else{
			if($rc->editando==1)$this->b->exec("update cart set v=0,t=0,da=now(),i=0,q=0,w=0,f=0,imposto=0 where id={$rc->id}");
			else $this->b->exec("delete from cart where id={$rc->id} limit 1");
		}
		$this->shopping->m = 'Produto removido do <a href="carrinho">carrinho</a> com sucesso!';
		$this->shopping->ok = 1;
		$this->shopping->q = $q;
		$this->shopping->tot = nreal($rt->tot);
		$this->shopping->vtot = nreal($vtot);
		$this->shopping->peso = $rt->peso;
		$this->shopping->des = nreal($des);
		return $this->shopping;
	}
	public function cartDelTemp($id=0,$ck){
		$rc = $this->b->query("select a.idc,c.id,c.i from cart_ax_temp a inner join cart_temp c on a.idc=c.id where a.id=$id and c.cookie='$ck' and c.s=1 limit 1")->fetchObject();
		$this->b->exec("delete from cart_ax_temp where id=$id limit 1");
		$rt = $this->b->query("select sum(t) as tot ,count(*) as qp,sum(q) as qtd,sum(w) as peso from cart_ax_temp where idc={$rc->id}")->fetchObject();
		$q = --$rc->i;
		$tot = $rt->tot?$rt->tot:'';
		$vtot = $rt->tot;
	
		if($tot)$this->b->exec("update cart_temp set v='$tot',t='$vtot',da=now(),i='{$rt->qp}',q='{$rt->qtd}',w='{$rt->peso}' where id={$rc->id}");
		else $this->b->exec("delete from cart_temp where id={$rc->id} limit 1");
		$this->shopping->m = 'Produto removido do <a href="carrinho">carrinho</a> com sucesso!';
		$this->shopping->ok = 1;
		$this->shopping->q = $q;
		$this->shopping->tot = nreal($rt->tot);
		$this->shopping->vtot = nreal($vtot);
		$this->shopping->peso = $rt->peso;
		$this->shopping->des = nreal($des);
		return $this->shopping;
	}
	public function cartUpd($id=0,$qt=0,$idc=0,$peso=0,$prefix=''){
		// $rq = $this->b->query("select estoque from produto where id=$id limit 1")->fetchObject();
		// if($rq->estoque<=0)$this->shopping->m = "Produto indisponível!";
		// elseif($qt>$rq->estoque)$this->shopping->m = 'No momento temos apenas '.$rq->estoque.' unidade'.($rq->estoque>1?'s':'').' em nosso estoque!';
		// else{
		unset($prefix);
		if(true){
			$ra = $this->b->query("select * from cart_ax$prefix where idp=$id and idc=$idc limit 1")->fetchObject();
			$t = $qt*$ra->v;
			$peso = $qt * $peso;
			$this->b->exec("update cart_ax$prefix set q=$qt,t='$t',w='$peso' where id='{$ra->id}'");
			$rt = $this->b->query("select sum(t) as stot,sum(w) as peso from cart_ax$prefix where idc=$idc")->fetchObject();
			$vtot = $rt->stot;
	
			$this->b->exec("update cart$prefix set v='{$rt->stot}',t='$vtot',w='{$rt->peso}',da=now() where id=$idc");
			if(!$prefix){
				$rc = $this->b->query("select id,idd from cart where id=$idc limit 1")->fetchObject();
				$id_cupom = $rc->idd;
				if($id_cupom){
					$ru = $this->b->query("select * from cupom where id=$id_cupom limit 1")->fetchObject();
					if($ru->tipo_cupom=='produto'){
						$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom_ax u on a.idp=u.idp where a.idc='{$rc->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
					}elseif($ru->tipo_cupom=='produtos'){
						$cupom = $this->b->query("select sum(t) t from(select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom u on c.idd=u.id where a.idc='{$rc->id}' group by a.idp) t1")->fetchObject();
					}elseif($ru->tipo_cupom=='categoria'){
						$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join produto p on a.idp=p.id left join cat ca on p.idc=ca.id or p.idc2=ca.id left join cupom_ax u on ca.id=u.ida where a.idc='{$rc->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
					}
					if($ru->tipo_desconto=='porcentagem'){
						$des = ($cupom->t*$ru->dp)/100;
						$vtot = $vtot - $des;
					}else{
						if($ru->df>$cupom->t)$des = $cupom->t;
						else $des = $ru->df;
						$vtot = $vtot - $des;
					}
					$this->b->exec("update cart set t='$vtot',vd='$des',da=now() where id=$idc");
				}
			}
			$this->shopping->ok = 1;
			$this->shopping->m = 'Carrinho atualizado com sucesso!';
			$this->shopping->t = nreal($t);
			$this->shopping->tot = nreal($rt->stot);
			$this->shopping->vtot = nreal($vtot);
			$this->shopping->peso = $rt->peso;
		}
		return $this->shopping;
	}
	public function cartIns($id=0,$qt=0,$idc=0){
		$sp = $this->b->query("select * from cart where idu=$idc and s=1 order by id desc");
		$rq = $this->b->query("select peso w,v,c cod,estoque from produto where id=$id limit 1")->fetchObject();
		$cod = addslashes($rq->cod);
		$preco_prod = $rq->v;
		
		if(!$qt)$this->shopping->m = "Selecione a quantidade!";
		elseif($rq->estoque<=0)$this->shopping->m = "Produto indisponível!";
		elseif($qt>$rq->estoque)$this->shopping->m = 'No momento temos apenas '.$rq->estoque.' unidade'.($rq->estoque>1?'s':'').' em nosso estoque!';
		else{
			$rc = $this->b->query("select *,rua,cep,city,num,bairro,uf,comp from cliente where id=$idc")->fetchObject();
			if(!$sp->rowCount()){
				$cli_n = addslashes($rc->n?$rc->n:$rc->r);
				$cli_rua = addslashes($rc->rua);
				$cli_num = addslashes($rc->num);
				$cli_comp = addslashes($rc->comp);
				$cli_bairro = addslashes($rc->bairro);
				$cli_cep = addslashes($rc->cep);
				$cli_city = addslashes($rc->city);
				$cli_uf = addslashes($rc->uf);
				$cli_t1 = addslashes($rc->t1);
				$this->b->exec("insert into cart set dc=now(),idu=$idc,q=1,n='$cli_n',rua='$cli_rua',num='$cli_num',comp='$cli_comp',bairro='$cli_bairro',cep='$cli_cep',city='$cli_city',uf='$cli_uf',t1='$cli_t1'");
				$idc = $this->b->lastInsertId();
			}
			else{
				$rp = $sp->fetchObject();
				$idc = $rp->id;
			}
			if($id){
				$ra = $this->b->query("select * from cart_ax where idp=$id and idc=$idc limit 1")->fetchObject();
				if($qt&&$ra->idp==$id)$this->shopping->m = 'Erro: Produto já adicionado no carrinho, se deseja alterar a quantidade vá para a página do <a href="carrinho">carrinho</a>!';
				elseif($qt){
					$prod = $this->b->query("select id,h1 n,t from produto where id=$id limit 1")->fetchObject();
					$peso = $qt * $rq->w;
					$total = $qt * $preco_prod;
					if($this->b->exec("insert into cart_ax set idc=$idc,idp=$id,q=$qt,v='$preco_prod',t='$total',p='$rq->w',w='$peso',pc='$cod'"))$ida = $this->b->lastInsertId();

					$rt = $this->b->query("select sum(t) as tot,count(*) as qp,sum(q) as qtd,sum(w) as peso from cart_ax where idc=$idc")->fetchObject();
					$q = $rt->qp;		
	
					$vtot = $rt->tot;

					$rcupom = $this->b->query("select id,idd from cart where id=$idc limit 1")->fetchObject();
					$id_cupom = $rcupom->idd;
					if($id_cupom){
						$ru = $this->b->query("select * from cupom where id=$id_cupom limit 1")->fetchObject();
						if($ru->tipo_cupom=='produto'){
							$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom_ax u on a.idp=u.idp where a.idc='{$rcupom->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
						}elseif($ru->tipo_cupom=='produtos'){
							$cupom = $this->b->query("select sum(t) t from(select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom u on c.idd=u.id where a.idc='{$rcupom->id}' group by a.idp) t1")->fetchObject();
						}elseif($ru->tipo_cupom=='categoria'){
							$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join produto p on a.idp=p.id left join cat ca on p.idc=ca.id or p.idc2=ca.id left join cupom_ax u on ca.id=u.ida where a.idc='{$rcupom->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
						}
						if($ru->tipo_desconto=='porcentagem'){
							$des = ($cupom->t*$ru->dp)/100;
							$vtot = $vtot - $des;
						}else{
							if($ru->df>$cupom->t)$des = $cupom->t;
							else $des = $ru->df;
							$vtot = $vtot - $des;
						}
					}
	
					$rp = $this->b->query("select * from cart where idu=$idc and id=$idc limit 1")->fetchObject();
					$this->b->exec($this->shopping->ups="update cart set da=now(),v='{$rt->tot}',t='$vtot',vd='$des',i='$q',q='{$rt->qtd}',w='{$rt->peso}' where id=$idc");
					$this->shopping->m = '<span>Sucesso:</span> Você adicionou <a href="produto/'.$prod->id.'/'.$prod->t.'">'.$prod->n.'</a> ao <a href="carrinho" class="link-carrinho">Carrinho</a>!';
					$this->shopping->ok = 1;
					$this->shopping->q = $q;
					$this->shopping->qt = $qt;
					$this->shopping->tot = nreal($rt->tot);
					$this->shopping->vtot = nreal($vtot);
					$this->shopping->peso = $rt->peso;
					$this->shopping->ida = $ida;
					$this->shopping->idp = $id;
					$rface = $this->b->query("select h1 n,v from produto where id=$id limit 1")->fetchObject();
					$face_n = addslashes($rface->n);
					//$face_cn = addslashes($rface->cn);//SE TVER CATEGORIA
					$face_val = $rface->v;
					$this->shopping->n = "'$face_n'";
					$this->shopping->cn = "'$face_cn'";
					$this->shopping->v = number_format($face_val,2,'.','');
				}
			}
		}
		return $this->shopping;
	}
	public function cartInsTemp($id=0,$qt=0,$ck){
		$sp = $this->b->query("select * from cart_temp where cookie='$ck' order by id desc");
		$rq = $this->b->query("select peso w,v,c cod,estoque from produto where id=$id limit 1")->fetchObject();
		$cod = addslashes($rq->cod);
		$preco_prod = $rq->v;
		
		if(!$qt)$this->shopping->m = "Selecione a quantidade!";
		elseif($rq->estoque<=0)$this->shopping->m = "Produto indisponível!";
		elseif($qt>$rq->estoque)$this->shopping->m = 'No momento temos apenas '.$rq->estoque.' unidade'.($rq->estoque>1?'s':'').' em nosso estoque!';
		else{
			if(!$sp->rowCount()){
				$this->b->exec("insert into cart_temp set dc=now(),cookie='$ck',q=1");
				$idc = $this->b->lastInsertId();
			}
			else{
				$rp = $sp->fetchObject();
				$idc = $rp->id;
			}
			if($id){
				$ra = $this->b->query("select * from cart_ax_temp where idp=$id and idc=$idc limit 1")->fetchObject();
				if($qt&&$ra->idp==$id)$this->shopping->m = 'Erro: Produto já adicionado no carrinho, se deseja alterar a quantidade vá para a página do <a href="carrinho">carrinho</a>!';
				elseif($qt){
					$prod = $this->b->query("select id,h1 n,t from produto where id=$id limit 1")->fetchObject();
					$peso = $qt * $rq->w;
					$total = $qt * $preco_prod;
					if($this->b->exec("insert into cart_ax_temp set idc=$idc,idp=$id,q=$qt,v='$preco_prod',t='$total',p='$rq->w',w='$peso',pc='$cod'"))$ida = $this->b->lastInsertId();
					$rt = $this->b->query("select sum(t) as tot,count(*) as qp,sum(q) as qtd,sum(w) as peso from cart_ax_temp where idc=$idc")->fetchObject();
					$q = $rt->qp;		
	
					$vtot = $rt->tot;
					$id_cupom = $rc->idd;

					if($id_cupom){
						$ru = $this->b->query("select * from cupom where id=$id_cupom limit 1")->fetchObject();
						if($ru->tipo_cupom=='produto'){
							$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom_ax u on a.idp=u.idp where a.idc='{$rc->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
						}elseif($ru->tipo_cupom=='produtos'){
							$cupom = $this->b->query("select sum(t) t from(select a.t t from cart_ax a left join cart c on a.idc=c.id left join cupom u on c.idd=u.id where a.idc='{$rc->id}' group by a.idp) t1")->fetchObject();
						}elseif($ru->tipo_cupom=='categoria'){
							$cupom = $this->b->query("select sum(t) t from (select a.t t from cart_ax a left join cart c on a.idc=c.id left join produto p on a.idp=p.id left join cat ca on p.idc=ca.id or p.idc2=ca.id left join cupom_ax u on ca.id=u.ida where a.idc='{$rc->id}' and u.idc='{$ru->id}' group by a.idp) t1")->fetchObject();
						}
						if($ru->tipo_desconto=='porcentagem'){
							$des = ($cupom->t*$ru->dp)/100;
							$vtot = $vtot - $des;
						}else{
							if($ru->df>$cupom->t)$des = $cupom->t;
							else $des = $ru->df;
							$vtot = $vtot - $des;
						}
					}
	
					$this->b->exec("update cart_temp set da=now(),v='{$rt->tot}',t='{$rt->tot}',i='{$rt->qp}',q='$q',w='{$rt->peso}' where id=$idc");
					$this->shopping->m = '<span>Sucesso:</span> Você adicionou <a href="produto/'.$prod->id.'/'.$prod->t.'">'.$prod->n.'</a> ao <a href="carrinho" class="link-carrinho">Carrinho</a>!';
					$this->shopping->ok = 1;
					$this->shopping->q = $q;
					$this->shopping->qt = $qt;
					$this->shopping->tot = nreal($rt->tot);
					$this->shopping->vtot = nreal($vtot);
					$this->shopping->peso = $rt->peso;
					$this->shopping->ida = $ida;
					$this->shopping->idp = $id;
					$rface = $this->b->query("select h1 n,v from produto where id=$id limit 1")->fetchObject();
					$face_n = addslashes($rface->n);
					//$face_cn = addslashes($rface->cn);//SE TVER CATEGORIA
					$face_val = $rface->v;
					$this->shopping->n = "'$face_n'";
					$this->shopping->cn = "'$face_cn'";
					$this->shopping->v = number_format($face_val,2,'.','');
				}
			}
		}
		return $this->shopping;
	}
	public function fetchInstagram($url){
		$userid = '3448701584';
		$accessToken = "3448701584.025fbed.ae40a098dc41464f806605f7629e037e";
		$url = "https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result);
		$r = array_slice($result->data,0,10);//LIMIT PHOTOS
		return $r;
	}
	public function postLinkedin($id){
		$API_CONSUMER_KEY = "783cxfysz4ps9q";
		$API_CONSUMER_SECRET = "8cO0PDhWIbyd9X8K";

		$url = "https://www.sharkpro.com.br/linkedin";
		//https://github.com/ashwinks/PHP-LinkedIn-SDK
		$li = new LinkedIn(
			array(
				'api_key' => $API_CONSUMER_KEY, 
				'api_secret' => $API_CONSUMER_SECRET, 
				'callback_url' => $url
			)
		);
		
		$parts = parse_url($_SERVER[REQUEST_URI]);
		parse_str($parts['code'], $query);
		$code = str_replace('code=','',$parts['query']);
		
		if(!$code){
			$url = $li->getLoginUrl(
				array(
					LinkedIn::SCOPE_BASIC_PROFILE,
					LinkedIn::SCOPE_WRITE_SHARE
				)
			);
			$s->loc($url);
		}else{
			$chars = preg_split('/&/',$code);
			$code = $chars[0];
			$state = str_replace('state=','',$chars[1]);
			$token = $li->getAccessToken($code);
			//echo 'TOKEN: '.$token;
			
			$info = $li->get('/people/~:(first-name,last-name,positions)');
			/*echo "<pre>";
			print_r($info);
			echo "</pre>";*/
		
			$dados['comment'] = $rs->tagd;
			$dados['content']['description'] = $rs->tagd;
			$dados['content']['title'] = $rs->tagt;
			$dados['content']['submitted-url'] = "https://developer.linkedin.com";
			$dados['content']['submitted-image-url'] = $s->base.'upload/blogs/thumb/'.($rs->it?$rs->it:'default.png');
			$dados['visibility']['code'] = "anyone";
			$json = json_encode($dados);
			/*echo "<pre>";
			print_r($json);
			echo "</pre>";*/
			$post = $li->post("/people/~/shares?scope=w_share&format=json",$dados);
		}
	}
	public function googleShopping($arquivo=0,$desconto=0){
		$lc = $this->dom;
		if(!$arquivo)$arquivo = 'google-shopping.xml';
		else{
			$ext = substr($arquivo,-4);
			if($ext!='.xml')$arquivo = $arquivo.'.xml';
		}

		$escrever = fopen($arquivo, "w");

		@fwrite($escrever,"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<rss version=\"2.0\" xmlns:g=\"http://base.google.com/ns/1.0\">\n\t<channel>\n\t\t<title>Shark Pro</title>\n\t\t<link>https://www.sharkpro.com.br/</link>\n\t\t<description>Shark Pro</description>");

		$st = $this->b->query("select p.h1,p.id,p.t,p.obs d,p.ref,p.v,p.estoque,c.h1 cn,f.i from produto p left join cat c on p.idc=c.id inner join fotos f on p.id=f.idp and f.tipo='produto' and f.principal where p.s and p.googleShopping group by p.id");
		while($rs=$st->fetchObject()){
			$maxLength = 150;
			if(strlen($rs->h1)>$maxLength){
				$stringCut = substr($rs->h1,0,$maxLength);
				$n = substr($stringCut,0,strrpos($stringCut,' '));
			}else $n = $rs->h1;

			//$val = $rs->promocao&&$rs->v?nreal($rs->v):nreal($rs->old);
			//$val = nreal($val-($val*$desconto)/100);
			$val = nreal($rs->v);
			$stock = $rs->estoque<=0?'out of stock':'in stock';
			$desc = $rs->d&&$rs->d!=' '?$rs->d:$n;
			$xml = "\n\t\t<item>\n\t\t\t<g:id>".strh($rs->id)."</g:id>";
			$xml .= "\n\t\t\t<title>".strh($n)."</title>";
			$xml .= "\n\t\t\t<description>".strh($desc)."</description>";
			$xml .= "\n\t\t\t<g:google_product_category>525</g:google_product_category>";
			$xml .= "\n\t\t\t<link>".$lc."/".strh($rs->t)."</link>";
			$xml .= "\n\t\t\t<g:image_link>".$lc."/upload/produtos/".strh($rs->i)."</g:image_link>";
			$xml .= "\n\t\t\t<g:condition>new</g:condition>";
			$xml .= "\n\t\t\t<g:availability>".$stock."</g:availability>";
			$xml .= "\n\t\t\t<g:price>".$val." BRL</g:price>";
			$xml .= "\n\t\t\t<g:brand>Shark Pro</g:brand>\n\t\t</item>";
			//$xml .= "\n\t\t\t<g:mpn>".strh($rs->ref)."</g:mpn>\n\t\t</item>";

			@fwrite($escrever,$xml); 
		}
		@fwrite($escrever,"\n\t</channel>\n</rss>");
		fclose($ponteiro);
	}
	public function facebookShopping($arquivo=0,$desconto=0){
		$lc = $this->dom;
		if(!$arquivo)$arquivo = 'facebook-shopping.xml';
		else{
			$ext = substr($arquivo,-4);
			if($ext!='.xml')$arquivo = $arquivo.'.xml';
		}

		$escrever = fopen($arquivo, "w");

		@fwrite($escrever,"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<rss version=\"2.0\">\n\t<channel>");

		$st = $this->b->query("select p.h1,p.id,p.t,p.tagd d,p.ref,p.v,p.estoque,c.h1 cn,f.i from produto p left join cat c on p.idc=c.id inner join fotos f on p.id=f.idp and f.tipo='produto' and f.principal where p.s and p.facebookShopping group by p.id");
		while($rs=$st->fetchObject()){
			$maxLength = 70;
			if(strlen($rs->h1)>$maxLength){
				$stringCut = substr($rs->h1,0,$maxLength);
				$n = substr($stringCut,0,strrpos($stringCut,' '));
			}else $n = $rs->h1;

			//$val = $rs->promocao&&$rs->v?nreal($rs->v):nreal($rs->old);
			//$val = nreal($val-($val*$desconto)/100);
			$val = nreal($rs->v);
			$stock = $rs->estoque<=0?'out of stock':'in stock';
			$desc = $rs->d&&$rs->d!=' '?$rs->d:$n;
			$xml = "\n\t\t<item>\n\t\t\t<id>".strh($rs->id)."</id>";
			$xml .= "\n\t\t\t<title>".strh($n)."</title>";
			$xml .= "\n\t\t\t<description>".strh($desc)."</description>";
			$xml .= "\n\t\t\t<link>".$lc."/".strh($rs->t)."</link>";
			$xml .= "\n\t\t\t<image_link>".$lc."/upload/produtos/".strh($rs->i)."</image_link>";
			$xml .= "\n\t\t\t<condition>new</condition>";
			$xml .= "\n\t\t\t<availability>".$stock."</availability>";
			$xml .= "\n\t\t\t<price>".$val." BRL</price>";
			$xml .= "\n\t\t\t<brand>Shark Pro</brand>";
			$xml .= "\n\t\t\t<product_type>".$rs->cn."</product_type>";
			$xml .= "\n\t\t\t<google_product_category>525</google_product_category>\n\t\t</item>";

			@fwrite($escrever,$xml); 
		}
		@fwrite($escrever,"\n\t</channel>\n</rss>");
		fclose($ponteiro);
	}
	public function googleShoppingGrupo($arquivo=0,$desconto=0){
		$lc = $this->dom;
		if(!$arquivo)$arquivo = 'google-shopping.xml';
		else{
			$ext = substr($arquivo,-4);
			if($ext!='.xml')$arquivo = $arquivo.'.xml';
		}

		$escrever = fopen($arquivo, "w");

		@fwrite($escrever,"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<rss version=\"2.0\" xmlns:g=\"http://base.google.com/ns/1.0\">\n\t<channel>\n\t\t<title>Shark Pro</title>\n\t\t<link>https://www.sharkpro.com.br/</link>\n\t\t<description>Shark Pro</description>");

		$st = $this->b->query("select p.*,g.t,g.n as h1,c.h1 cn,f.i from produto p inner join grupo_ax ag on p.id=ag.id_produto and ag.principal inner join grupoProduto g on ag.id_grupo=g.id inner join fotos f on p.id=f.idp and f.tipo='produto' and f.principal left join cat c on p.idc=c.id where p.s and p.googleShopping group by p.id");
		while($rs=$st->fetchObject()){
			$maxLength = 150;
			if(strlen($rs->h1)>$maxLength){
				$stringCut = substr($rs->h1,0,$maxLength);
				$n = substr($stringCut,0,strrpos($stringCut,' '));
			}else $n = $rs->h1;

			//$val = $rs->promocao&&$rs->v?nreal($rs->v):nreal($rs->old);
			//$val = nreal($val-($val*$desconto)/100);
			$val = nreal($rs->v);
			$stock = $rs->estoque<=0?'out of stock':'in stock';
			$desc = $rs->obs&&$rs->obs!=' '?$rs->obs:$n;
			$xml = "\n\t\t<item>\n\t\t\t<g:id>".strh($rs->id)."</g:id>";
			$xml .= "\n\t\t\t<title>".strh($n)."</title>";
			$xml .= "\n\t\t\t<description>".strh($desc)."</description>";
			$xml .= "\n\t\t\t<g:google_product_category>525</g:google_product_category>";
			$xml .= "\n\t\t\t<link>".$lc."/".strh($rs->t)."</link>";
			$xml .= "\n\t\t\t<g:image_link>".$lc."/upload/produtos/".strh($rs->i)."</g:image_link>";
			$xml .= "\n\t\t\t<g:condition>new</g:condition>";
			$xml .= "\n\t\t\t<g:availability>".$stock."</g:availability>";
			$xml .= "\n\t\t\t<g:price>".$val." BRL</g:price>";
			$xml .= "\n\t\t\t<g:brand>Shark Pro</g:brand>\n\t\t</item>";
			//$xml .= "\n\t\t\t<g:mpn>".strh($rs->ref)."</g:mpn>\n\t\t</item>";

			@fwrite($escrever,$xml); 
		}
		@fwrite($escrever,"\n\t</channel>\n</rss>");
		fclose($ponteiro);
	}
	public function facebookShoppingGrupo($arquivo=0,$desconto=0){
		$lc = $this->dom;
		if(!$arquivo)$arquivo = 'facebook-shopping.xml';
		else{
			$ext = substr($arquivo,-4);
			if($ext!='.xml')$arquivo = $arquivo.'.xml';
		}

		$escrever = fopen($arquivo, "w");

		@fwrite($escrever,"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<rss version=\"2.0\">\n\t<channel>");

		$st = $this->b->query("select p.*,g.t,g.n as h1,c.h1 cn,f.i from produto p inner join grupo_ax ag on p.id=ag.id_produto and ag.principal inner join grupoProduto g on ag.id_grupo=g.id inner join fotos f on p.id=f.idp and f.tipo='produto' and f.principal left join cat c on p.idc=c.id where p.s and p.facebookShopping group by p.id");
		while($rs=$st->fetchObject()){
			$maxLength = 70;
			if(strlen($rs->h1)>$maxLength){
				$stringCut = substr($rs->h1,0,$maxLength);
				$n = substr($stringCut,0,strrpos($stringCut,' '));
			}else $n = $rs->h1;

			//$val = $rs->promocao&&$rs->v?nreal($rs->v):nreal($rs->old);
			//$val = nreal($val-($val*$desconto)/100);
			$val = nreal($rs->v);
			$stock = $rs->estoque<=0?'out of stock':'in stock';
			$desc = $rs->obs&&$rs->obs!=' '?$rs->obs:$n;
			$xml = "\n\t\t<item>\n\t\t\t<id>".strh($rs->id)."</id>";
			$xml .= "\n\t\t\t<title>".strh($n)."</title>";
			$xml .= "\n\t\t\t<description>".strh($desc)."</description>";
			$xml .= "\n\t\t\t<link>".$lc."/".strh($rs->t)."</link>";
			$xml .= "\n\t\t\t<image_link>".$lc."/upload/produtos/".strh($rs->i)."</image_link>";
			$xml .= "\n\t\t\t<condition>new</condition>";
			$xml .= "\n\t\t\t<availability>".$stock."</availability>";
			$xml .= "\n\t\t\t<price>".$val." BRL</price>";
			$xml .= "\n\t\t\t<brand>Shark Pro</brand>";
			$xml .= "\n\t\t\t<product_type>".$rs->cn."</product_type>";
			$xml .= "\n\t\t\t<google_product_category>525</google_product_category>\n\t\t</item>";

			@fwrite($escrever,$xml); 
		}
		@fwrite($escrever,"\n\t</channel>\n</rss>");
		fclose($ponteiro);
	}
	public function insertCartLogin($cookie,$id_cliente){
		$this->b->query("update cliente set cookie='$cookie' where id='$id_cliente' limit 1");
		$sct = $this->b->query("select * from cart_temp where cookie='$cookie' limit 1");
		if($sct->rowCount()){
			$rct = $sct->fetchObject();
			$sat = $this->b->query("select * from cart_ax_temp where idc='{$rct->id}'");
			$sc = $this->b->query("select * from cart where idu='$id_cliente' and s=1 limit 1");
			if(!$sc->rowCount()){
				$cliente = $this->b->query("select *,n,email,r,tp,dn,cpf,rg,rua,cep,city,num,bairro,uf,comp,t1 from cliente where id='$id_cliente'")->fetchObject();
				$cli_n = strs($cliente->n?$cliente->n:$cliente->r);
				$cli_rua = strs($cliente->rua);
				$cli_num = strs($cliente->num);
				$cli_comp = strs($cliente->comp);
				$cli_bairro = strs($cliente->bairro);
				$cli_cep = strs($cliente->cep);
				$cli_city = strs($cliente->city);
				$cli_uf = strs($cliente->uf);
				$cli_t1 = strs($cliente->t1);
				$this->b->exec("insert into cart set dc=now(),idu='$id_cliente',i='{$rct->i}',q={$rct->q},v='{$rct->v}',n='$cli_n',rua='$cli_rua',num='$cli_num',comp='$cli_comp',bairro='$cli_bairro',cep='$cli_cep',city='$cli_city',uf='$cli_uf',t1='$cli_t1'");
				$id = $this->b->lastInsertId();
				while($rat=$sat->fetchObject())$this->b->query("insert into cart_ax (idc,idp,q,v,t,p,w) values('$id','{$rat->idp}','{$rat->q}','{$rat->v}','{$rat->t}','{$rat->p}','{$rat->w}')");
				$rt = $this->b->query("select sum(v) as v,sum(t) as t,count(*) as i,sum(q) as q from cart_ax where idc='$id'")->fetchObject();
				$this->b->exec("update cart set v='{$rt->v}',t='{$rt->t}',i='{$rt->i}',q='{$rt->q}' where id='$id'");
				$this->b->exec("delete from cart_temp where id='{$rct->id}'");
				$this->b->exec("delete from cart_ax_temp where idc='{$rct->id}'");
			}else{
				$rc = $sc->fetchObject();
				while($rat=$sat->fetchObject()){
					$sa = $this->b->query("select * from cart_ax where idc='{$rc->id}' and idp='{$rat->idp}'");
					if(!$sa->rowCount())$this->b->query("insert into cart_ax (idc,idp,q,v,t,p,w,pc) values('{$rc->id}','{$rat->idp}','{$rat->q}','{$rat->v}','{$rat->t}','{$rat->p}','{$rat->w}','{$rat->pc}')");
					else{
						$sa = $this->b->query("select * from cart_ax where idc='{$rc->id}' and idp='{$rat->idp}'");
						while($ra=$sa->fetchObject())if($rat->q!=$ra->q||$rat->v!=$ra->v||$rat->t!=$ra->t)$this->b->query("update cart_ax set q='{$rat->q}',v='{$rat->v}',t='{$rat->t}' where idc='{$rc->id}' and idp='{$rat->idp}'");
					}
				}
				$rt = $this->b->query("select sum(v) as v,sum(t) as t,count(*) as i,sum(q) as q from cart_ax where idc='{$rc->id}'")->fetchObject();
				$this->b->exec("update cart set v='{$rt->v}',t='{$rt->t}',i='{$rt->i}',q='{$rt->q}' where id='{$rc->id}'");
				$this->b->exec("delete from cart_temp where id='{$rct->id}'");
				$this->b->exec("delete from cart_ax_temp where idc='{$rct->id}'");
			}
		}
	}
	public function formasPagamento($forma,$ambiente){
		$rs = $this->b->query("select * from formas_pagamento where forma='$forma' and ambiente='$ambiente' limit 1")->fetchObject();
		$this->forma->forma = $rs->forma;
		$this->forma->ambiente = $rs->ambiente;
		$this->forma->email = $rs->email;
		$this->forma->token = $rs->token;
		$this->forma->codigo = $rs->codigo;
		$this->forma->chave = $rs->chave;
		$this->forma->senha = $rs->senha;
		$this->forma->pv = $rs->pv;
		$this->forma->paypalSign = $rs->paypalSign;
		$this->forma->paypalId = $rs->paypalId;
		$this->forma->paypalSecret = $rs->paypalSecret;
		$this->forma->paghiperApiKey = $rs->paghiperApiKey;
		return $this->forma;
	}
	public function summernote(){
		return "
<link href='assets/plugins/summernote/summernote.css' rel='stylesheet' type='text/css'/>
<script type='text/javascript' src='assets/plugins/summernote/summernote.js'></script>
<script type='text/javascript' src='assets/plugins/summernote/lang/summernote-pt-BR.js'></script>
<script type='text/javascript'>
setTimeout(function(){
	$('.summernote').summernote({
		lang: 'pt-BR',
		height: 350,
		styleWithSpan: false,
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			//['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video', 'hr']],
			['view', ['fullscreen', 'codeview']],
			['help', ['help']]
		],
		callbacks: {
			onPaste: function(e) {
				var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
				e.preventDefault();
				document.execCommand('insertText', false, bufferText);
			},
			onImageUpload: function(files, editor, welEditable) {
				sendFile(files[0], editor, welEditable);
			}
	  }
	});
},1000);
function sendFile(file, editor, welEditable) {
	data = new FormData();
	data.append('file',file);
	$.ajax({
		data: data,
		type:'POST',
		xhr: function() {
			var myXhr = $.ajaxSettings.xhr();
			if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
			return myXhr;
		},
		url:'ajax/i/summernote.json',
		cache: false,
		contentType: false,
		processData: false,
		success: function(x){
			$('.summernote').summernote('insertImage', x.url);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus+' '+errorThrown);
		}
	});
}
function progressHandlingFunction(e){
	if(e.lengthComputable){
		$('progress').show().attr({value:e.loaded, max:e.total});
		if(e.loaded==e.total)$('progress').attr('value','0.0').hide();
	}
}
</script>";
	}
	public function cloneImg($img,$folder,$name,$ext){
		$new_img = $name.'-'.date('his').'.'.$ext;
		copy($img,$folder.$new_img);
		return $new_img;
	}
	public function cloneFotos($id,$id_novo,$P,$Pt,$tipo){
		$fotos = $this->b->query("select * from fotos where idp=$id and tipo='$tipo'");
		while($foto=$fotos->fetchObject()){
			$principal = $foto->principal;
			$hover = $foto->hover;
			if($foto->i&&file_exists($P.$foto->i)){
				$url = $s->dom.$s->dir.$P;
				$img = $url.$foto->i;
				$file_ext = explode(".",$foto->i);
				$I = $this->cloneImg($img,$P,$file_ext[0],$file_ext[1]);
			}
			if($foto->it&&file_exists($Pt.$foto->it)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->it;
				$file_ext = explode(".",$foto->it);
				$It = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			if($foto->itc&&file_exists($Pt.$foto->itc)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->itc;
				$file_ext = explode(".",$foto->itc);
				$Itc = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			if($foto->ith&&file_exists($Pt.$foto->ith)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->ith;
				$file_ext = explode(".",$foto->ith);
				$Ith = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			if($foto->iti&&file_exists($Pt.$foto->iti)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->iti;
				$file_ext = explode(".",$foto->iti);
				$Iti = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			if($foto->itm&&file_exists($Pt.$foto->itm)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->itm;
				$file_ext = explode(".",$foto->itm);
				$Iym = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			if($foto->itr&&file_exists($Pt.$foto->itr)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->itr;
				$file_ext = explode(".",$foto->itr);
				$Itr = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			if($foto->itu&&file_exists($Pt.$foto->itu)){
				$url = $s->dom.$s->dir.$Pt;
				$img = $url.$foto->itu;
				$file_ext = explode(".",$foto->itu);
				$Itu = $this->cloneImg($img,$Pt,$file_ext[0],$file_ext[1]);
			}
			$this->b->query("insert into fotos set idp=$id_novo,tipo='$tipo',dc=now(),principal='$principal',hover='$hover',i='$I',it='$It',itc='$Itc',ith='$Ith',iti='$Iti',itm='$Itm',itr='$Itr',itu='$Itu'");
		}
	}
	public function cloneCategorias($id,$id_novo){
		$categorias = $this->b->query("select * from produto_cat where idp=$id");
		while($categoria=$categorias->fetchObject()){
			$idc = $categoria->idc;
			$this->b->query("insert into produto_cat set idp=$id_novo,idc=$idc,dc=now()");
		}
	}
	public function defaultImg($folder,$img,$name){
		if($img&&file_exists($folder.$img))$IMG = $folder.$img;
		else $IMG = $folder."default-".$name.".jpg";
		return $IMG;
	}
	public function dadosCliente($id){
		$rs = $this->b->query("select * from cliente where id=$id limit 1")->fetchObject();
		if(!$rs)$r = false;
		else{
			$cpf_cnpj = $rs->tp==1?$rs->cpf:$rs->cnpj;
			$dados = array(
				'cpf_cnpj' => $cpf_cnpj,
				'cep' => $rs->cep,
				'rua' => $rs->rua,
				//'num' => $rs->num,
				'bairro' => $rs->bairro,
				'city' => $rs->city,
				'uf' => $rs->uf,
				't1' => $rs->t1,
			);
			if(array_search("",$dados)!==false)$r = false;
			else $r = true;
		}
		return $r;
	}
	public function checkSlug($idp,$slug){
		$rs = $this->b->query("select * from slugs where slug='$slug' and idp!=$idp limit 1")->fetchObject();
		$r = $rs?'indisponivel':'disponivel';
		return $r;
	}
	public function insertSlug($idp,$slug,$page){
		$this->b->query("insert into slugs set idp=$idp,slug='$slug',page='$page'");
	}
	public function updateSlug($idp,$slug,$page){
		$this->b->query("update slugs set slug='$slug' where idp=$idp and page='$page'");
	}
	public function deleteSlug($slug){
		$this->b->query("delete from slugs where slug='$slug' limit 1");
	}
	public function siteMap($arquivo='',$tipo=''){
		$lc = $this->dom.'/';
		if(!$arquivo)$arquivo = 'product-sitemap.xml';
		else{
			$ext = substr($arquivo,-4);
			if($ext!='.xml')$arquivo = $arquivo.'.xml';
		}

		$escrever = fopen('../'.$arquivo, "w");

		@fwrite($escrever,"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">");

		if($tipo=='post'){
			$sb = $this->b->query("select t from blog where s");
			while($rs=$sb->fetchObject()){
				$xml = "\n\t<url><loc>".$lc.strh($rs->t)."</loc></url>";
				@fwrite($escrever,$xml); 
			}
		}

		@fwrite($escrever,"\n</urlset>");
		fclose($ponteiro);
	}
	public function noCache(){
		$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
		shuffle($seed);
		foreach(array_rand($seed, 8) as $k)$valc .= $seed[$k];
		return $valc;
	}
	public function navs($NAVS=array(),$id){
		$tabulation = "\t\t\t\t\t";
		foreach($NAVS as $k=>$v){
			$r.= $v['onlyID']&&!$id?'':"$tabulation".'<li role="presentation"'.($v['active']?' class="active"':'').'><a href="#tab'.$k.'" data-toggle="tab"><i class="fa '.$v['icon'].' m-r-xs"></i>'.$v['text'].'</a></li>';
		}
		return $r;
	}
	public function tabs($NAVS=array(),$FIELDS=array(),$FOTOS=array(),$id){
		global $rs;
		$tabulation = "\t\t\t\t\t\t";
		$tabFields = "\t\t\t\t\t\t\t";
		foreach($NAVS as $k=>$v){
			$tab = $k;
			$onlyID = $v['onlyID'];
			$r.= $onlyID&&!$id?'':"$tabulation".'<div class="tab-pane fade'.($v['active']?' active in':'').'" id="tab'.$k.'">';
			foreach($FIELDS as $k=>$v){
				if($v['tab']==$tab){
					$r.= '<div class="form-group '.($v['classGrid']?$v['classGrid']:'col-md-12').'"><label for="'.$v['name'].'">'.$v['label'].($v['tooltip']?' '.$v['tooltip']:'').'</label>';
					if($v['type']=='select')$r.= '<select class="form-control '.($v['class']?$v['class']:'').'" name="'.$v['name'].'" id="'.$v['name'].'"></select>';
					elseif($v['type']=='multiple'){
						$r.= '<select class="form-control '.($v['class']?$v['class']:'').'" multiple="multiple" tabindex="-1" style="width:100%" name="'.$v['name'].($v['limit']?'':'[]').'" id="'.$v['name'].'">';
						if(!empty($v['multipleOptions']))foreach($v['multipleOptions'] as $k=>$options)$r.= $options;
						$r.= '</select>';
					}elseif($v['type']=='text')$r.= '<input type="text" class="form-control '.($v['class']?$v['class']:'').'" id="'.$v['name'].'" name="'.$v['name'].'" placeholder="'.($v['placeholder']?$v['placeholder']:$v['label']).'" value="'.$rs->{$v['name']}.'"/>';
					elseif($v['type']=='color')$r.= '<input type="text" class="form-control '.($v['class']?$v['class']:'').'" id="'.$v['name'].'" name="'.$v['name'].'" placeholder="'.($v['placeholder']?$v['placeholder']:$v['label']).'" value="'.($rs->{$v['name']}?$rs->{$v['name']}:$v['color']).'"/>';
					elseif($v['type']=='number')$r.= '<input type="number"'.($v['min']?' min="'.$v['min'].'"':'').($v['max']?' max="'.$v['max'].'"':'').($v['step']?' step="'.$v['step'].'"':'').' class="form-control '.($v['class']?$v['class']:'').'" id="'.$v['name'].'" name="'.$v['name'].'" placeholder="'.($v['placeholder']?$v['placeholder']:$v['label']).'" value="'.$rs->{$v['name']}.'"/>';
					elseif($v['type']=='textarea')$r.= '<textarea class="form-control '.($v['class']?$v['class']:'').'" rows="'.($v['rows']?$v['rows']:'7').'" id="'.$v['name'].'" name="'.$v['name'].'">'.$rs->{$v['name']}.'</textarea>';
					elseif($v['type']=='summernote')$r.= '<div>
						<progress style="display:none;margin-bottom:10px;width:100%"></progress>
						<textarea class="summernote" id="'.$v['name'].'" name="'.$v['name'].'">'.$rs->{$v['name']}.'</textarea>
					</div>';
					elseif($v['type']=='youtube')$r.= '<input type="text" class="form-control '.($v['class']?$v['class']:'').'" id="'.$v['name'].'" name="'.$v['name'].'" placeholder="'.($v['placeholder']?$v['placeholder']:$v['label']).'" value="'.$rs->{$v['name']}.'"/><div id="ytb-view-'.$v['name'].'" style="margin-top:10px"></div>';
					elseif($v['type']=='meta')$r.= '<textarea class="form-control '.($v['class']?$v['class']:'').'" rows="'.($v['rows']?$v['rows']:'7').'" id="'.$v['name'].'" name="'.$v['name'].'">'.$rs->{$v['name']}.'</textarea>
						<div class="clearfix" style="height:20px;"></div>
						<div class="container-seo form-group">
							<div class="wrapper">
								<div class="main">
									<h3>PRÉVIA <i class="fa fa-question-circle" data-toggle="tooltip" title="" style="font-size:16px" data-original-title="Este é um exemplo de como este artigo pode aparecer nos resultados de busca do Google."></i></h3>
									<div class="title-seo"><span>'.$rs->tagt.'</span></div>
									<div class="url-seo"><span>'.$url_seo.'</span></div>
									<div class="description-seo"><span>'.$rs->tagd.'</span></div>
								</div>
							</div>
						</div>';
					elseif($v['type']=='file')$r.= '<input type="file" name="'.$v['name'].'" class="txt left mr" '.($v['required']?'required':'').'/><div class="clearfix"></div>
						<div id="text-view-'.$v['name'].'" class="text-view col-sm-6" cls="top">'.($v['removeImg']?'<label class="top">Remover Arquivo:<input type="checkbox" name="'.$v['removeImg'].'" value="1" class="ckb"/></label>':'').'</div>';
					elseif($v['type']=='image')$r.= '<input type="file" name="'.$v['name'].'" class="txt left mr" '.($v['required']?'required':'').'/>
						'.($v['largura']||$v['larguraMin']||$v['altura']||$v['alturaMin']?'<div class="text left ml">'.($v['largura']||$v['larguraMin']?'<span><strong>Largura'.($v['larguraMin']?' Mínima':'').':</strong> '.($v['larguraMin']?$v['larguraMin']:$v['largura']).'px</span>':'').($v['altura']||$v['alturaMin']?'<span><strong>Altura'.($v['alturaMin']?' Mínima':'').':</strong> '.($v['alturaMin']?$v['alturaMin']:$v['altura']).'px</span>':'').'</div><div class="clearfix"></div>':'').'
						<div id="img-view-'.$v['name'].'" class="img-view col-sm-6" cls="top">'.($v['removeImg']?'<label class="top">Remover Imagem:<input type="checkbox" name="'.$v['removeImg'].'" value="1" class="ckb"/></label>':'').'</div>';
					elseif($v['type']=='fotos'&&$id){
						$hover = $v['hover'];
						if(!empty($FOTOS))foreach($FOTOS as $k=>$foto){
							$r.= '<div class="form-group col-xs-12 col-lg-3">
								<label for="principal-'.$foto['id'].'" class="text-center">
									<img src="upload/'.$foto['pasta'].'/thumb/'.$foto['it'].'" class="view-imgs"/>
									<input type="radio" id="principal-'.$foto['id'].'" name="principal" value="'.$foto['id'].'" '.($foto['principal']?'checked':'').'/>
									IMAGEM PRINCIPAL
								</label>
								'.($hover?'
								<label for="hover-'.$foto['id'].'" class="text-center">
									<input type="radio" id="hover-'.$foto['id'].'" name="hover" value="'.$foto['id'].'" '.($foto['hover']?'checked':'').'/>
									IMAGEM HOVER
								</label>':'').'
							</div>';
						}
						$r.= '<div class="clearfix"></div><a href="'.$v['link'].$id.'" class="btn btn-success">'.(empty($FOTOS)?'ADICIONAR ':'ALTERAR ').$v['text'].'</a>';
					}
					$r.= '</div>';
				}
			}
			$r.= $onlyID&&!$id?'':"$tabulation".'</div>';
		}
		return $r;
	}
	public function filtros($NAVS=array()){
		$tabulation = "\t\t\t\t\t";
		foreach($NAVS as $k=>$v){
			$r.= "$tabulation".'<div class="cell w200">';
			if($v['type']=='select')$r.= '<select class="form-control '.($v['class']?$v['class']:'').'" name="'.$v['name'].'" id="'.$v['name'].'"></select>';
			elseif($v['type']=='text')$r.= '<input type="text" class="form-control '.($v['class']?$v['class']:'').'" id="'.$v['name'].'" name="'.$v['name'].'" placeholder="'.($v['placeholder']?$v['placeholder']:$v['label']).'" value="'.$rs->{$v['name']}.'"/>';
			$r.= "$tabulation".'</div>';
		}
		return $r;
	}
	public function tableExist($table) {
		try {
		  $this->b->query("select 1 from $table limit 1");
		} catch (Exception $e) {
			$erro = 1;
		} catch (PDOException $e) {
			$erro = 1;
		}
		return $erro;
	}
	public function createTable($table,$FIELDSOPTIONS,$mostraHome,$temSlug,$temOrder){
		$createTable = "
			CREATE TABLE IF NOT EXISTS $table(
			id int(10) unsigned NOT NULL AUTO_INCREMENT,
			s tinyint(3) unsigned DEFAULT '1' COMMENT 'status; 1-ativo',
			".($mostraHome?"home tinyint(3) unsigned DEFAULT '1' COMMENT 'mostra na home; 1-ativo',":"")."
			".($temOrder?"o int(10) unsigned DEFAULT '9999' COMMENT 'ordem geral',
			oh int(10) unsigned DEFAULT '9999' COMMENT 'ordem home',
			om int(10) unsigned DEFAULT '9999' COMMENT 'ordem menu',
			oro int(10) unsigned DEFAULT '9999' COMMENT 'ordem rodapé',":'')."
			dc datetime DEFAULT NULL COMMENT 'data cadastrado',
			da datetime DEFAULT NULL COMMENT 'data alterado',
		";
		if($temSlug)$createTable.= "t varchar(255) NULL COMMENT 'tag slug',";
		foreach($FIELDSOPTIONS as $k=>$v){
			$type = $v['type'];
			$name = $v['name'] ;
			$label = $v['label'];
			$float = $v['float'];

			if($type=='select')$createTable.= "$name INT UNSIGNED NULL COMMENT '$label',";
			elseif($type=='text'||$type=='meta'||$type=='image'||$type=='youtube')$createTable.= "$name varchar(255) NULL COMMENT '$label',";
			elseif($type=='textarea')$createTable.= "$name TEXT NULL COMMENT '$label',";
			elseif($type=='summernote')$createTable.= "$name LONGTEXT NULL COMMENT '$label',";
			elseif($type=='number'&&!$float)$createTable.= "$name INT UNSIGNED NULL DEFAULT 0 COMMENT '$label',";
			elseif($type=='number'&&$float)$createTable.= "$name NUMERIC(10,$float) NULL DEFAULT 0 COMMENT '$label',";
		}
		$createTable.= "
			PRIMARY KEY (id),
			KEY s (s),
			KEY dc (dc),
			KEY da (da)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='$table';
		";
		$this->b->exec($createTable);
	}
	public function hasWebp($file='',$alt='',$title='',$class='',$id=''){
		$folder = pathinfo($file, PATHINFO_DIRNAME).'/';
		$fileName = pathinfo($file, PATHINFO_FILENAME);
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$webp = $fileName.'.webp';

		if (file_exists($folder.$webp)) {
			$img = '<img class="img-webp'.($class?' '.$class:'').'" data-original="'.($file).'" data-webp="'.($folder.$webp).'"'.($alt?' alt="'.$alt.'"':'').($title?' title="'.$title.'"':'').($id?' id="'.$id.'"':'').'/>';
		} else {
			$img = '<img src="'.($file).'"'.($alt?' alt="'.$alt.'"':'').($title?' title="'.$title.'"':'').($class?' class="'.$class.'"':'').($id?' id="'.$id.'"':'').'/>';
		}
		return $img;
	}
	public function convertWebp($file_path){
		//WEBP CONVERT
		$pasta = pathinfo($file_path, PATHINFO_DIRNAME).'/';
		$fileName = pathinfo($file_path, PATHINFO_FILENAME);
		$ext = pathinfo($file_path, PATHINFO_EXTENSION);
		$name = $fileName.'.'.$ext;
		$newName = $fileName.'.webp';

		// if($ext=='png'){
		//     $img = @imagecreatefrompng($pasta . $name);
		//     imagepalettetotruecolor($img);
		//     imagealphablending($img, true);
		//     imagesavealpha($img, true);
		//     imagewebp($img, $pasta . $newName, 80);
		//     imagedestroy($img);  
		// }if($ext=='jpg'||$ext=='jpeg'){
		//     $img = imagecreatefromjpeg($pasta . $name);
		//     imagewebp($img, $pasta . $newName, 80);
		//     imagedestroy($img);
		// }
	}
}
// ----- ----- //
$s = new Sys();
include 'conf.php';
// ----- ----- //
$s->initMySQL();
$b = $s->b;
//MINIFIER
require_once('minifier.php');
$MINIFIER = new MINIFIER;