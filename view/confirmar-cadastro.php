<?
$rs = $b->query("select * from Usuarios where id_usuario={$s->id} and status=0 limit 1")->fetchObject();
if($rs)$b->query("update Usuarios set status=1 where id_usuario={$s->id} limit 1");
?>
<div class="section-container section-top">
  <div class="container">
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="."><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Confirmar Cadastro</li>
      </ol>
    </div>
    <h1 class="title text-center">Cadastro confirmado com sucesso!</h1>
    <hr>
    <div class="separator"></div>
  </div>
</div>