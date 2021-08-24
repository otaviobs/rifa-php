<?php
$s->mailU->host = 'smtp.campanhaibbl.com.br';
$s->mailU->port = 465; // LocaWeb
$s->mailU->mail = 'naoresponder@campanhaibbl.com.br';
$s->mailU->pass = 'DUPq7HU3NmUeRJF!';
$s->mailU->name = 'Campanha IBBL';

$s->mailC->mail = 'naoresponder@chabeberifa.com.br';

//$s->mailC->name = 'Não Responder';

if ( file_exists( dirname( __FILE__ ) . '/conf-local.php' ) ) {
 	include( dirname( __FILE__ ) . '/conf-local.php' );
} else {
	switch(0){
		case 0:
			$s->dom = 'https://www.chabeberifa.com.br';
			$s->dir = '/';
			$s->dirAdmin = $s->dir.'admin/';
			$s->db->host = '186.202.152.146';
			$s->db->base = 'chabebe';
			$s->db->user = 'chabebe';
			$s->db->pass = 'Ch@bebeRifa098';
		break;
	}
}
