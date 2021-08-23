<?php
//if($s->tipoAdm==3)$s->locAdmin('.');
//if($s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Pedidos';
$s->titpg2 = 'Pedidos';
$hideADD = 1;
$SPG = $s->spg;
$s->spg = 'views';

$FILTROS = '
	<div class="cell">
		<select name="status" class="form-control">
			<option value="-1">-- STATUS --</option>
			<option value="0">AGUARDANDO</option>
			<option value="3">PENDENTE</option>
			<option value="1">APROVADO</option>
			<option value="2">REPROVADO</option>
		</select>
	</div>
';

$EXPORT = '
	<div class="cell itxt pull-right">
		<a class="btn btn-success" href="download-pedidos">EXPORTAR PEDIDOS</a>
	</div>
';

Inline::a();
?>
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
	c:{a:'pedido',mt:'este Pedido',ma:'Novo Pedido',add:'pedido/',fn:function(){
		return $(ft.f).serializeObject();
	}},
	e:'#table-0',
	v:'Nenhum Pedido',
	l:'Buscando...',
	img:0,
	ajax:1,
	debugBusca:0,
	debugBuscaText:0,
	debugBuscaXML:0,
	o:'id_pedido desc',
	oi:['id_pedido','dataCadastro','dataAlterado','status','numero_nota_fiscal','quantidade_pontos','nome','statusPedido'],
	th:[
		// {t:2,n:'Imagem',w:104,tt:'n',a:'upload/pedidos/',c:'i',d:'default.jpg',l:2,dl:1},
		{n:'ID',w:250,o:'id_pedido',tt:'id_pedido',l:1,a:'pedido/',c:'id',tb:0},
		{n:'Cadastrado em',w:130,o:'dataCadastro',tt:'_dataCadastro'},
		{n:'Vendedor',w:250,o:'nome',tt:'nome'},
		{n:'Número da Nota',w:250,o:'numero_nota_fiscal',tt:'numero_nota_fiscal'},
		{n:'Status',w:250,o:'status',tt:'statusPedido'},
		// {n:'Alterado em',w:130,o:'dataAlterado',tt:'_dataAlterado'},
		{t:1,n:'Auditar',w:90,o:'status',bt:['','a','']}
	]
});
ft.view = 20;
ft.qt = [10,15,20,30,50,60,100];
</script>
<?
Inline::b();
?>