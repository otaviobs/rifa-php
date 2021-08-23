<style>
.graphs{margin-top:25px}
.panel-heading strong,.inbox-item strong{float:right}
.info-box-progress{display:none}
.cards .panel-body{padding-bottom:0}
.filter{margin-bottom:20px}
.custom-select{width: auto;display: inline-block;margin:0 5px}
.dataTables_filter input{margin-left: .5em;display: inline-block;width: auto;}
.export {position: absolute;right:0}
.de-ate-wrap{display:none;margin-top:15px}
.de-ate-wrap input{display: inline-block;width:200px}
.de-ate-wrap input:last-of-type{margin-left:15px}
.de-ate-wrap .btn{height:34px}
.title-periodo{display:inline-block;margin-left:15px}
</style>
<div id="main-wrapper">
  <div class="row">
    <div class="col-lg-12 filter">
      <a href="download-planilhao" class="btn btn-success pull-right export">EXPORTAR DADOS</a>
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        PERÍODO
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" id="periodo">
        <li><a data-value="semanal">Últimos 7 dias</a></li>
        <li><a data-value="mensal">Campanha</a></li>
        <li><a data-value="de-ate">De - Até</a></li>
      </ul>
<?php
$titlePeriodo = $periodo=='de-ate'?'De: '.datef($de,8).' - Até: '.datef($ate,8):($periodo=='mensal'?'Campanha':'Últimos 7 dias');
?>
      <h4 class="title-periodo"><?=$titlePeriodo?></h4>
      <div class="clearfix"></div>
      <div class="de-ate-wrap">
        <input type="text" class="form-control col-md-6 date-picker de" placeholder="De">
        <input type="text" class="form-control col-md-6 date-picker ate" placeholder="Até">
        <a class="btn btn-success">Filtrar</a>
      </div>
    </div>
  </div>
  <div class="row cards">
    <div class="col-lg-2 col-md-6" style="max-width: 15.66666667%">
      <div class="panel info-box panel-white">
        <div class="panel-body">
          <div class="info-box-stats">
            <p class="counter lojas-count"><?=$lojas->rowCount()?></p>
          </div>
          <div class="info-box-icon">
            <i class="fa fa-institution"></i>
          </div>
          <div class="clearfix"></div>
          <div class="info-box-stats">
            <span class="info-box-title"><strong>Lojas</strong></span>
          </div>
          <div class="info-box-progress">
            <div class="progress progress-xs progress-squared bs-n">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <!-- <div id="graphLojas"></div> -->
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-6" style="max-width: 15.66666667%">
      <div class="panel info-box panel-white">
        <div class="panel-body">
          <div class="info-box-stats">
            <p class="counter vendedores-count"><?=$vendedores->rowCount()?></p>
          </div>
          <div class="info-box-icon">
            <i class="icon-users"></i>
          </div>
          <div class="clearfix"></div>
          <div class="info-box-stats">
            <span class="info-box-title"><strong>Vendedores</strong></span>
          </div>
          <div class="info-box-progress">
            <div class="progress progress-xs progress-squared bs-n">
              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <!-- <div id="graphVendedores"></div> -->
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-6" style="max-width: 15.66666667%">
      <div class="panel info-box panel-white">
        <div class="panel-body">
          <div class="info-box-stats">
            <p class="counter pedidos-count"><?=$pedidos->rowCount()?></p>
          </div>
          <div class="info-box-icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <div class="clearfix"></div>
          <div class="info-box-stats">
            <span class="info-box-title"><strong>Pedidos</strong></span>
          </div>
          <div class="info-box-progress">
            <div class="progress progress-xs progress-squared bs-n">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <!-- <div id="graphPedidos"></div> -->
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-6">
      <div class="panel info-box panel-white">
        <div class="panel-body">
          <div class="info-box-stats">
            <p class="counter taxa-count"><?=number_format($taxaConversao->valor, 1)?>%</p>
          </div>
          <div class="info-box-icon">
            <i class="fa fa-sort"></i>
          </div>
          <div class="clearfix"></div>
          <div class="info-box-stats">
            <span class="info-box-title"><strong>Taxa de Conversão</strong></span>
          </div>
          <div class="info-box-progress">
            <div class="progress progress-xs progress-squared bs-n">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <div id="graphConversao"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-6">
      <div class="panel info-box panel-white">
        <div class="panel-body">
          <div class="info-box-stats">
            <p class="counter ticket-count"><?=number_format($ticketMedio->valor, 1)?></p>
          </div>
          <div class="info-box-icon">
            <i class="fa fa-ticket"></i>
          </div>
          <div class="clearfix"></div>
          <div class="info-box-stats">
            <span class="info-box-title"><strong>Ticket Médio</strong></span>
          </div>
          <div class="info-box-progress">
            <div class="progress progress-xs progress-squared bs-n">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <!-- <div id="graphTicket"></div> -->
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-6" style="min-width: 19.66666667%">
      <div class="panel info-box panel-white">
        <div class="panel-body">
          <div class="info-box-stats">
            <p class="counter faturamento-count"><?=$faturamentoTotal?></p>
          </div>
          <div class="info-box-icon">
            <i class="fa fa-money"></i>
          </div>
          <div class="clearfix"></div>
          <div class="info-box-stats">
            <span class="info-box-title"><strong>Faturamento</strong></span>
          </div>
          <div class="info-box-progress">
            <div class="progress progress-xs progress-squared bs-n">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <div id="graphFaturamento"></div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <?php/*<div class="col-lg-12 btn-group" role="group" style="margin-bottom:20px">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        PERÍODO
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" id="periodo">
        <li><a data-value="semanal">Últimos 7 dias</a></li>
        <li><a data-value="mensal">Campanha</a></li>
        <li><a data-value="de-ate">De - Até</a></li>
      </ul>
      <div class="clearfix"></div>
      <div class="de-ate-wrap">
        <input type="text" class="form-control col-md-6 date-picker de" placeholder="De">
        <input type="text" class="form-control col-md-6 date-picker ate" placeholder="Até">
        <a class="btn btn-success">Filtrar</a>
      </div>
    </div>*/?>
    <div class="col-lg-4 col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h4 class="panel-title">Vendedores</h4>
          <strong><?=$detalheVendedores->Total?></strong>
        </div>
        <div class="panel-body">
          <div class="inbox-item">
            <p>Confirmados <strong><?=$detalheVendedores->Confirmado?></strong></p>
            <p>Certificados <strong><?=$detalheVendedores->Certificado?></strong></p>
            <p>Fizeram Pedido <strong><?=$detalheVendedores->fizeramPedido?></strong></p>
            <p>Banidos <strong><?=$detalheVendedores->Banido?></strong></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-6">
      <div class="graphs" id="vendedoresGraph"></div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-4 col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h4 class="panel-title">Pedidos</h4>
          <strong><?=$detalhePedidos->Total?></strong>
        </div>
        <div class="panel-body">
          <div class="inbox-item">
            <p>Aprovados <strong><?=$detalhePedidos->Aprovado?></strong></p>
            <p>Reprovados <strong><?=$detalhePedidos->Reprovado?></strong></p>
            <p>Pendentes <strong><?=$detalhePedidos->Pendente?></strong></p>
            <p>Aguardando <strong><?=$detalhePedidos->Aguardando?></strong></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-6">
      <div class="graphs" id="pedidosGraph"></div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-4 col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h4 class="panel-title">Ticket Médio</h4>
          <strong><?=number_format($ticketMedio->valor, 1)?></strong>
        </div>
        <div class="panel-heading">
          <h4 class="panel-title">Taxa de Conversão</h4>
          <strong><?=number_format($taxaConversao->valor, 1)?>%</strong>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-6">
      <div class="graphs" id="ticketTaxaGraph"></div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-4 col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h4 class="panel-title">Faturamento</h4>
          <strong><?=$faturamentoTotal?></strong>
        </div>
        <div class="panel-body">
          <div class="inbox-item">
<?php
$produtos = $b->query("select * from Produtos where status=1");
while($produto=$produtos->fetchObject()){
  if($periodo == 'semanal') {
    $faturamentoProduto = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    where pp.id_produto={$produto->id_produto} and p.dataCadastro > now() - interval 1 week")->fetchObject();
  } else {
    $faturamentoProduto = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    where pp.id_produto={$produto->id_produto}")->fetchObject();
  }
  // if($faturamentoProduto->total>=1000) {
  //   $thousand = get_thousands($faturamentoProduto->total);
  //   $faturamentoProdutoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  // } else {
  //   $faturamentoProdutoTotal = nreal($faturamentoProduto->total);
  // }
  $faturamentoProdutoTotal = nreal($faturamentoProduto->total);
?>
            <p><?=$produto->nome?> <strong><?=$faturamentoProdutoTotal?></strong></p>
<?php
}
?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-6">
      <div class="graphs" id="faturamentoGraph"></div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="row">
    <div id="table-0" class="tabela2 col-lg-12 col-md-12">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h4 class="panel-title">Pontos</h4>
        </div>
        <?php/*<div class="panel-heading">
          <form id="id-form-filtro" onsubmit="return adm.busca();">
            <div class="lrow tab">
              <div class="cell">
                <select name="qt" title="Exibir" class="form-control"></select>
              </div>
              <div class="cell itxt">
                <input type="text" name="q" class="filtro-q form-control" placeholder="Pesquisar" />
              </div>
              <div class="cell left" style="margin-top: 5px"><a class="filtro-bt"></a></div>
            </div>
          </form>
        </div>*/?>
        <div class="panel-body">
          <table id="table-ranking" class="table table-striped table-hover" >
            <thead>
              <tr class="bg-ibbl-azul text-white">
                <th scope="col">Posição</th>
                <th scope="col">Loja</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Pontuação</th>
                <th scope="col">Pedidos Aprovados</th>
              </th>
            </thead>
            <tbody>
<?php
while ($rr = $rank->fetchObject()) {
?>
              <tr scope="row">
                <td><?=$rr->rank?></td>
                <td><?=$rr->nome_loja?></td>
                <td><?=$rr->nome?></td>
                <td><?=$rr->pontos?> pontos</td>
                <td><?=$rr->quantidade_pedidos?></td>
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
</div>
<?php
Inline::a();
?>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker-pt-BR.js"></script>
<script type="text/javascript">
$(document).on('click', '#periodo a', function(){
  var periodo = $(this).data('value');
  if (periodo != 'de-ate') {
    location.href = 'home/'+periodo;
  } else {
    $('.de-ate-wrap').show();
  }
});

$(document).on('click', '.de-ate-wrap a', function() {
  var periodo = $('#periodo a').data('value');
  var deDefault = $('.de').val(),ateDefault = $('.ate').val();
  var deSplit = deDefault.split("/"),ateSplit = ateDefault.split("/");
  var de = deSplit[2]+'-'+deSplit[1]+'-'+deSplit[0];
  var ate = ateSplit[2]+'-'+ateSplit[1]+'-'+ateSplit[0];
  var dataInicio = new Date(deSplit[2],deSplit[1],deSplit[0]),
  dataFinal = new Date(ateSplit[2],ateSplit[1],ateSplit[0]);

  if(!deDefault) {
    message('Escolha a data inicial.', 0);
  } else if(!ateDefault) {
    message('Escolha a data final.', 0);
  } else if(dataInicio > dataFinal) {
    message('A data final precisa ser maior que a data inicial.', 0);
  } else {
    location.href = 'home/de-ate?de='+de+'&ate='+ate;
  }
});

$('.date-picker').datepicker({
  format: 'dd/mm/yyyy',                
  language: 'pt-BR',
  orientation: "top auto",
  autoclose: true
});
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script>
 $(document).ready(function() {
    $('#table-ranking').DataTable({
      "lengthMenu": [10, 25, 50, 100],
      "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    });
} );
</script>

<script src="//www.amcharts.com/lib/4/core.js"></script>
<script src="//www.amcharts.com/lib/4/charts.js"></script>
<script type="text/javascript">
/* Create chart instance */
var chart = am4core.create("vendedoresGraph", am4charts.XYChart);

/* Add data */
chart.data = [
<?php
while($rs=$detalheVendedoresGraph->fetchObject()) {
?>
{
  "<?=$dataType?>": "<?=$rs->data?>",
  "confirmado": <?=$rs->Confirmado?>,
  "certificado": <?=$rs->Certificado?>,
  "fizeramPedido": <?=$rs->fizeramPedido?>,
  "banido": <?=$rs->Banido?>
},
<?php
}
?>
];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "<?=$dataType?>";

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "confirmado";
series1.dataFields.categoryX = "<?=$dataType?>";
series1.name = "Confirmados";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "certificado";
series2.dataFields.categoryX = "<?=$dataType?>";
series2.name = "Certificados";
series2.strokeWidth = 3;
series2.tensionX = 0.7;
series2.bullets.push(new am4charts.CircleBullet());

var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "fizeramPedido";
series3.dataFields.categoryX = "<?=$dataType?>";
series3.name = "Pedidos";
series3.strokeWidth = 3;
series3.tensionX = 0.7;
series3.bullets.push(new am4charts.CircleBullet());

var series4 = chart.series.push(new am4charts.LineSeries());
series4.dataFields.valueY = "banido";
series4.dataFields.categoryX = "<?=$dataType?>";
series4.name = "Banidos";
series4.strokeWidth = 3;
series4.tensionX = 0.7;
series4.bullets.push(new am4charts.CircleBullet());

/* Add legend */
chart.legend = new am4charts.Legend();

/* Create a cursor */
chart.cursor = new am4charts.XYCursor();

/* Create chart instance */
var chart = am4core.create("pedidosGraph", am4charts.XYChart);

/* Add data */
chart.data = [
<?php
while($rs=$detalhePedidosGraph->fetchObject()) {
?>
{
  "<?=$dataType?>": "<?=$rs->data?>",
  "aprovado": <?=$rs->Aprovado?>,
  "reprovado": <?=$rs->Reprovado?>,
  "pendente": <?=$rs->Pendente?>,
  "aguardando": <?=$rs->Aguardando?>
},
<?php
}
?>
];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "<?=$dataType?>";

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "aprovado";
series1.dataFields.categoryX = "<?=$dataType?>";
series1.name = "Aprovado";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "reprovado";
series2.dataFields.categoryX = "<?=$dataType?>";
series2.name = "Reprovado";
series2.strokeWidth = 3;
series2.tensionX = 0.7;
series2.bullets.push(new am4charts.CircleBullet());

var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "pendente";
series3.dataFields.categoryX = "<?=$dataType?>";
series3.name = "Pendente";
series3.strokeWidth = 3;
series3.tensionX = 0.7;
series3.bullets.push(new am4charts.CircleBullet());

var series4 = chart.series.push(new am4charts.LineSeries());
series4.dataFields.valueY = "aguardando";
series4.dataFields.categoryX = "<?=$dataType?>";
series4.name = "Aguardando";
series4.strokeWidth = 3;
series4.tensionX = 0.7;
series4.bullets.push(new am4charts.CircleBullet());

/* Add legend */
chart.legend = new am4charts.Legend();

/* Create a cursor */
chart.cursor = new am4charts.XYCursor();

/* Create chart instance */
var chart = am4core.create("faturamentoGraph", am4charts.XYChart);

/* Add data */
chart.data = [

<?php
if($periodo = 'semanal') {
  $faturamentoProduto = $b->query("
  select sum(pp.total) total,DAY (p.dataCadastro) as data,pr.nome
  from PedidoProdutos pp
  inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
  inner join Produtos pr on pp.id_produto=pr.id_produto
  where p.dataCadastro > now() - interval 1 week
  group by DAY (p.dataCadastro),pr.id_produto
  ");
} else {
  $faturamentoProduto = $b->query("
  select sum(pp.total) total,MONTH (p.dataCadastro) as data,pr.nome
  from PedidoProdutos pp
  inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
  inner join Produtos pr on pp.id_produto=pr.id_produto
  group by MONTH (p.dataCadastro),pr.id_produto
  ");
}
while($rs=$faturamentoProduto->fetchObject()){
?>
{
  "<?=$dataType?>": "<?=$rs->data?>",
  "<?=tag($rs->nome, 1)?>": <?=$rs->total?>,
},
<?php
}
?>
];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "<?=$dataType?>";

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
<?php
$faturamentoProduto = $b->query("
select sum(pp.total) total,pr.nome
from PedidoProdutos pp
inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
inner join Produtos pr on pp.id_produto=pr.id_produto
group by pr.nome
");
while($rs=$faturamentoProduto->fetchObject()){
?>
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "<?=tag($rs->nome, 1)?>";
series1.dataFields.categoryX = "<?=$dataType?>";
series1.name = "<?=$rs->nome?>";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());
<?php
}
?>

/* Add legend */
chart.legend = new am4charts.Legend();

/* Create a cursor */
chart.cursor = new am4charts.XYCursor();

//TICKET TAXA
/* Create chart instance */
var chart = am4core.create("ticketTaxaGraph", am4charts.XYChart);

/* Add data */
chart.data = [
<?php
while($rs=$ticketTaxaGraph->fetchObject()) {
?>
{
  "<?=$dataType?>": "<?=$rs->data?>",
  "ticket": <?=$rs->ticketMedio?>,
  "taxa": <?=$rs->taxaConversao?>
},
<?php
}
?>
];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "<?=$dataType?>";

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "ticket";
series1.dataFields.categoryX = "<?=$dataType?>";
series1.name = "Ticket Médio";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "taxa";
series2.dataFields.categoryX = "<?=$dataType?>";
series2.name = "Taxa de Conversão";
series2.strokeWidth = 3;
series2.tensionX = 0.7;
series2.bullets.push(new am4charts.CircleBullet());

/* Add legend */
chart.legend = new am4charts.Legend();

/* Create a cursor */
chart.cursor = new am4charts.XYCursor();
</script>
<?
Inline::b();
?>