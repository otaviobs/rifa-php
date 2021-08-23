<div id="table-0" class="tabela2 col-lg-12 col-md-12">
	<div class="panel panel-white">
		<div class="panel-heading">
			<form id="id-form-filtro" onsubmit="return adm.busca();">
<?
if($s->id)echo '<input type="hidden" name="id" value="'.$s->id.'"/>';
?>
				<div class="lrow tab">
					<div class="cell">
						<select name="qt" title="Exibir" class="form-control"></select>
					</div>
<?
echo $FILTROS;
?>
					<div class="cell itxt">
						<input type="text" name="q" class="filtro-q form-control" placeholder="Pesquisar" />
					</div>
					<!-- <div class="checker" style="margin-top:8px"><span><input type="checkbox" name="rel" value="1" title="Pesquisa com Relevâcia"></span></div> -->
					<div class="cell left" style="margin-top: 5px"><a class="filtro-bt"></a></div>
<?
echo $EXPORT;
?>

				</div>
			</form>
		</div>
		<div class="panel-body">
			<div class="table-responsive project-stats">
				<div class="lrow tab bold count">
					<div class="cell left"><span class="reg-encontrado"></span> registro(s)</div>
					<div class="cell left">Página <span class="pagina-atual"></span> de <span class="pagina-total"></span></div>
					<div class="cell paginacao-buts"></div>
					<div class="cell right"><?=($temOrder?'<span class="save-pos"></span>':'').($hideADD?'':'<a class="tab-add"></a>')?></div>
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
					<div class="cell right"><?=($temOrder?'<span class="save-pos"></span>':'').($hideADD?'':'<a class="tab-add"></a>')?></div>
				</div>
			</div>
		</div>
	</div>
</div>