<div class="page-section background-imagem pb-5">
  <div class="container">
    <h3 class="page-section-heading text-center text-uppercase p-3">Alterar Senha</h3>
    <div class="row justify-content-center">
      <div class="col-12">        
        <h5 class="h5 mb-3 text-center">Digite os dados para alterar a senha</h5>
        <form class="form-row mb-3 text-uppercase jumbotron" id="actionForm">
          <div class="col-lg-4">
            <label for="pass">Senha Anterior</label>
            <div class="pass-container">
              <input minlength="8" maxlength="50" type="password" class="form-control" placeholder="Senha Anterior" name="pass" required>
              <a class="show-pass"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <div class="col-lg-4">
            <label for="p1">Nova Senha</label>
            <div class="pass-container">
              <input minlength="8" maxlength="50" type="password" class="form-control" placeholder="Nova Senha" name="p1" required>
              <a class="show-pass"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <div class="col-lg-4">
            <label for="p2">Confirmar Nova Senha</label>
            <div class="pass-container">
              <input minlength="8" maxlength="50" type="password" class="form-control" placeholder="Confirmar Nova Senha" name="p2" required>
              <a class="show-pass"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <div class="col-lg-12 text-center mt-4">
            <button class="btn btn-primary" type="submit">REDEFINIR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
Inline::a();
?>
<script type="text/javascript">
function formForgot(token,event){
	event.preventDefault();
	button = $('#actionForm').find('button');
	button.addClass('face');
	var data = $('#actionForm').serializeArray(),dataObj = {};
	$(data).each(function(i, field){
		dataObj[field.name] = field.value;
	});
	$.post('ajax/alterar-senha.json',data,function(x){
		if(x.hasCaptcha==1)grecaptcha.execute();
		button.removeClass('face');
		if(x.m)message(x);
	},'json').always(function(x){
		button.removeClass('face');
		if(x.hasCaptcha==1)grecaptcha.reset();
		if(x.l)window.location = x.l;
	});
}

$(document).on('submit','#actionForm',function(){
	token = 'teste';
	formForgot(token, event);
});
</script>
<?php
Inline::b();
?>