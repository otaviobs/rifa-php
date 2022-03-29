<?php
$s->mailU->host = 'smtp.chaheloa.com.br';
$s->mailU->port = 465; // LocaWeb
$s->mailU->mail = 'naoresponder@chaheloa.com.br';
$s->mailU->pass = 'ch@rifaHeloa2!';
$s->mailU->name = 'Chá Rifa da Heloa';

$s->mailC->mail = 'naoresponder@chaheloa.com.br';

//$s->mailC->name = 'Não Responder';

if ( file_exists( dirname( __FILE__ ) . '/conf-local.php' ) ) {
 	include( dirname( __FILE__ ) . '/conf-local.php' );
} else {
	switch(1){
		case 1:
			$s->dom = 'https://chaheloa.com.br';
			$s->dir = '/';
			$s->dirAdmin = $s->dir.'admin/';
			$s->db->host = '179.188.16.22';
			$s->db->base = 'chabebe';
			$s->db->user = 'chabebe';
			$s->db->pass = 'ch@rifaHeloa22';
		break;
	}
}