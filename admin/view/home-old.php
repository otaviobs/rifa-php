<style>
.graphs{margin-top:25px}
.panel-heading strong,.inbox-item strong{float:right}
.info-box-progress{display:none}
.cards .panel-body{padding-bottom:0}
.filter{margin-bottom:20px}
</style>
<div id="main-wrapper">
  <div class="row">
    <div class="col-lg-12 filter">
      <div class="btn-group" role="group">
        <!-- <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          PERÍODO
          <span class="caret"></span>
        </button> -->
        <ul class="dropdown-menu" id="periodo">
          <li><a data-value="semanal">Últimos 7 dias</a></li>
          <li><a data-value="mensal">Mensal</a></li>
        </ul>
      </div>
      <a href="download-planilhao" class="btn btn-success pull-right export">EXPORTAR DADOS</a>
    </div>
  </div>
  <div class="row cards">
    <div class="col-lg-2 col-md-6">
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
    <div class="col-lg-2 col-md-6">
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
    <div class="col-lg-2 col-md-6">
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
    <div class="col-lg-2 col-md-6">
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
    <div class="col-lg-4 col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h4 class="panel-title">Vendedores</h4>
          <strong><?=$detalheVendedores->Total?></strong>
        </div>
        <div class="panel-body">
          <div class="inbox-item">
            <p>Confirmado <strong><?=$detalheVendedores->Confirmado?></strong></p>
            <p>Elegiveis <strong><?=$detalheVendedores->Elegivel?></strong></p>
            <p>Fizeram Pedido <strong><?=$detalheVendedores->fizeramPedido?></strong></p>
            <p>Banido <strong><?=$detalheVendedores->Banido?></strong></p>
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
          <h4 class="panel-title">Faturamento</h4>
          <strong><?=$faturamentoTotal?></strong>
        </div>
        <div class="panel-body">
          <div class="inbox-item">
<?php
$produtos = $b->query("select * from Produtos where status=1");
while($produto=$produtos->fetchObject()){
  $faturamentoProduto = $b->query("
  select sum(pp.total) total
  from PedidoProdutos pp
  inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
  where pp.id_produto={$produto->id_produto}
")->fetchObject();
  if($faturamentoProduto->total>=1000) {
    $thousand = get_thousands($faturamentoProduto->total);
    $faturamentoProdutoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  } else {
    $faturamentoProdutoTotal = nreal($faturamentoProduto->total);
  }
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
        <div class="panel-heading">
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
        </div>
        <div class="panel-body">
          <div class="table-responsive project-stats">
            <div class="lrow tab bold count">
              <div class="cell left"><span class="reg-encontrado"></span> registro(s)</div>
              <div class="cell left">Página <span class="pagina-atual"></span> de <span class="pagina-total"></span></div>
              <div class="cell paginacao-buts"></div>
            </div>
            
            <table class="display table dataTable">
              <thead><tr class="lrow th"></tr></thead>
              <tbody class="tab-lista"></tbody>
              <tbody class="lrow void"></tbody>
              <tbody class="lrow loading"></tbody>
              <thead><tr class="lrow th"></tr></thead>
            </table>
            
            <div class="lrow tab bold count">
              <div class="cell left"><span class="reg-encontrado"></span> registro(s)</div>
              <div class="cell left">Página <span class="pagina-atual"></span> de <span class="pagina-total"></span></div>
              <div class="cell paginacao-buts"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
Inline::a();
?>
<script type="text/javascript">
$(document).on('click', '#periodo a', function(){
  var periodo = $(this).data('value');
  location.href = '?periodo='+periodo;
  // $.get('ajax/dashboard.json',{periodo:periodo}, function(x) {
  //   if(x.lojas)$('.lojas-count').html(x.lojas);
  //   if(x.vendedores)$('.vendedores-count').html(x.vendedores);
  //   if(x.pedidos)$('.pedidos-count').html(x.pedidos);
  //   if(x.taxaConversao)$('.taxa-count').html(x.taxaConversao);
  //   if(x.ticketMedio)$('.ticket-count').html(x.ticketMedio);
  //   if(x.faturamento)$('.faturamento-count').html(x.faturamento);
  //   createLineFaturamento("", [
  //     { "date": new Date(2021, 9, 1), "value": 10 },
  //     { "date": new Date(2021, 10, 1), "value": 100 },
  //   ], '#f00');
  // });
});
</script>
<script type="text/javascript">
var ft = {}

$(function(){
	var _ = ft,f = $('#id-form-filtro')[0],e,o,i=0,k;
	_.f = f;

	e = f.qt;
	o = e.options;
	$.each(_.qt,function(i,v){
		o[i=o.length] = new Option(v,v);
		if(_.view==v)e.selectedIndex = i;
	});
});

var adm = $.tab({
	c:{a:'ranking',mt:'este Vendedor',ma:'Novo Vendedores',add:'vendedor/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Vendedor',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'pontos desc',
	oi:['id_usuario','pontos','estado','loja','nome','ranking','produtos'],
	th:[
		{n:'Posição',w:290,o:'pontos',tt:'rank',l:1},
		{n:'Vendedor',w:290,o:'nome',l:1},
    {n:'Loja',w:290,o:'loja',l:1},
    {n:'Estado',w:290,o:'estado',l:1},
    {n:'Quantidade de Produtos',w:290,o:'produtos',l:1},
    {n:'Pontos',w:290,o:'pontos',l:1},
	]
});
ft.view = 30;
ft.qt = [1,10,15,20,30,50,60,100];
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
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
  "month": "<?=$rs->mes?>",
  "confirmado": <?=$rs->Confirmado?>,
  "elegiveis": <?=$rs->Elegivel?>,
  "fizeramPedido": <?=$rs->fizeramPedido?>,
  "banido": <?=$rs->Banido?>
},
<?php
}
?>
];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "month";

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "confirmado";
series1.dataFields.categoryX = "month";
series1.name = "Confirmado";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "elegiveis";
series2.dataFields.categoryX = "month";
series2.name = "Elegiveis";
series2.strokeWidth = 3;
series2.tensionX = 0.7;
series2.bullets.push(new am4charts.CircleBullet());

var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "fizeramPedido";
series3.dataFields.categoryX = "month";
series3.name = "Pedido";
series3.strokeWidth = 3;
series3.tensionX = 0.7;
series3.bullets.push(new am4charts.CircleBullet());

var series4 = chart.series.push(new am4charts.LineSeries());
series4.dataFields.valueY = "banido";
series4.dataFields.categoryX = "month";
series4.name = "Banido";
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
  "month": "<?=$rs->mes?>",
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
categoryAxis.dataFields.category = "month";

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "aprovado";
series1.dataFields.categoryX = "month";
series1.name = "Aprovado";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "reprovado";
series2.dataFields.categoryX = "month";
series2.name = "Reprovado";
series2.strokeWidth = 3;
series2.tensionX = 0.7;
series2.bullets.push(new am4charts.CircleBullet());

var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "pendente";
series3.dataFields.categoryX = "month";
series3.name = "Pendente";
series3.strokeWidth = 3;
series3.tensionX = 0.7;
series3.bullets.push(new am4charts.CircleBullet());

var series4 = chart.series.push(new am4charts.LineSeries());
series4.dataFields.valueY = "aguardando";
series4.dataFields.categoryX = "month";
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
$faturamentoProduto = $b->query("
select sum(pp.total) total,MONTH (p.dataCadastro) mes,pr.nome
from PedidoProdutos pp
inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
inner join Produtos pr on pp.id_produto=pr.id_produto
group by MONTH (p.dataCadastro),pr.id_produto
");
while($rs=$faturamentoProduto->fetchObject()){
?>
{
  "month": "<?=$rs->mes?>",
  "<?=tag($rs->nome, 1)?>": <?=$rs->total?>,
},
<?php
}
?>
];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "month";

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
series1.dataFields.categoryX = "month";
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
</script>
<?
Inline::b();
?>