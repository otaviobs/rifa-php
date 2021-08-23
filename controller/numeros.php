<?php
$num = $b->query('SELECT nome, numero FROM rifa');

$indisponivel = [];
$disponivel = true;

while($row = $num->fetchObject())
{
	array_push($indisponivel, (int)$row->numero);
	$info[$row->numero] = $row->nome;
}