<div class="page-section background-imagem pb-5">
  <div class="container">
    <h3 class="page-section-heading text-center text-uppercase p-3">Esqueci minha Senha</h3>
    <div class="row justify-content-center">
      <div class="col-12">
        <h5 class="h5 mb-3 text-center">
          <?=!$s->id?'Digite seu e-mail abaixo para que seja enviado um link e você possa alterar sua senha.':'Digite os dados abaixo para redefinir a senha'?>
        </h5>
        <form class="form-row mb-3 text-uppercase jumbotron" id="formEsqueci">
<?php
if(!$s->id){
?>
          <div class="col-lg-12">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control required" placeholder="E-mail ativo (jose@gmail.com...)" required>
          </div>
          <div class="col-lg-12 text-center mt-4">
            <button class="btn btn-primary" type="submit">ENVIAR</button>
          </div>
<?php
}else {
?>
          <input type="hidden" class="form-control" name="id" value="<?=$s->id?>">
          <input type="hidden" class="form-control" name="email" value="<?=$rs->email?>">
          <input type="hidden" class="form-control" name="codigo" value="<?=$rs->codigo?>">
          <div class="col-lg-6">
            <label for="p1">Nova Senha</label>
            <div class="pass-container">
              <input type="password" class="form-control" placeholder="Nova Senha" name="p1" required>
              <a class="show-pass"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <div class="col-lg-6">
            <label for="p2">Confirmar Nova Senha</label>
            <div class="pass-container">
              <input type="password" class="form-control" placeholder="Confirmar Nova Senha" name="p2" required>
              <a class="show-pass"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <div class="col-lg-12 text-center mt-4">
            <button class="btn btn-primary" type="submit">REDEFINIR</button>
          </div>
<?php
}
?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
Inline::a();
$pageAjax = $s->id ? 'redefinir' : 'enviar';
?>
<script type="text/javascript">
function formForgot(token,event){
	event.preventDefault();
	button = $('#formEsqueci').find('button');
	button.addClass('face');
	var data = $('#formEsqueci').serializeArray(),dataObj = {};
	$(data).each(function(i, field){
		dataObj[field.name] = field.value;
	});
	$.post('ajax/<?=$pageAjax?>-senha.json',data,function(x){
		if(x.hasCaptcha==1)grecaptcha.execute();
		button.removeClass('face');
		if(x.m)message(x);
	},'json').always(function(x){
		button.removeClass('face');
		if(x.hasCaptcha==1)grecaptcha.reset();
		if(x.l)window.location = x.l;
	});
}

$(document).on('submit','#formEsqueci',function(){
	token = 'teste';
	formForgot(token, event);
});
</script>
<?php
Inline::b();
?>