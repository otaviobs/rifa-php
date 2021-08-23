<div class="form-signin">
  <div class="col-12">
    <div class="text-center mb-4">
      <img src="assets/img/icon.png" height="200" />
      <h1 class="h3 mb-3 font-weight-normal">Chá de fralda</h1>
    </div>

    <form id="form-name">
      <div class="form-label-group">
        <input name="nome" type="text" id="nome" class="form-control" placeholder="Digite o seu nome..." maxlength="190" required autofocus>
        <label for="nome">Digite o seu nome...</label>
      </div>
      <div class="form-label-group">
        <input name="email" type="email" id="email" class="form-control" placeholder="Digite o seu e-mail..." >
        <label for="email">Digite o seu e-mail...</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Continuar</button>
    </form>
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
</script>
<?php
Inline::b();
?>