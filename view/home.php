<div class="form-signin">
  <div class="col-12">
    <div class="text-center mb-4">
      <img src="assets/img/icon.png" height="200" />
      <h1 class="h3 mb-3 font-weight-normal">Chá de fralda</h1>
    </div>

    <form id="form-name">
      <div class="form-label-group">
        <input name="nome" type="text" id="nome" class="form-control" placeholder="*Digite o seu nome..." maxlength="190" required autofocus>
        <label for="nome">Digite o seu nome...</label>
      </div>
      <div class="form-label-group">
        <input name="email" type="email" id="email" class="form-control" placeholder="(Não é obrigatório!) Digite o seu e-mail..." >
        <label for="email">(Não é obrigatório!) Digite o seu e-mail...</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
    </form>
  </div>
</div>


<div class="modal" id="aviso" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chá de Fralda do Théo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <strong>Este site é um chá de fralda como uma rifa, pensamos em um jeito mais fácil para todos. Agradecemos desde já por sua ajuda.</strong><br /><br />
                Vamos lá, clique para fechar essa mensagem e irá aparecer uma caixinha onde precisa colocar o seu <strong>nome completo</strong> e caso queira receber os números por e-mail, preencha o campo de e-mail também. Depois é só clicar no botão "Continuar".<br /><br />
                Você será redirecionado para a página dos números. <strong>Os números que estão em vermelho não estão disponíeis.</strong> Então clique no(s) número(s) desejado(s) e irá paracer uma caixinha para confirmar a sua escolha.<br /><br />
                Essa caixinha é para que você confirme o(s) número(s) escolhido(s), <strong>ao clicar no botão "Confirmar"</strong>, concluirá a(s) escolha(s) do(s) seu(s) número(s) e depois <strong>é só torcer para ganhar o prêmio de R$ 200,00 caso o seu número seja sorteado.</strong><br /><br />
                <strong>Lembrando que se você colocar o seu e-mail, irá receber o(s) número(s) e o que precisará dar por e-mail também.</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<?php
Inline::a();
?>
<script src="assets/js/jbr.form-1.0.2.js" type="text/javascript"></script>
<script src="assets/js/jbr.file-1.0.1.js" type="text/javascript"></script>
<script type="text/javascript">
(function($){
  window.cad = $.form({
    a:'save-name',
    F:'#form-name',
    style:false,
    sub:'Continuar',
    reset:function(_){
      // _.cgT(1);
      //grecaptcha.reset();
    },
    load:function(_,F,f,e,o){},
  });
})(jQuery);

setTimeout(
    $('#aviso').modal()
    , 2000);
</script>
<?php
Inline::b();
?>