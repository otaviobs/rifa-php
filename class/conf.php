<?php
$s->mailU->host = 'smtp.campanhaibbl.com.br';
$s->mailU->port = 465; // LocaWeb
$s->mailU->mail = 'naoresponder@campanhaibbl.com.br';
$s->mailU->pass = 'DUPq7HU3NmUeRJF!';
$s->mailU->name = 'Campanha IBBL';

$s->mailC->mail = 'naoresponder@campanhaibbl.com.br';

//$s->mailC->name = 'Não Responder';

if ( file_exists( dirname( __FILE__ ) . '/conf-local.php' ) ) {
 	include( dirname( __FILE__ ) . '/conf-local.php' );
} else {
	switch(1){
		case 0:
			$s->dom = 'https://www.ibbl.com.br';
			$s->dir = '/';
			$s->dirAdmin = $s->dir.'admin/';
			$s->db->host = '200.234.217.146';
			$s->db->base = 'ibbl_01';
			$s->db->user = 'ibbl_01';
			$s->db->pass = 'X4_X!DwRaxkh_n';
		break;
		case 1:
			$s->dom = 'https://www.campanhaibbl.com.br';
			$s->dir = '/';
			$s->dirAdmin = $s->dir.'admin/';
			$s->db->host = '200.234.217.146';
			$s->db->base = 'ibbl_01';
			$s->db->user = 'ibbl_01';
			$s->db->pass = 'X4_X!DwRaxkh_n';
		break;
	}
}