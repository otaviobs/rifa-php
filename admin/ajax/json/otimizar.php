<?php
$id = strp('id',3);
$rs = $b->query("select * from fotos where id=$id limit 1")->fetchObject();
if(!$rs)$x->m = 'Essa foto não existe!';
elseif($rs->otimizado==1)$x->m = 'Essa foto já foi otimizada!';
else{
  try {
    if($rs->tipo=='blog')$P = 'upload/blogs/';
    elseif($rs->tipo=='categoria'||$rs->tipo=='categoria-background')$P = 'upload/categorias/';
    elseif($rs->tipo=='produto'||$rs->tipo=='produto-background'||$rs->tipo=='produto-galeria')$P = 'upload/produtos/';
    $Pt = $P.'thumb/';

    \Tinify\setKey("p3mXs8kGF0m6v7B9y9Flwhw2D4tB57Z0");
    //$source = \Tinify\fromUrl("http://localhost/tinypng/unoptimized.png")->toFile("optimized.png");
    $source = \Tinify\fromFile($P.$rs->i)->toFile($P.$rs->i);
    if($rs->it)$sourceIt = \Tinify\fromFile($Pt.$rs->it)->toFile($Pt.$rs->it);
    if($rs->itc)$sourceItc = \Tinify\fromFile($Pt.$rs->itc)->toFile($Pt.$rs->itc);
    if($rs->ith)$sourceIth = \Tinify\fromFile($Pt.$rs->ith)->toFile($Pt.$rs->ith);
    if($rs->iti)$sourceIti = \Tinify\fromFile($Pt.$rs->iti)->toFile($Pt.$rs->iti);
    if($rs->itm)$sourceItm = \Tinify\fromFile($Pt.$rs->itm)->toFile($Pt.$rs->itm);
    if($rs->itr)$sourceItr = \Tinify\fromFile($Pt.$rs->itr)->toFile($Pt.$rs->itr);
    if($rs->itu)$sourceItu = \Tinify\fromFile($Pt.$rs->itu)->toFile($Pt.$rs->itu);
    if($source){
      $x->ok = 1;
      $b->query("update fotos set otimizado=1 where id=$id limit 1");
      $x->m = 'Fotos otimizadas com sucesso!';
    }
    // Use the Tinify API client.
  } catch(\Tinify\AccountException $e) {
    $x->m = "The account error message is: " . $e->getMessage();
    $x->ok = 0;
    // Verify your API key and account limit.
  } catch(\Tinify\ClientException $e) {
    $x->m = "The client error message is: " . $e->getMessage();
    $x->ok = 0;
    // Check your source image and request options.
  } catch(\Tinify\ServerException $e) {
    $x->m = "The server error message is: " . $e->getMessage();
    $x->ok = 0;
    // Temporary issue with the Tinify API.
  } catch(\Tinify\ConnectionException $e) {
    $x->m = "The connection error message is: " . $e->getMessage();
    $x->ok = 0;
    // A network connection error occurred.
  } catch(Exception $e) {
    $x->ok = 0;
    $x->m = "The general error message is: " . $e->getMessage();
    // Something else went wrong, unrelated to the Tinify API.
  }
}