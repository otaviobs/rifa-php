<?php
$firstName = explode(" ", $s->nome);
?>
<div class="page-section background-imagem">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 mt-3">
        <h3 class="page-section-heading text-center text-uppercase text-ibbl-blue mb-5">Olá, <?=$firstName[0]?></h3>
        <div class="jumbotron" style="padding-top: 25px;">
          <p class="section-descricao text-center">
<?
  if ($rs->aprovado)
            echo '<strong>Parabéns! </strong><br>Você realizou o Quiz e ganhou 50 pontos';
  else
            echo 'Você pode ganhar mais 50 pontos! É só assistir ao treinamento da Linha Viváx IBBL e realizar o Quiz';
?>            
          </p>
          <div class="list-group" style="font-size: 14px;">
<?
$countVideo = 0;
while($rv = $videos->fetchObject()){
  $countVideo++;
  $checkVideo = $b->query("select * from VideoUsuarios where id_usuario={$s->idc} and id_video = {$rv->id_video}");
?>
            <div class="list-group-item list-group-item-ligth">
              <a href="video/<?=$rv->id_video?>">
                <i class="fab fa-youtube" style="color: red;font-size:30px;margin-bottom: -6px;"></i>
                <span style="font-size: 16px;"><?=$rv->nome?></span>
                <!-- <span style="font-size: 18px">Treinamento Linha Viváx IBBL – Parte 0<?=$countVideo?> -->
              </a>
              <span class="float-right badge badge-<?=$checkVideo->rowCount()?'success':'danger'?>"><i class="fas fa-<?=$checkVideo->rowCount()?'check':'times'?>"></i></span>
            </div>
<?
}
?>
            <a href="quiz" class="list-group-item list-group-item-ligth <?=$enableQuiz?'':'disabled'?>" style="font-size: 18px;">
              <i class="fas fa-edit"></i> <span style="font-size: 18px;">Quiz</span>
              <span class="float-right badge badge-<?=$finishQuiz?'success':'danger'?>" style="font-size: 11px;"><i class="fas fa-<?=$finishQuiz?'check':'times'?>"></i></span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 mt-3">
        <a href="pedido" class="btn btn-primary float-left"><i class="fas fa-plus"></i> Pedido</a>
<?php
  if($rank){
?>        
        <h4 class="page-section-heading text-right text-uppercase text-ibbl-blue"
          style="align-items: center;display: flex;justify-content: flex-end">
          <span class="badge badge-pill badge-primary" style="margin-left: 5px"><?=$rank->rank?>° lugar</span>
        </h4>
<?php
  }
?>
        <h5 class="page-section-heading text-right text-uppercase text-ibbl-blue"
          style="align-items: center;display: flex;justify-content: flex-end">
          Pontuação <span class="badge badge-pill badge-success" style="margin-left: 5px"><?=$rank->pontos!=0?$rank->pontos:0?></span>
        </h5>
        <div class="mt-5 mb-3">
          <span class="h4">Últimos pedidos</span>
          <a href="pedidos" class="btn btn-primary btn-sm float-right">Ver todos</a>
        </div>
        <table class="table table-sm mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">N° da Nota Fiscal</th>
              <th scope="col">Status</th>
              <?php/*<th scope="col">Auditor</th>*/?>
              <th scope="col">Pontos</th>
            </tr>
          </thead>
          <tbody>
<?php
    $pedidos = $b->query("select p.*,u.nome from Pedidos p left join Usuarios u on p.id_auditor=u.id_usuario where p.id_usuario={$s->idc} order by p.id_pedido desc limit 10");
    if($pedidos->rowCount()){
      while($rs = $pedidos->fetchObject()){
?>
            <tr>
              <th scope="row"><?=$rs->id_pedido?></th>
              <td><?=$rs->numero_nota_fiscal?></td>
              <td><?=$rs->status==0?'AGUARDANDO':($rs->status==1?'APROVADO':($rs->status==2?'REPROVADO':'PENDENTE'))?></td>
              <?php/*<td><?=$rs->nome?></td>*/?>
              <td><?=$rs->status==1?$rs->pontos:'-'?></td>
            </tr>
<?php
      }
    }else {
?>
            <tr>
              <td colspan="5" align="center">Nenhum pedido realizado</td>
            </tr>
<?php
    }
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>