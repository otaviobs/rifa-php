<?
$st = $b->query("select * from concessionaria where p is null");
while($rs=$st->fetchObject()){
	$id = $rs->id;
	$p = sha1($rs->cnpj);
	$b->query("update concessionaria set p='$p' where id=$id");
}