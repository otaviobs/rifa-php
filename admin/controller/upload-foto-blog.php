<?php
//if($s->tipoAdm==3)$s->loc('admin');
//if($s->tipoAdm==2)$s->loc('admin');
$s->lay = 'blank';
require_once('../class/UploadHandler.php');
$rnome = $b->query("select h1 as n from blog where id='{$s->id}' limit 1")->fetchObject();
$nome = tag($rnome->n,1);

$largura_thumb = 770;
$altura_thumb = 430;
$largura_ultimos = 100;
$altura_ultimos = 56;

require_once('../class/CustomUploadHandler.php');

$P = "../upload/blogs/";
$Pt = $P."thumb/";
$tipo_post = 'blog';
$uploadOptions = array(
	//'max_number_of_files' => 16,
	'upload_dir' => $P,
	'upload_url' => $s->baseAdmin.$P,
	'image_versions' => array(
		'thumb' => array(
			'crop' => true,//false = crop proporcionalmente
			'max_width' => $largura_thumb,
			'max_height' => $altura_thumb,
			'jpeg_quality' => 90,
			'upload_dir' => $Pt,
			'upload_url' => $s->baseAdmin.$Pt
		),
		'ultimos' => array(
			'crop' => true,//false = crop proporcionalmente
			'max_width' => $largura_ultimos,
			'max_height' => $altura_ultimos,
			'jpeg_quality' => 90,
			'upload_dir' => $Pt,
			'upload_url' => $s->baseAdmin.$Pt
		)
	),
	'script_url' => $s->baseAdmin.'upload-foto-blog',
	'min_width' => $largura_thumb,
	'min_height' => $altura_thumb,
	'tipo_post' => $tipo_post
);
$upload_handler = new CustomUploadHandler($uploadOptions);