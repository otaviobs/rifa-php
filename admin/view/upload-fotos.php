<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel-heading clearfix" style="padding-bottom: 60px !important">
			<h4 class="panel-title">Adicionar Fotos em <?=$rs->h1?$rs->h1:$rs->n?> - LARGURA MÍNIMA <?=$largura?>px <?=$altura?'X ALTURA MÍNIMA '.$altura.'px':''?></h4>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<form id="fileupload" method="POST" enctype="multipart/form-data">
					<div class="row fileupload-buttonbar">
						<div class="col-lg-12">
							<a class="btn btn-danger" href="<?=$a->back?>">
								<i class="glyphicon glyphicon-back"></i>
								<span>VOLTAR</span>
							</a>
							<div class="clearfix" style="height: 20px"></div>
							<span class="btn btn-success fileinput-button">
								<i class="glyphicon glyphicon-plus"></i>
								<span>Adicione ou Arraste Arquivos...</span>
								<input type="file" name="files[]" multiple>
							</span>
							<button type="submit" class="btn btn-primary start">
								<i class="glyphicon glyphicon-upload"></i>
								<span>Iniciar</span>
							</button>
							<button type="reset" class="btn btn-warning cancel">
								<i class="glyphicon glyphicon-ban-circle"></i>
								<span>Cancelar</span>
							</button>
							<button type="button" class="btn btn-danger delete">
								<i class="glyphicon glyphicon-trash"></i>
								<span>Deletar</span>
							</button>
							<input type="checkbox" class="toggle">
							<span>SELECIONAR TODAS</span>
							<span class="fileupload-process"></span>
						</div>
						<div class="col-lg-5 fileupload-progress fade">
							<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-bar progress-bar-success" style="width:0%;"></div>
							</div>
							<div class="progress-extended">&nbsp;</div>
						</div>
					</div>
					<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
				</form>
			</div>
		</div>
	</div>
</div>