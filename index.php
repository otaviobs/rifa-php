<?php
include 'class/main.php';
// ----- ----- //

//if($s->pg!='admin')$s->loc('admin');
if(file_exists($___f="{$s->CONTROLLER}{$s->pg}.php")){
	include $___f;
}

if($s->set404&&!file_exists("{$s->VIEW}{$s->pg}.php"))$s->is404 = 1;

if($s->is404)$s->pg = '404';

if(!file_exists("{$s->LAYOUT}{$s->lay}.php"))$s->lay = 'default';
if(file_exists($___f="{$s->LAYOUT}{$s->lay}.php")){
	include $___f;
}

exit;