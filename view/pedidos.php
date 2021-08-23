<div class="page-section container">
  <div class="row">
    <div class="col-12">
      <h3 class="page-section-heading text-center text-uppercase p-3">Meus Pedidos</h3>
      <h5 class="h5 mb-3 text-center">Confira o seus pedidos 
        <a href="pedido" class="btn btn-primary float-right" title="Adicionar um novo pedido">
          <i class="fas fa-plus"></i> Pedido
        </a>
      </h4>
      <table class="table table-sm table-striped table-hover">
        <thead>
          <tr class="bg-ibbl-azul text-white">
            <th scope="col">#</th>
            <th scope="col">Número da Nota Fiscal</th>
            <th scope="col">Status</th>
            <?php/*<th scope="col">Auditor</th>*/?>
            <th scope="col">Pontos</th>
            <th scope="col">Editar</th>
          </th>
        </thead>
        <tbody>
<?php
$pedidos = $b->query("select p.*,u.nome from Pedidos p left join Usuarios u on p.id_auditor=u.id_usuario where p.id_usuario={$s->idc} order by p.id_pedido desc");
if($pedidos->rowCount()){
  while($rs = $pedidos->fetchObject()){
?>
          <tr scope="row">
            <td><?=$rs->id_pedido?></td>
            <td><?=$rs->numero_nota_fiscal?></td>
            <td>
              <?=$rs->status==0?'AGUARDANDO':($rs->status==1?'APROVADO':($rs->status==2?'REPROVADO':'PENDENTE'))?>
            </td>
            <?php/*<td><?=$rs->nome?></td>*/?>
            <td><?=$rs->status==1?$rs->pontos:'-'?></td>
            <td><?=$rs->status==3?'<a href="alterar-pedido/'.$rs->id_pedido.'" class="btn btn-success">EDITAR</a>':''?></td>
          </tr>
<?php
  }
}else {
?>
          <tr scope="row">
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