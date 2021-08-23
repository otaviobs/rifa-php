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
.semLoja{height: 45px;line-height: 45px}
</style>
<div class="tabela2 row">
	<div class="panel panel-white" style="background:transparent">
		<div class="panel-body pedido">
			<div class="tabela2 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading" style="height:auto"><h3 class="panel-title uppercase">Dados do Vendedor</h3></div>
					<div class="panel-body" style="margin-top:15px">
						<div class="uppercase mb8 col-md-6"><strong>Vendedor:</strong> <span class="forma"><?=$rs->nome?></span></div>
						<div class="uppercase mb8 col-md-6"><strong>Data de Cadastro:</strong> <span class="forma"><?=datef($rs->dataCadastro, 8)?></span></div>
						<div class="uppercase mb8 col-md-6<?=!$loja?' semLoja':''?>">
							<strong>CNPJ:</strong> <span class="forma"><?=$rs->cnpj?></span>
						</div>
<?php
	if($loja){
?>
							<div class="uppercase mb8 col-md-6">
								<strong>LOJA:</strong> <span class="forma"><?=$loja->nome?></span>
							</div>
<?php
	} else {
?>
						<div class="uppercase mb8 col-md-6">
							<a href="loja?cnpj=<?=$rs->cnpj?>" target="_blank" class="pull-right btn btn-success">CADASTRAR LOJA</a>
						</div>
<?php
	}
?>
						<div class="uppercase mb8 col-md-6"><strong>TELEFONE:</strong> <span class="forma"><?=$rs->telefone?></span></div>
						<div class="uppercase mb8 col-md-6"><strong>EMAIL:</strong> <span class="forma"><?=$rs->email?></span></div>
						<div class="uppercase mb8 col-md-4"><strong>Data de Nascimento:</strong> <span class="forma"><?=datef($rs->data_nascimento, 8)?></span></div>
						<div class="uppercase mb8 col-md-4"><strong>CPF:</strong> <span class="forma"><?=$rs->cpf?></span></div>
						<div class="uppercase mb8 col-md-4"><strong>RG:</strong> <span class="forma"><?=$rs->rg?></span></div>
						<div class="uppercase mb8 col-md-12">
							<strong>ENDEREÇO:</strong>
							<span class="forma"><?=$rs->rua.', '.$rs->numero.', '.$rs->bairro.' - '.$rs->estado.', CEP: '.$rs->cep?></span>
						</div>
						<div class="uppercase mb8 col-md-4"><strong>CAMISETA:</strong> <span class="forma"><?=$rs->camiseta?></span></div>
						<div class="uppercase mb8 col-md-4">
							<strong>STATUS:</strong>
							<span class="forma"><?=$rs->status==1?'CONFIRMADO':'AGUARDANDO CONFIRMAÇÃO'?></span>
						</div>
						<div class="uppercase mb8 col-md-4">
							<strong>QUIZ:</strong>
<?php
$quiz = $b->query("select * from Quiz where id_usuario={$s->id} order by id_quiz desc limit 1");
if($quiz->rowCount()) {
?>
							<span class="forma"><?=$rs->aprovado==1?'APROVADO':'REPROVADO'?></span>
<?php
}else {
?>
							<span class="forma">NÃO REALIZADO</span>
<?php
}
?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>