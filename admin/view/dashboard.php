<style>
.dropdown-menu:before{left:auto;right:9px}
.dropdown-menu:after{left:auto;right:10px}
.morris-hover-row-label{display:none}
.inbox-widget .inbox-item-img img{width:50px}
</style>
<div class="row">
	<div class="col-lg-4 col-md-6">
		<a href="emrpesas">
		<div class="panel info-box panel-white">
			<div class="panel-body">
				<div class="info-box-stats">
<?
$empresas = $b->query("select * from empresa where s");
?>				
					<p class="counter"><?=$empresas->rowCount()?></p>
					<span class="info-box-title">Empresas Cadastradas</span>
				</div>
				<div class="info-box-icon"> <i class="icon-users"></i> </div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-6">
		<a href="categorias">
		<div class="panel info-box panel-white">
			<div class="panel-body">
				<div class="info-box-stats">
<?
$categorias = $b->query("select * from cat where s");
?>				
					<p class="counter"><?=$categorias->rowCount()?></p>
					<span class="info-box-title">Categorias Cadastradas</span>
				</div>
				<div class="info-box-icon"> <i class="glyphicon glyphicon-tasks"></i> </div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-6">
		<a href="empresas">
		<div class="panel info-box panel-white">
			<div class="panel-body">
				<div class="info-box-stats">
<?
$premium = $b->query("select * from empresa where s and pago");
?>				
					<p class="counter"><?=$premium->rowCount()?></p>
					<span class="info-box-title">Empresas Premium</span>
				</div>
				<div class="info-box-icon"> <i class="icon-users"></i> </div>
				<!--<div class="info-box-progress">
					<div class="progress progress-xs progress-squared bs-n">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> </div>
					</div>
				</div>-->
			</div>
		</div>
		</a>
	</div>
</div>

<?php/*<div id="table-0" class="tabela2 row">
	<div class="col-lg-12 col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading">
				<form id="id-form-filtro" onsubmit="return adm.busca();">
					<div class="lrow tab">
						<div class="cell">
							<select name="qt" title="Exibir" class="form-control"></select>
						</div>
						<div class="cell"><select name="a" class="form-control"></select></div>
<?
if($s->tipoAdm<3){
?>
						<div class="cell"><select name="idc" class="form-control"></select></div>
<?
}
?>
						<div class="cell w110">
							<input type="text" name="di" class="mk-data form-control" placeholder="Data inicial"/>
						</div>
						<div class="cell w110">
							<input type="text" name="df" class="mk-data form-control" placeholder="Data final"/>
						</div>
						<div class="cell w410">
							<input type="text" name="q" class="filtro-q form-control"/>
						</div>
						<div class="left">
							<button class="btn right btn-success busca-bt"><i class="fa fa-search"></i></button>
						</div>
						<!--<div class="checker" style="margin-top:8px"><span><input type="checkbox" name="rel" value="1" title="Pesquisa com Relevâcia"></span></div>
						<div class="cell right"><a class="filtro-bt"></a></div>-->
					</div>
				</form>
			</div>
			<div class="panel-body">
				<div class="table-responsive project-stats">
					<div class="lrow tab bold count">
						<div class="cell left"><span class="reg-encontrado"></span> registro(s)</div>
						<div class="cell left">Página <span class="pagina-atual"></span> de <span class="pagina-total"></span></div>
						<div class="cell paginacao-buts"></div>
						<div class="cell right"><a class="add btn btn-success"><i class="fa fa-file-text-o m-r-xs"></i> Novo Chamado</a></div>
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
						<div class="cell right"><a class="add btn btn-success"><i class="fa fa-file-text-o m-r-xs"></i> Novo Chamado</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>*/?>
<!-- Row -->
<div class="row">

<?
if($s->tipoAdm==1){
?>
	<div class="col-lg-12 col-md-12">
		<div class="panel panel-white">
			<div class="row">
				<div class="col-sm-12">
					<div class="visitors-chart">
						<div class="panel-heading" style="overflow:visible">
							<h4 class="panel-title">Gráfico e Visitas</h4>
							<div class="btn-group" style="margin:-5px 0 0 10px">
								<!--<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Por Período <span class="caret"></span> </button>-->
								<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Selecionar Ano<span class="caret"></span></button>
								<ul class="dropdown-menu anos" role="menu">
									<li><a data-ano="<?=date("Y")?>"><?=date("Y")?></a></li>
									<li><a data-ano="<?=date("Y",strtotime('-1 years'))?>"><?=date("Y",strtotime('-1 years'))?></a></li>
									<li><a data-ano="<?=date("Y",strtotime('-2 years'))?>"><?=date("Y",strtotime('-2 years'))?></a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body grafico-visitas">
							<div id="morris3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-white" style="height: 100%;">
			<div class="panel-heading">
				<h4 class="panel-title">Assuntos</h4>
				<div class="panel-control">
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Abrir / Fechar" class="panel-collapse"><i class="icon-arrow-down"></i></a>
				</div>
			</div>
			<div class="panel-body">
				<div id="morris4"></div>
			</div>
		</div>
	</div>
<?
}
?>
</div>
<?php
Inline::a();
?>
<script src="assets/js/admin/waves.min.js"></script>
<script src="assets/js/admin/modern.min.js"></script>
<script type="text/javascript" src="assets/js/admin/morris.min.js"></script>
<script type="text/javascript" src="assets/js/admin/raphael.min.js"></script>
<script type="text/javascript">
__c = 3;
var meses = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
var mesesm = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

$('.anos a').on('click',function(){
	ano = $(this).data('ano');
	$.get('a/g/chamado-ano.json',{ano:ano},function(x){
	},'json').success(function(x){
		datas = "data: ["+x.dados+"]";
		console.log(x.dados);
		console.log(x.r);
		if(x.ok){
			$('.grafico-visitas #morris3').remove();
			$('.grafico-visitas').append('<div id="morris3"></div>');
			Morris.Line({
				element: 'morris3',
				data: x.r,
				//datas,
				xkey: 'data',
				xLabels: 'month',
				xLabelFormat: function (x) { return meses[x.getMonth()]; },
				ykeys: ['visualizacoes'],
				labels: ['Visualizações'],
				resize: true,
				lineColors: ['#b1bd4b', '#748647']
			});
		}else alert('Não há chamados no ano '+ano);
	});
});

if(__c==3)Morris.Line({
    element: 'morris3',
    data: [
<?
	// $sano = $b->query("select count(case when a=1 then 1 end) aberto,count(case when a=2 then 1 end) AS fechado,YEAR(dc) ano,MONTH(dc) mes from chamado where YEAR(dc)>=YEAR(now()) group by MONTH(dc)");
	$sano = $b->query("select count(*) qtd,YEAR(dc) ano,MONTH(dc) mes from empresa_view where id_empresa=3 and YEAR(dc)>=YEAR(now()) group by MONTH(dc)");
	while($rano=$sano->fetchObject()){
?>		
        { ano: '<?=$rano->ano?>', data: '<?=$rano->ano.'-'.$rano->mes?>', visualizacoes: '<?=$rano->qtd?>' },
<?
	}
?>
    ],
    xkey: 'data',
		xLabels: 'month',
		//dateFormat: function (x) { return meses[x.getMonth()]; },
		xLabelFormat: function (x) { return meses[x.getMonth()]; },
    ykeys: ['visualizacoes'],
    labels: ['Visualizações'],
    resize: true,
    lineColors: ['#b1bd4b']
});
Morris.Donut({
    element: 'morris4',
    data: [
<?
	// $sass = $b->query("select d.n dn,count(*) q,round((count(*) / (select count(*) from chamado)) * 100) as p from chamado c inner join departamento d on c.idd=d.id group by c.idd");
	// while($rass=$sass->fetchObject()){
?>
        // {label: '<?=$rass->dn?>', value:<?=$rass->p?>},
<?
	// }
?>
    ],
    resize: true,
    colors: ['#fbeb6a', '#b1bd4b', '#748647','#90b0ba','#8697cb','#00d63c','#f3d55a','#ff9a63','#e866ff','#1a5494','#bcdb8b','#556080','#9383f7','#f25656','#ccc','#f00'],
});

$('.encaminhar').on('click',function(){
	$('.popover').removeClass('open').hide();
	var id = $(this).data('id'),con = $('#popup-encaminhar-'+id);
	if(con.hasClass('open'))con.removeClass('open').hide();
	else con.addClass('open').show();
});
$('.cancel').on('click',function(){
	var id = $(this).data('id'),con = $('#popup-encaminhar-'+id);
	con.removeClass('open').hide();
});
function encaminhar(id){
	var idd = $('.idd-'+id).val();
	$.post('a/u/encaminhar.json',{id:id,idd:idd},function(x){
		if(x.m){
			$('#sys-notification-encaminhar-'+id).show();
			var answer = x.ok==1?'success':'danger';
			var icon = x.ok==1?'check':'question';
			$('#encaminhar-notification-'+id).html('<div class=\"alert alert-'+answer+'\"><i class=\"fa fa-'+icon+'-circle\"></i> '+x.m+'<button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"margin:0\">×</button></div>').show();
			setTimeout(function(){
				$('#encaminhar-notification-'+id).hide();
			},5000);
		}
	},'json').success(function(x){
		if(x.ok==1){
			setTimeout(function(){
				//var con = $('#popup-encaminhar-'+id);
				//con.removeClass('open').hide();
				if(x.l)location.href = x.l;
			},1000);
		}
	});
}
</script>
<?php
Inline::b();
?>