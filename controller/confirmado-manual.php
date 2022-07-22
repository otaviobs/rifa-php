<?php
$_SESSION['user'] = array('name' => 'Josana Mendes');

$num = $b->query("select * from rifa where nome = '{$_SESSION['user']['name']}' order by numero");
//if(!$num->rowCount())$s->loc('numeros');