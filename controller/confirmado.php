<?php
var_dump($_SESSION['user']['fralda']);
if(empty($_SESSION['user']['fralda']))
    $s->loc('.');

$num = $b->query("select * from rifa where nome = '{$_SESSION['user']['name']}'");
if(!$num->rowCount())$s->loc('numeros');