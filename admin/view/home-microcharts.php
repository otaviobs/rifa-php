<style>
svg {max-height:120px}
.panel-heading strong,.inbox-item strong{float:right}
.info-box-progress{display:none}
.cards .panel-body{padding-bottom:0}
.filter{margin-bottom:20px}
</style>
<div id="main-wrapper">
  <div class="row">
    <div class="col-lg-12 filter">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          PERÍODO
          <span class="caret"></span>
        </button>
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
          <div id="graphLojas"></div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <div id="chartdiv"></div>
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
          <div id="graphVendedores"></div>
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
          <div id="graphPedidos"></div>
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
            <p class="counter taxa-count"><?=$taxaConversao->valor?>%</p>
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
          <div id="graphConversao"></div>
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
            <p class="counter ticket-count"><?=$ticketMedio->valor?></p>
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
          <div id="graphTicket"></div>
        </div>
      </div>
      <div class="panel info-box panel-white">
        <div class="visitors-chart">
          <div id="graphTicket"></div>
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
          <div id="graphFaturamento"></div>
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

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {
  // Themes begin
  am4core.useTheme(am4themes_material);
  // Themes end

  // Create chart instance
  var container = am4core.create("graphLojas", am4core.Container);
  container.layout = "block";
  container.fixedWidthGrid = false;
  container.width = am4core.percent(100);
  container.height = am4core.percent(100);

  // Color set
  var colors = new am4core.ColorSet();

  // Functions that create various sparklines
  function createLineLojas(title, data, color) {

    var chart = container.createChild(am4charts.XYChart);
    chart.width = am4core.percent(45);
    chart.height = 70;

    chart.data = data;

    chart.titles.template.fontSize = 10;
    chart.titles.template.textAlign = "left";
    chart.titles.template.isMeasured = false;
    chart.titles.create().text = title;

    chart.padding(20, 5, 2, 5);

    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.startLocation = 0.5;
    dateAxis.endLocation = 0.7;
    dateAxis.cursorTooltipEnabled = false;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.baseGrid.disabled = true;
    valueAxis.renderer.labels.template.disabled = true;
    valueAxis.cursorTooltipEnabled = false;

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.lineY.disabled = true;
    chart.cursor.behavior = "none";

    var series = chart.series.push(new am4charts.LineSeries());
    series.tooltipText = "{date}: [bold]{value}";
    series.dataFields.dateX = "date";
    series.dataFields.valueY = "value";
    series.tensionX = 0.8;
    series.strokeWidth = 2;
    series.stroke = color;

    // render data points as bullets
    var bullet = series.bullets.push(new am4charts.CircleBullet());
    bullet.circle.opacity = 0;
    bullet.circle.fill = color;
    bullet.circle.propertyFields.opacity = "opacity";
    bullet.circle.radius = 3;

    return chart;
  }

  createLineLojas("", [
<?php
while($rsGraph=$lojasGraph->fetchObject()) {
  if($periodo=='mensal'){
?>
      { "date": new Date(2021, <?=$rsGraph->data?>, 1), "value": <?=$rsGraph->quantidade?> },
<?php
  }else {
?>
      { "date": new Date(2021, <?=date('m', strtotime(' - 1 month'))?>, <?=$rsGraph->data?>), "value": <?=$rsGraph->quantidade?> },
<?php
  }
}
?>
   ], '#22BAA0');
   
   // Create chart instance
   var container = am4core.create("graphVendedores", am4core.Container);
   container.layout = "block";
   container.fixedWidthGrid = false;
   container.width = am4core.percent(100);
   container.height = am4core.percent(100);
 
   // Color set
   var colors = new am4core.ColorSet();
 
   // Functions that create various sparklines
   function createLineVendedores(title, data, color) {
 
     var chart = container.createChild(am4charts.XYChart);
     chart.width = am4core.percent(45);
     chart.height = 70;
 
     chart.data = data;
 
     chart.titles.template.fontSize = 10;
     chart.titles.template.textAlign = "left";
     chart.titles.template.isMeasured = false;
     chart.titles.create().text = title;
 
     chart.padding(20, 5, 2, 5);
 
     var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
     dateAxis.renderer.grid.template.disabled = true;
     dateAxis.renderer.labels.template.disabled = true;
     dateAxis.startLocation = 0.5;
     dateAxis.endLocation = 0.7;
     dateAxis.cursorTooltipEnabled = false;
 
     var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
     valueAxis.min = 0;
     valueAxis.renderer.grid.template.disabled = true;
     valueAxis.renderer.baseGrid.disabled = true;
     valueAxis.renderer.labels.template.disabled = true;
     valueAxis.cursorTooltipEnabled = false;
 
     chart.cursor = new am4charts.XYCursor();
     chart.cursor.lineY.disabled = true;
     chart.cursor.behavior = "none";
 
     var series = chart.series.push(new am4charts.LineSeries());
     series.tooltipText = "{date}: [bold]{value}";
     series.dataFields.dateX = "date";
     series.dataFields.valueY = "value";
     series.tensionX = 0.8;
     series.strokeWidth = 2;
     series.stroke = color;
 
     // render data points as bullets
     var bullet = series.bullets.push(new am4charts.CircleBullet());
     bullet.circle.opacity = 0;
     bullet.circle.fill = color;
     bullet.circle.propertyFields.opacity = "opacity";
     bullet.circle.radius = 3;
 
     return chart;
   }
 
   createLineVendedores("", [
<?php
while($rsGraph=$vendedoresGraph->fetchObject()) {
  if($periodo=='mensal'){
?>
      { "date": new Date(2021, <?=$rsGraph->data?>, 1), "value": <?=$rsGraph->quantidade?> },
<?php
  }else {
?>
      { "date": new Date(2021, <?=date('m', strtotime(' - 1 month'))?>, <?=$rsGraph->data?>), "value": <?=$rsGraph->quantidade?> },
<?php
  }
}
?>
    ], '#22BAA0');
   
   // Create chart instance
   var container = am4core.create("graphPedidos", am4core.Container);
   container.layout = "block";
   container.fixedWidthGrid = false;
   container.width = am4core.percent(100);
   container.height = am4core.percent(100);
 
   // Color set
   var colors = new am4core.ColorSet();
 
   // Functions that create various sparklines
   function createLinePedidos(title, data, color) {
 
     var chart = container.createChild(am4charts.XYChart);
     chart.width = am4core.percent(45);
     chart.height = 70;
 
     chart.data = data;
 
     chart.titles.template.fontSize = 10;
     chart.titles.template.textAlign = "left";
     chart.titles.template.isMeasured = false;
     chart.titles.create().text = title;
 
     chart.padding(20, 5, 2, 5);
 
     var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
     dateAxis.renderer.grid.template.disabled = true;
     dateAxis.renderer.labels.template.disabled = true;
     dateAxis.startLocation = 0.5;
     dateAxis.endLocation = 0.7;
     dateAxis.cursorTooltipEnabled = false;
 
     var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
     valueAxis.min = 0;
     valueAxis.renderer.grid.template.disabled = true;
     valueAxis.renderer.baseGrid.disabled = true;
     valueAxis.renderer.labels.template.disabled = true;
     valueAxis.cursorTooltipEnabled = false;
 
     chart.cursor = new am4charts.XYCursor();
     chart.cursor.lineY.disabled = true;
     chart.cursor.behavior = "none";
 
     var series = chart.series.push(new am4charts.LineSeries());
     series.tooltipText = "{date}: [bold]{value}";
     series.dataFields.dateX = "date";
     series.dataFields.valueY = "value";
     series.tensionX = 0.8;
     series.strokeWidth = 2;
     series.stroke = color;
 
     // render data points as bullets
     var bullet = series.bullets.push(new am4charts.CircleBullet());
     bullet.circle.opacity = 0;
     bullet.circle.fill = color;
     bullet.circle.propertyFields.opacity = "opacity";
     bullet.circle.radius = 3;
 
     return chart;
   }
 
   createLinePedidos("", [
<?php
while($rsGraph=$pedidosGraph->fetchObject()) {
  if($periodo=='mensal'){
?>
      { "date": new Date(2021, <?=$rsGraph->data?>, 1), "value": <?=$rsGraph->quantidade?> },
<?php
  }else {
?>
      { "date": new Date(2021, <?=date('m', strtotime(' - 1 month'))?>, <?=$rsGraph->data?>), "value": <?=$rsGraph->quantidade?> },
<?php
  }
}
?>
    ], '#22BAA0');

    // Create chart instance
   var container = am4core.create("graphConversao", am4core.Container);
   container.layout = "block";
   container.fixedWidthGrid = false;
   container.width = am4core.percent(100);
   container.height = am4core.percent(100);
 
   // Color set
   var colors = new am4core.ColorSet();
 
   // Functions that create various sparklines
   function createLineConversao(title, data, color) {
 
     var chart = container.createChild(am4charts.XYChart);
     chart.width = am4core.percent(45);
     chart.height = 70;
 
     chart.data = data;
 
     chart.titles.template.fontSize = 10;
     chart.titles.template.textAlign = "left";
     chart.titles.template.isMeasured = false;
     chart.titles.create().text = title;
 
     chart.padding(20, 5, 2, 5);
 
     var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
     dateAxis.renderer.grid.template.disabled = true;
     dateAxis.renderer.labels.template.disabled = true;
     dateAxis.startLocation = 0.5;
     dateAxis.endLocation = 0.7;
     dateAxis.cursorTooltipEnabled = false;
 
     var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
     valueAxis.min = 0;
     valueAxis.renderer.grid.template.disabled = true;
     valueAxis.renderer.baseGrid.disabled = true;
     valueAxis.renderer.labels.template.disabled = true;
     valueAxis.cursorTooltipEnabled = false;
 
     chart.cursor = new am4charts.XYCursor();
     chart.cursor.lineY.disabled = true;
     chart.cursor.behavior = "none";
 
     var series = chart.series.push(new am4charts.LineSeries());
     series.tooltipText = "{date}: [bold]{value}";
     series.dataFields.dateX = "date";
     series.dataFields.valueY = "value";
     series.tensionX = 0.8;
     series.strokeWidth = 2;
     series.stroke = color;
 
     // render data points as bullets
     var bullet = series.bullets.push(new am4charts.CircleBullet());
     bullet.circle.opacity = 0;
     bullet.circle.fill = color;
     bullet.circle.propertyFields.opacity = "opacity";
     bullet.circle.radius = 3;
 
     return chart;
   }
 
   createLineConversao("", [
<?php
while($rsGraph=$taxaConversaoGraph->fetchObject()) {
  if($periodo=='mensal'){
?>
      { "date": new Date(2021, <?=$rsGraph->data?>, 1), "value": <?=$rsGraph->quantidade?> },
<?php
  }else {
?>
      { "date": new Date(2021, <?=date('m', strtotime(' - 1 month'))?>, <?=$rsGraph->data?>), "value": <?=$rsGraph->quantidade?> },
<?php
  }
}
?>
    ], '#22BAA0');

    // Create chart instance
   var container = am4core.create("graphTicket", am4core.Container);
   container.layout = "block";
   container.fixedWidthGrid = false;
   container.width = am4core.percent(100);
   container.height = am4core.percent(100);
 
   // Color set
   var colors = new am4core.ColorSet();
 
   // Functions that create various sparklines
   function createLineTicket(title, data, color) {
 
     var chart = container.createChild(am4charts.XYChart);
     chart.width = am4core.percent(45);
     chart.height = 70;
 
     chart.data = data;
 
     chart.titles.template.fontSize = 10;
     chart.titles.template.textAlign = "left";
     chart.titles.template.isMeasured = false;
     chart.titles.create().text = title;
 
     chart.padding(20, 5, 2, 5);
 
     var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
     dateAxis.renderer.grid.template.disabled = true;
     dateAxis.renderer.labels.template.disabled = true;
     dateAxis.startLocation = 0.5;
     dateAxis.endLocation = 0.7;
     dateAxis.cursorTooltipEnabled = false;
 
     var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
     valueAxis.min = 0;
     valueAxis.renderer.grid.template.disabled = true;
     valueAxis.renderer.baseGrid.disabled = true;
     valueAxis.renderer.labels.template.disabled = true;
     valueAxis.cursorTooltipEnabled = false;
 
     chart.cursor = new am4charts.XYCursor();
     chart.cursor.lineY.disabled = true;
     chart.cursor.behavior = "none";
 
     var series = chart.series.push(new am4charts.LineSeries());
     series.tooltipText = "{date}: [bold]{value}";
     series.dataFields.dateX = "date";
     series.dataFields.valueY = "value";
     series.tensionX = 0.8;
     series.strokeWidth = 2;
     series.stroke = color;
 
     // render data points as bullets
     var bullet = series.bullets.push(new am4charts.CircleBullet());
     bullet.circle.opacity = 0;
     bullet.circle.fill = color;
     bullet.circle.propertyFields.opacity = "opacity";
     bullet.circle.radius = 3;
 
     return chart;
   }
 
   createLineTicket("", [
<?php
while($rsGraph=$ticketMedioGraph->fetchObject()) {
  if($periodo=='mensal'){
?>
      { "date": new Date(2021, <?=$rsGraph->data?>, 1), "value": <?=$rsGraph->quantidade?> },
<?php
  }else {
?>
      { "date": new Date(2021, <?=date('m', strtotime(' - 1 month'))?>, <?=$rsGraph->data?>), "value": <?=$rsGraph->quantidade?> },
<?php
  }
}
?>
    ], '#22BAA0');

    // Create chart instance
   var container = am4core.create("graphFaturamento", am4core.Container);
   container.layout = "block";
   container.fixedWidthGrid = false;
   container.width = am4core.percent(100);
   container.height = am4core.percent(100);
 
   // Color set
   var colors = new am4core.ColorSet();
 
   // Functions that create various sparklines
   function createLineFaturamento(title, data, color) {
 
     var chart = container.createChild(am4charts.XYChart);
     chart.width = am4core.percent(45);
     chart.height = 70;
 
     chart.data = data;
 
     chart.titles.template.fontSize = 10;
     chart.titles.template.textAlign = "left";
     chart.titles.template.isMeasured = false;
     chart.titles.create().text = title;
 
     chart.padding(20, 5, 2, 5);
 
     var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
     dateAxis.renderer.grid.template.disabled = true;
     dateAxis.renderer.labels.template.disabled = true;
     dateAxis.startLocation = 0.5;
     dateAxis.endLocation = 0.7;
     dateAxis.cursorTooltipEnabled = false;
 
     var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
     valueAxis.min = 0;
     valueAxis.renderer.grid.template.disabled = true;
     valueAxis.renderer.baseGrid.disabled = true;
     valueAxis.renderer.labels.template.disabled = true;
     valueAxis.cursorTooltipEnabled = false;
 
     chart.cursor = new am4charts.XYCursor();
     chart.cursor.lineY.disabled = true;
     chart.cursor.behavior = "none";
 
     var series = chart.series.push(new am4charts.LineSeries());
     series.tooltipText = "{date}: [bold]{value}";
     series.dataFields.dateX = "date";
     series.dataFields.valueY = "value";
     series.tensionX = 0.8;
     series.strokeWidth = 2;
     series.stroke = color;
 
     // render data points as bullets
     var bullet = series.bullets.push(new am4charts.CircleBullet());
     bullet.circle.opacity = 0;
     bullet.circle.fill = color;
     bullet.circle.propertyFields.opacity = "opacity";
     bullet.circle.radius = 3;
 
     return chart;
   }
 
   createLineFaturamento("", [
<?php
while($rsGraph=$faturamentoGraph->fetchObject()) {
  if($periodo=='mensal'){
?>
      { "date": new Date(2021, <?=$rsGraph->data?>, 1), "value": <?=$rsGraph->quantidade?> },
<?php
  }else {
?>
      { "date": new Date(2021, <?=date('m', strtotime(' - 1 month'))?>, <?=$rsGraph->data?>), "value": <?=$rsGraph->quantidade?> },
<?php
  }
}
?>
    ], '#22BAA0');
});
</script>

<?
Inline::b();
?>