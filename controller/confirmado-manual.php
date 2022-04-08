<?php
$num = $b->query("select * from rifa where nome = 'Josana Mendes' order by numero");
if(!$num->rowCount())$s->loc('numeros');