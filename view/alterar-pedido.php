<style>
.form-row input[type="file"]{border: 0;padding-left: 0}
fieldset{margin-top: 30px}
.list-title{
  width: 100%;
  color: #495057;
  text-align: inherit;
  text-decoration: none!important;
}
.tab-content{
  display: none;
  border-top: 1px solid rgba(0,0,0,.1);
  padding-top: 7px;
  margin-top: 7px;
}
</style>
<div class="page-section background-imagem pb-5">
  <div class="container">
    <h3 class="page-section-heading text-center text-uppercase p-3">Alterar Pedido</h2>
    <div class="row justify-content-center">
      <div class="col-12">        
        <form class="form-row mb-3 text-uppercase jumbotron" id="form-cadastro">
          <input type="hidden" name="id" value="<?=$s->id?>">
          <div class="row">
            <div class="col-12">
              <h5 class="h5">N° Pedido: <?=$s->id?></h5>
              <h5 class="h5 badge badge-info"><?=$rs->status==0?'AGUARDANDO':($rs->status==1?'APROVADO':($rs->status==2?'REPROVADO':'PENDENTE'));?></h5>
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="numero_nota_fiscal">Número da Nota Fiscal</label>
              <input type="text" name="numero_nota_fiscal" id="numero_nota_fiscal" placeholder="Número da nota fiscal" class="form-control required" value="<?=$rs->numero_nota_fiscal?>">
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="serie_nota_fiscal">Série da Nota Fiscal</label>
              <input type="text" name="serie_nota_fiscal" id="serie_nota_fiscal" placeholder="Série da nota fiscal" class="form-control required" value="<?=$rs->serie_nota_fiscal?>">
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="dataEmissao">Data de Emissão da NF</label>
              <input type="text" name="dataEmissao" id="dataEmissao" class="form-control mk-data required" placeholder="Ex 10/01/2021..." value="<?=datef($rs->dataEmissao,8)?>">
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="nota_fiscal">Foto da Nota Fiscal</label>
              <input type="file" name="nota_fiscal" id="nota_fiscal" class="form-control">
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="col-lg-12 mt-5">
                <h5 class="h5 text-center">Histórico</h5>
                <hr>
<!-- PRECISA TROCAR O "data-id" do elemento <a> e o "id" do tab-content -->
                <div class="list-group">
<?php
$detalhes = $b->query("select * from DetalhesPedido where id_pedido={$s->id} order by id_detalhe_pedido desc");
while($detalhe = $detalhes->fetchObject()){
  $status = $detalhe->status==0?'AGUARDANDO':($detalhe->status==1?'APROVADO':($detalhe->status==2?'REPROVADO':'PENDENTE'));
  $statusFlag = $detalhe->status==0?'info':($detalhe->status==1?'success':($detalhe->status==2?'dange':'info'));
?>
                  <div class="list-group-item list-group-item-action">
                    <a class="list-title" data-id="hist-<?=$detalhe->id?>" role="button" aria-expanded="false">
                      <?=datef($detalhe->dataCadastro, 8)?> <span class="badge badge-<?=$statusFlag?> text-uppercase float-right"><?=$status?></span>
                    </a>
                    <div class="tab-content text-justify" id="hist-<?=$detalhe->id?>">
                    <?=$detalhe->comentario?>
                    </div>
                  </div>
<?php
}
?>
                </div>
                  

              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="col-lg-12 mt-5">
                <h5 class="h5 text-center">Produtos</h5>
                <hr>
              </div>
              <table class="table table-sm table-borderless mt-2">
                <thead>
                  <tr style="font-size: 13px;" class="d-flex">
                    <th scope="col" class="col-5">Produto</th>
                    <th scope="col" class="col-3">Qtd</th>
                    <th scope="col" class="col-4">Valor Unitário</th>
                  </tr>
                </thead>
                <tbody>
<?php
if(in_array($s->idc, unserialize(ID_DOUBLE_POINTS)))
$produtos = $b->query("select * from Produtos where Status=1 and id_produto >= 8 order by nome");
else
$produtos = $b->query("select * from Produtos where Status=1 and id_produto < 8 order by nome");

while($produto = $produtos->fetchObject()){
  $produtoPedido = $b->query("select * from PedidoProdutos where id_pedido={$s->id} and id_produto={$produto->id_produto} limit 1")->fetchObject();
?>
                  <tr class="d-flex">
                    <th scope="row" class="col-5">
                      <input type="text" readonly value="<?=$produto->sku.' - '.$produto->nome?>" class="form-control">
                    </th>
                    <td class="col-3">
                      <input
                        type="number"
                        min="0"
                        value="<?=$s->id?($produtoPedido->quantidade?$produtoPedido->quantidade:'0'):'0'?>"
                        name="quantidade[<?=$produto->id_produto?>]"
                        id="quantidade[<?=$produto->id_produto?>]"
                        class="form-control"
                      />
                    </td>
                    <td class="col-4">
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text border-0 p-0">
                            R$
                          </span>
                        </div>
                        <input
                          type="number"
                          min="0"
                          value="<?=$s->id?($produtoPedido->valor?$produtoPedido->valor:'0'):'0'?>"
                          name="valor[<?=$produto->id_produto?>]"
                          id="valor[<?=$produto->id_produto?>]"
                          class="form-control mk-valor"
                        />
                      </div>
                    </td>
                  </tr>
<?php
}
?>
                </tbody>
              </table>
            <div class="clearfix"></div>
          </div>
          <div class="col-lg-12 text-center mt-4">
            <button class="btn btn-primary" type="submit">ALTERAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
Inline::a();
?>
<script src="assets/js/jbr.form-1.0.2.js" type="text/javascript"></script>
<script src="assets/js/jbr.file-1.0.1.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.maskedinput-1.4.1.min.js"></script>
<script type="text/javascript">
(function($){
window.cad = $.form({
	a:'alterar-pedido',
	F:'#form-cadastro',
	style:false,
	sub:'Cadastrar',
	reset:function(_){
		// _.cgT(1);
		//grecaptcha.reset();
	},
	load:function(_,F,f,e,o){
    $('.mk-data').mask('99/99/9999');
  },
});


})(jQuery);

$('.list-title').click(function() {
  let elContent = '#'+$(this).data('id');
  $(elContent).slideToggle('slow');
});

</script>
<script src="assets/js/jquery.validate.min.js?" type="text/javascript"></script>
<script type="text/javascript">
$('#form-cadastro').validate();
</script>
<?php
Inline::b();
?>