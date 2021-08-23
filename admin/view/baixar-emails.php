<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<h4 class="panel-title">Baixar E-mails</h4>
		</div>
		<div class="panel-body">
			<form id="id-form" method="post" action="ajax/email-txt.down" target="_blank">
				<h3>Lista de E-mails</h3>
				<div class="form-group col-sm-4 col-xs-12">
					<label for="tipo">Tipo de Arquivo</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="txt">TXT</option>
						<option value="csv">CSV</option>
						<option value="xls">XLS</option>
					</select>
				</div>
				<div class="form-group col-sm-8 col-xs-12">
					<label for="idg">Grupo</label>
					<select class="form-control" id="idg" name="idg"></select>
				</div>
				<div class="form-group col-md-12">
					<label for="a">Receber Ativado:</label>
					<input type="checkbox" id="a" name="a" value="1" class="form-control" checked="checked"/>
				</div>
				<div class="form-group col-md-12">
					<label for="d">Receber Desativado:</label>
					<input type="checkbox" id="d" name="d" value="1" class="form-control"/>
				</div>
				<div class="form-group col-md-12">
					<input type="submit" value="Baixar" class="btn btn-success"/>
				</div>
			</form>
		</div>
	</div>
</div>
<?
Inline::a();
?>
<script type="text/javascript">
var ft = {}

$(function(){
	var _ = ft,f = $('#id-form')[0],e,o;
	_.f = f;

	e = f.idg;
	o = e.options;
	$.each(_.gru,function(i,v){
		o[i=o.length] = new Option(v[0],v[1]);
		if(v[1]==_.idg)e.selectedIndex = i;
	});
});

$(document).on('change','#tipo',function(){
	var tipo = $(this).val();
	if(tipo=='txt'||tipo=='csv'||tipo=='xls')$('#id-form').attr('action','ajax/email-'+tipo+'.down');
	else $('#id-form').attr('action','ajax/email-txt.down');
});
</script>
<script type="text/javascript">
$.extend(ft,<?=json_encode($a)?>);
</script>
<?
Inline::b();
?>