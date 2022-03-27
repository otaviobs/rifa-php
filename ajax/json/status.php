<?php
$id = strpr('id');
if($id)
  $s->l = '.';


$rs = $b->query("select status from rifa where id = $id")->fetchObject();

if($rs->status==1)
  $status = 2;
else
  $status = 1;
if($b->exec("update rifa set status=$status where id = $id")){
  $x->ok = 1;
}else{
  $x->m = 'DB error';
}