<?php
include '../class/main.php';
// ----- ----- //

$s->pg = 'admin';


if(!$s->adm()&&$s->spg!='login'&&$s->spg!='esqueci'&&$s->spg!='confirmar-cadastro'){
  if($s->spg&&$s->spg!='home')$s->locAdmin('login/'.$s->spg.($s->id?'_'.$s->id:''));
  else $s->locAdmin('login');
}elseif($s->adm()&&$s->spg=='login'&&$s->spg=='esqueci'&&$s->spg=='confirmar-cadastro')$s->locAdmin($s->spg);



$s->lay = 'admin';
$s->tit = 'Administrador';
$s->css[0] = 'css/admin.css?6';

$s->js = array('assets/js/admin/jquery.maskedinput-1.3.1.min.js','assets/js/admin/jbr.sort-1.0.0.js','assets/js/admin/jbr.file-1.0.1.js','assets/js/admin/jbr.tab-1.0.3.js?v=1.0.0','assets/js/admin/jbr.form-1.0.2.js?v=1.0.0');

$s->back = "{$s->spg}s";


if(file_exists($___f="{$s->CONTROLLER}{$s->spg}.php")){
	include $___f;
}

if($s->set404&&!file_exists("{$s->VIEW}{$s->spg}.php"))$s->is404 = 1;

if($s->is404)$s->spg = '404';

if(!file_exists("{$s->LAYOUT}{$s->lay}.php"))$s->lay = 'admin';
if(file_exists($___f="{$s->LAYOUT}{$s->lay}.php")){
	include $___f;
}

exit;