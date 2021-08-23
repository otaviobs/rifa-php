<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<h4 class="panel-title"><?=$s->id?'Alterar':'Adicionar'?></h4>
		</div>
		<div class="panel-body">
			<div id="rootwizard">
				<ul class="nav nav-tabs" role="tablist">
<?
echo $NAVS;
?>
				</ul>
				<div class="progress progress-sm m-t-sm">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					</div>
				</div>
				<form id="id-form">
					<div class="tab-content">
<?
echo $TABS;
?>

						<div class="clearfix"></div>
<?
if($mostraHome){
?>
						<div class="form-group col-md-12">
							<label for="home">
								<span style="display:block;float:left;margin-right:5px">Mostrar na Home</span>
								<span><input type="checkbox" id="home" name="home" value="1" class="ckb"<?=$rs->home||!$s->id?' checked':''?>></span>
							</label>
						</div>
<?
}if($hideSTATUS){
?>
						<div class="clearfix" style="height:40px"></div>
<?
}else{
?>
						<div class="form-group col-md-12">
							<label for="s">
								<span style="display:block;float:left;margin-right:5px">Ativo</span>
								<span><input type="checkbox" id="s" name="s" value="1" class="ckb"<?=$rs->s||!$s->id?' checked':''?>></span>
							</label>
						</div>
						<div class="clearfix" style="height:40px"></div>
<?
}
?>
						<ul class="pager wizard" style="display: none">
							<li class="previous"><a href="<?=$SPG.($s->id?'/'.$s->id:'')?>#" class="btn btn-default">Anterior</a></li>
							<li class="next"><a href="<?=$SPG.($s->id?'/'.$s->id:'')?>#" class="btn btn-default">Próximo</a></li>
						</ul>
						<div class="form-group col-md-12 show text-center">
							<input type="submit" class="btn btn-success" style="float: none" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>