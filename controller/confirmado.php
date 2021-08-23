<?php
$num = $b->query("select * from rifa where nome = '{$_SESSION['user']['name']}'");
if(!$num->rowCount())$s->loc('numeros');    