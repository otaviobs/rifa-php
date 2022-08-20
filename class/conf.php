<?php
$s->mailU->host = 'smtp.chadotheo.com.br';
$s->mailU->port = 465; // LocaWeb
$s->mailU->mail = 'naoresponder@chadotheo.com.br';
$s->mailU->pass = 'ch@rifaTheo22';
$s->mailU->name = 'Chá Rifa do Théo';

$s->mailC->mail = 'naoresponder@chadotheo.com.br';

//$s->mailC->name = 'Não Responder';

if ( file_exists( dirname( __FILE__ ) . '/conf-local.php' ) ) {
 	include( dirname( __FILE__ ) . '/conf-local.php' );
} else {
	switch(1){
		case 1:
			$s->dom = 'https://chadotheo.com.br';
			$s->dir = '/';
			$s->dirAdmin = $s->dir.'admin/';
			$s->db->host = '186.202.152.19';
			$s->db->base = 'chabebetheo';
			$s->db->user = 'chabebetheo';
			$s->db->pass = 'ch@rifaTheo22';
		break;
	}
}