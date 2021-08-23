<style>
.form-row input[type="file"]{border: 0;padding-left: 0}
fieldset{margin-top: 30px}
</style>
<div class="page-section background-imagem pb-5">
  <div class="container">
    <h3 class="page-section-heading text-center text-uppercase p-3">Realizar Pedido</h2>
    <div class="row justify-content-center">
      <div class="col-12">
        <h5 class="h5 mb-3 text-center">Solicite seus pontos  através do registro das suas vendas. Com a Nota Fiscal, preencha o formuário abaixo e envie uma cópia digitalizada da mesma</h5>
        <form class="form-row mb-3 text-uppercase jumbotron" id="form-cadastro">
          <div class="row">
            <div class="col-md-6">
              <label for="numero_nota_fiscal">Número da Nota Fiscal</label>
              <input type="text" name="numero_nota_fiscal" id="numero_nota_fiscal" placeholder="Número da nota fiscal" class="form-control required" value="<?=$rs->numero_nota_fiscal?>" required>
            </div>
            <div class="col-md-6">
              <label for="serie_nota_fiscal">Série da Nota Fiscal</label>
              <input type="text" name="serie_nota_fiscal" id="serie_nota_fiscal" placeholder="Série da nota fiscal" class="form-control required" value="<?=$rs->serie_nota_fiscal?>" required>
            </div>
            <div class="col-md-6">
              <label for="dataEmissao">Data de Emissão da NF</label>
              <input type="text" name="dataEmissao" id="dataEmissao" class="form-control mk-data required" placeholder="Ex 10/01/2021..." value="<?=datef($rs->dataEmissao,8)?>" required>
            </div>
            <div class="col-md-6">
              <div class="col-md-7 float-left">
                <label for="nota_fiscal">Foto da Nota Fiscal</label>
                <input type="file" name="nota_fiscal" id="nota_fiscal" class="form-control<?=!$s->id?' required':''?>" <?=!$s->id?' required':''?>>
              </div>
              <div class="col-md-5 float-right mt-3">
                <p class="text-muted mb-0"><small>Apenas imagens no formato JPEG, JPG e PNG</small></p>
                <p class="text-muted"><small>Tamanho máximo de 5MB</small></p>
              </div>
            </div>
            <div class="col-lg-12 mt-5">
              <h5 class="h5 text-center">Produtos</h5>
              <hr>
            </div>
              <div class="col-12">
              <table class="table table-sm table-borderless mt-2">
                <thead>
                  <tr style="font-size: 13px;" class="d-flex">
                    <th scope="col" class="col-5">Produto</th>
                    <th scope="col" class="col-3" title="Quantidade">Qtd</th>
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
                      <input type="text" readonly value="<?=$produto->nome?>" class="form-control">
                    </th>
                    <td class="col-3">
                      <input
                        type="number"
                        min="0"
                        value="<?=$s->id?($produtoPedido->quantidade?$produtoPedido->quantidade:'0'):'0'?>"
                        name="quantidade[<?=$produto->id_produto?>]"
                        id="quantidade[<?=$produto->id_produto?>]"
                        class="form-control"
                        required
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
                          required
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
            <div class="col-lg-12 text-center mt-4">
            	<button class="btn btn-primary" type="submit">CADASTRAR</button>
		      	</div>
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
	a:'pedido',
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
</script>
<?php
Inline::b();
?>
