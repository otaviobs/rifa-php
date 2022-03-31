<?php
if(empty($_SESSION['user']['fralda']))
    $s->loc('.');

$num = $b->query("select * from rifa where nome = '{$_SESSION['user']['name']}' order by numero");
if(!$num->rowCount())$s->loc('numeros');