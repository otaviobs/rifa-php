<?php
$cidade = strgs('cidade');
$uf = strgs('uf');
$latitude = strgs('latitude');
$longitude = strgs('longitude');
$cityt = tag($cidade,1);
unset($x->result);

if($cidade&&$uf){
	$st = $b->query("select * from revendedor where cidade='$cidade' and uf='$uf'");
	if($st->rowCount()){
		while($rs=$st->fetchObject()){
			$x->result .= '
				<div class="texto-contato store box" data-type="store" data-latitude="'.$rs->latitude.'" data-longitude="'.$rs->longitude.'" data-cidade="'.$rs->cidade.'" data-zoom="15">
          <b style="color: #d02027;">'.$rs->nome.'</b>
          <p>'.($rs->telefone?'Telefone: '.$rs->telefone.'<br>':'').($rs->email?'E-mail: '.$rs->email.'<br>':'').'Endereço: '.($rs->endereco.', '.$rs->num.' - '.$rs->bairro.' - '.$rs->cidade.'/'.$rs->uf).'</p>
        </div>
			';
		}
		$x->ok = 1;
	}else{
		if(!$latitude||!$longitude){
			$address = $cityt.','.$uf.'-brasil';
			$geocode = file_get_contents($x->geo='https://maps.google.com/maps/api/geocode/json?key=AIzaSyBJjfyznATtRcaBY2D_9ECDMlJfskEdUAo&address='.$address.'&sensor=false');	
			$output= json_decode($geocode);	
			$latitude = str_replace("-", "", $output->results[0]->geometry->location->lat);
			$longitude = $output->results[0]->geometry->location->lng;
		}else $latitude = str_replace("-", "", $latitude);
		$st = $b->query("SELECT *, 6371 * 2 * ASIN(SQRT(POWER(SIN(($latitude - abs(latitude)) * pi()/180 / 2), 2) + COS($latitude * pi()/180 ) * COS(abs(latitude) * pi()/180) * POWER(SIN(($longitude - longitude) * pi()/180 / 2), 2) )) as distance FROM revendedor HAVING distance < 200 ORDER BY distance");
		if($st->rowCount()){
			while($rs=$st->fetchObject()){
				$x->result .= '
					<div class="texto-contato store box" data-type="store" data-latitude="'.$rs->latitude.'" data-longitude="'.$rs->longitude.'" data-cidade="'.$rs->cidade.'" data-zoom="15">
	          <b style="color: #d02027;">'.$rs->nome.'</b>
	          <p>'.($rs->telefone?'Telefone: '.$rs->telefone.'<br>':'').($rs->email?'E-mail: '.$rs->email.'<br>':'').'Endereço: '.($rs->endereco.', '.$rs->num.' - '.$rs->bairro.' - '.$rs->cidade.'/'.$rs->uf).'</p>
	        </div>
				';
			}
			$x->ok = 1;
		}
	}
}