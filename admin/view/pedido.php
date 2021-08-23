<style>
.panel-body .mb8{border-bottom:solid 1px #ebebeb;padding-bottom:8px}
.comentario{display: none}
.panel-body .mb8{padding-bottom:12px!important;margin-bottom:12px!important}
.forma-status{font-weight:bold}
.forma.reprovado{color: red}
.forma.aprovado{color: green}
.forma.pendente{color: yellow}
#nota{margin-bottom:40px;margin-top: -10px}
#nota img{max-width:100%}
#nota .zoom{opacity: 0;margin-bottom: 15px}
small{display:block;margin-top:7px;font-size:90%}
</style>
<?
if(!$s->id){
?>
<div class="col-md-12">
	<div class="panel panel-white">
		<div class="panel panel-info">
			<div class="panel-heading" style="height:auto"><h3 class="panel-title uppercase">Buscar Pedido</h3></div>
			<div class="panel-body" style="margin-top:15px">
				<div class="panel-body">
					<form class="form center mb" onsubmit="return adm.go();">
						<div class="form-group col-md-12">
							<div class="input-group m-t-sm">
								<span class="input-group-addon" id="basic-addon1">ID DO PEDIDO</span>
								<input type="text" id="idq" value="<?=$s->id?$s->id:''?>" class="form-control"/>
								<span class="input-group-btn" style="background-color:#f1f1f1;border:1px solid #e5e5e5;padding:0 5px">
									<span id="ids" class="ico isearch" title="Buscar Pedido" onclick="adm.go();"></span>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?
}if($s->id){
?>
<div class="tabela2 row">
	<div class="panel panel-white" style="background:transparent">
		<div class="panel-body pedido">
			<div class="tabela2 col-md-12">
				<a class="btn btn-danger btn-fechar" style="margin-bottom:20px">FECHAR</a>
			</div>
			<div class="tabela2 col-lg-6 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading" style="height:auto"><h3 class="panel-title uppercase">Dados do Vendedor</h3></div>
					<div class="panel-body" style="margin-top:15px">
						<div class="uppercase mb8"><strong>Vendedor:</strong> <span class="forma"><?=$rs->nome?></span></div>
						<div class="uppercase mb8"><strong>Data de Cadastro:</strong> <span class="forma"><?=datef($rs->dataCadastro, 8)?></span></div>
						<div class="uppercase mb8">
							<strong>CNPJ:</strong> <span class="forma"><?=$rs->cnpj?></span>
<?php
	if(!$loja){
?>
							<a href="loja?cnpj=<?=$rs->cnpj?>" target="_blank" class="pull-right btn btn-success" style="margin-top:-7px">CADASTRAR LOJA</a>
<?php
	}
?>
						</div>
<?php
	if($loja){
?>
							<div class="uppercase mb8">
								<strong>LOJA:</strong> <span class="forma"><?=$loja->nome?></span>
							</div>
<?php
	}
?>
						<div class="uppercase mb8"><strong>TELEFONE:</strong> <span class="forma"><?=$rs->telefone?></span></div>
						<div class="uppercase"><strong>EMAIL:</strong> <span class="forma"><?=$rs->email?></span></div>
					</div>
				</div>
			</div>
			<div class="tabela2 col-lg-6 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading" style="height:auto">
						<h3 class="panel-title uppercase">DADOS DO PEDIDO</h3>
						<h3 class="panel-title uppercase pull-right">Nº <?=$s->id?></h3>
					</div>
					<div class="panel-body" style="margin-top:15px">
						<div class="uppercase mb8">
							<strong>PONTOS:</strong> <span class="forma"><?=$rs->pontos?></span></div>
						<div class="uppercase mb8">
							<strong>Número NF:</strong>
							<span class="forma"><?=$rs->numero_nota_fiscal?></span>
							<div class="pull-right">
								<strong>Série NF:</strong>
								<span class="forma"><?=$rs->serie_nota_fiscal?></span>
							</div>
						</div>
						<div class="uppercase mb8">
							<strong>Data de Emissão:</strong> <span class="forma"><?=datef($rs->dataEmissao, 8)?></span>
							<a class="btn btn-success ver-nota" style="float: right;margin-top: -7px;">VER NF</a>
						</div>
						<div class="uppercase">
							<strong>STATUS:</strong>
							<span class="forma forma-status<?=$rs->status==0?'':($rs->status==1?' aprovado':($rs->status==2?' reprovado':' pendente'))?>">
								<?=$rs->status==0?'AGUARDANDO':($rs->status==1?'APROVADO':($rs->status==2?'REPROVADO':'PENDENTE'))?>
							</span>
							<select class="form-control status"<?=$rs->status>2?' disabled':''?>>
								<option value="">-- STATUS --</option>
								<option value="0"<?=$rs->status==0?' selected':''?>>AGUARDANDO</option>
								<option value="3"<?=$rs->status==3?' selected':''?>>PENDENTE</option>
								<option value="1"<?=$rs->status==1?' selected':''?>>APROVADO</option>
								<option value="2"<?=$rs->status==2?' selected':''?>>REPROVADO</option>
							</select><br>
							<textarea class="form-control comentario" placeholder="Digite o comentário!"></textarea>
<?php
if($rs->status<2) {
?>
						<input type="submit" class="btn btn-danger" id="alterar" value="ALTERAR STATUS" style="margin-top:10px"/>
<?php
}
$historicos = $b->query("select * from DetalhesPedido where id_pedido={$s->id} and comentario is not null and comentario!=''");
if($historicos->rowCount()){
?>
						<div class="uppercase mb8">
							<a class="btn btn-success zoom pull-right" data-toggle="modal" data-target=".historico" style="margin-top: 20px">
								VER HISTÓRICO
								<i class="fa fa-search"></i>
							</a>
							<div class="modal fade historico" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-body">
											<h4>HISTÓRICO</h4>
											<hr/>
<?php
	while($historico=$historicos->fetchObject()){
?>
											<p>
												<span class="label label-<?=$historico->status==0||$historico->status==3?'primary':($historico->status==1?'success':'danger')?>">
													<?=$historico->status==0?'AGUARDANDO':($historico->status==1?'APROVADO':($historico->status==2?'REPROVADO':'PENDENTE'))?>
												</span>
												<small><b><?=datef($historico->dataCadastro, 8)?></b></small>
											</p>
											<p><?=$historico->comentario?></p>
											<hr/>
<?php
	}
?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
<?php
}
?>
						</div>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="tabela2 col-lg-6 col-md-12">
				<div id="nota">
					<a class="btn btn-success zoom" data-toggle="modal" data-target=".bs-example-modal-lg">
						ZOOM
						<i class="fa fa-search"></i>
					</a>
					<a class="btn btn-success zoom" onclick="window.open('../upload/notas/<?=$rs->nota_fiscal?>', '', 'width='+window.innerWidth+',height='+window.innerHeight)">
						ABRIR IMAGEM
						<i class="glyphicon glyphicon-eye-open"></i>
					</a>
					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-body">
									<img src="../upload/notas/<?=$rs->nota_fiscal?>" style="min-width: 100%;max-width: 100%"/>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="image"></div>
				</div>
			</div>
			<div class="tabela2 col-lg-6 col-md-12 itens-pedidos">
				<div class="panel panel-info">
					<div class="panel-heading" style="height:auto"><h3 class="panel-title uppercase">Itens do Pedido</h3></div>
					<div class="table-responsive project-stats">
						<table id="table-0a" class="display table dataTable">
							<thead>
								<tr class="lrow th">
									<th class="cell pt"><a>Produto</a></th>
									<th class="cell sku"><a>SKU TID</a></th>
									<th class="cell v"><a>Preço Unit.</a></th>
									<th class="cell q"><a>Qtde</a></th>
									<th class="cell t"><a>Total</a></th>
								</tr>
							</thead>
							<tbody class="tab-lista">
<?
	$sp = $b->query("select PedidoProdutos.*,Produtos.nome,Produtos.sku from PedidoProdutos
	left join Produtos on PedidoProdutos.id_produto=Produtos.id_produto
	left join Pedidos on PedidoProdutos.id_pedido=Pedidos.id_pedido
	where PedidoProdutos.id_pedido='{$s->id}'");
	while($rp=$sp->fetchObject()){
?>
								<tr class="lrow odd">
									<td class="cell line" title="<?=$rp->nome?>"><?=$rp->nome?></td>
									<td class="cell line" title="<?=$rp->sku?>"><?=$rp->sku?></td>
									<td class="cell"><?='R$ '.nreal($rp->valor)?></td>
									<td class="cell"><?=$rp->quantidade?></td>
									<td class="cell"><?='R$ '.nreal($rp->total)?></td>
								</tr>
<?
	}
?>
							</tbody>
							<tbody class="lrow void" style="display: none;">
							<td class="cell">Nenhum Item</td>
								</tbody>
							<tbody class="lrow loading" style="display: none;">
							</tbody>
							<thead>
								<tr class="lrow th">
									<th class="cell pt"><a>Produto</a></th>
									<th class="cell sku"><a>SKU TID</a></th>
									<th class="cell v"><a>Preço Unit.</a></th>
									<th class="cell q"><a>Qtde</a></th>
									<th class="cell t"><a>Total</a></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
<?
}
?>
		</div>
	</div>
</div>
<?php
Inline::a();
?>
<?php
if($rs->auditando&&$minutes<10&&$rs->auditando!=$s->idu) {
	$auditor = $b->query("select nome from Usuarios where id_usuario={$rs->auditando}")->fetchObject();
?>
<script type="text/javascript">
Swal.fire({
	icon: 'warning',
	title: 'Este pedido já está sendo auditado pelo: <?=$auditor->nome?>',
	allowOutsideClick: false
}).then((result) => {
  location.href = 'pedidos';
});
</script>
<?php
}
?>
<script type="text/javascript">
var adm = {l:0,
	go:function(){
		var e = $('#idq'),s = $('#ids'),v = parseInt($.trim(e.val()),10);
		s.addClass('load2');
		if(v>0&&v!=this.id)setTimeout(function(){location = 'pedido/'+v;},100);
		else s.removeClass('load2');
		return false;
	},
};
adm.id = <?=$s->id?>;

$.extend(true,adm,<?=json_encode($a)?>);

$(function(){
	var _ = adm;
	$('#alterar').click(function(){
		var confirmar = confirm("Você deseja alterar o status do Pedido?");
		var status = $('.status').val(),comentario = $('.comentario').val();
		if (confirmar == true) {
			$.post('ajax/status-pedido.json',{id:_.id,status:status,comentario:comentario},function(x){
				if(x.m)alert(x.m);
			},'json').always(function(x){
				if(x.ok)location.reload();
			});
		} else {
			return false;
		}
	});

	$(document).on('change', '.status', function() {
		var status = $(this).val();
		if(status==2||status==3)$('.comentario').show();
		else $('.comentario').hide();
	});

	$('.ver-nota').click(function() {
		var image = '../upload/notas/<?=$rs->nota_fiscal?>';
		$('#nota .image').find('img').remove();
		$('#nota .image').html('<img src="'+image+'">');
		$('#nota .zoom').css('opacity', '1');
	});

	$('.btn-fechar').click(function() {
		$.post('ajax/sair-pedido.json',{id:_.id},function(x){
			window.location = 'pedidos';
		});
	});

	if($(window).width()>=1200) {
		$(window).scroll(function(){
			if($('#nota')[0].getBoundingClientRect().top<=70) {
				$('.itens-pedidos').css({
					'position': 'fixed',
					'right': '0',
					'top': '80px',
					'padding-left': '90px',
				});
			} else {
				$('.itens-pedidos').css({
					'position': '',
					'right': '',
					'top': '',
					'padding-left': '',
				});
			}
		});
	}
});

window.setInterval(function() {
	$.get('ajax/get-auditando.json',{id:<?=$s->id?>}, function(x) {
		if(x.renew) {
			Swal.fire({
				icon: 'warning',
				title: 'Você deseja continuar auditando este pedido',
				allowOutsideClick: false,
				showCancelButton: true,
				confirmButtonText: `Continuar`,
				cancelButtonText: `Fechar`,
			}).then((result) => {
				if (result.isConfirmed) {
					$.post('ajax/atualizar-auditando.json',{id:<?=$s->id?>},function(x){
					});
				} else {
					$.post('ajax/sair-pedido.json',{id:<?=$s->id?>},function(x){
						window.location = 'pedidos';
					});
				}
			});
		}
		if(x.expired) {
			$.post('ajax/sair-pedido.json',{id:<?=$s->id?>},function(x){
				window.location = 'pedidos';
			});
		}
	});
}, 20000);
</script>
<?php
Inline::b();
?>