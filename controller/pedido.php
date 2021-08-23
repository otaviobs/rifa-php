<?php
if(!$s->idc)$s->loc('.');

if($s->id) {
  $rs = $b->query("select * from Pedidos where id_pedido={$s->id} and id_usuario={$s->idc} and status = 3 limit 1")->fetchObject();
  if(!$rs)$s->loc('pedidos');
}