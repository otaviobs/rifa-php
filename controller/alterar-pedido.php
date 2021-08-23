<?php
if(!$s->idc)$s->loc('.');

$quiz = $b->query("select * from Quiz where id_usuario={$s->idc} order by id_quiz desc limit 1")->fetchObject();
//$resultado = $b->query("select * from QuizRespostas as q inner join Respostas as r on q.id_resposta=r.id_resposta and r.correta=1 where q.id_quiz={$quiz->id_quiz}");
//if($resultado->rowCount()<7)$s->loc('vendedor');

if($s->id) {
  $rs = $b->query("select * from Pedidos where id_pedido={$s->id} and id_usuario={$s->idc} and status = 3 limit 1")->fetchObject();
  if(!$rs)$s->loc('pedidos');
}