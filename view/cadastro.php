<div class="page-section background-imagem pb-5">
  <div class="container">
    <h3 class="page-section-heading text-center text-uppercase p-3">Cadastro</h3>
    <div class="row justify-content-center">
      <div class="col-12">
        <h5 class="h5 mb-3 text-center">
          Para cadastrar-se na Campanha IBBL, preencha o formulário abaixo com seus dados pessoais.<br />
          O seu endereço de e-mail será sua forma de acessar as áreas restritas deste site
        </h5>
        <form class="form-row mb-3 text-uppercase jumbotron" id="form-cadastro">
          <div class="row">
            <div class="col-lg-5 col-md-6">
              <label for="nome">Nome</label>
              <input maxlength="50" type="text" name="nome" id="nome" placeholder="Nome completo (José Carlos da Silva...)" class="form-control" required>
            </div>
            <div class="col-lg-2 col-md-6">
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" id="cpf" class="form-control mk-cpf" required placeholder="Ex 123.456.789-99">
            </div>
            <div class="col-lg-2 col-md-6">
              <label for="rg">RG</label>
              <input type="text" name="rg" id="rg" class="form-control" required maxlength="14" placeholder=" Ex 451630774">
            </div>
            <div class="col-lg-3 col-md-6">
              <label for="cnpj">CNPJ da loja onde trabalha</label>
              <input type="text" name="cnpj" id="cnpj" class="form-control mk-cnpj" required placeholder="Ex 93.258.158/0001-47">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="data_nascimento">Data de nascimento</label>
              <input type="text" name="data_nascimento" id="data_nascimento" class="form-control mk-data" required placeholder="Ex 10/01/1993...">
            </div>
			      <div class="col-lg-4 col-md-6">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" id="telefone" class="form-control mk-cel" required placeholder="Telefone/Celular (11) 91234-5689">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" required placeholder="E-mail ativo (jose@gmail.com...)">
            </div>
            <div class="col-lg-2 col-md-6">
              <label for="cep" class="float-left">CEP</label>
              <a href="https://buscacepinter.correios.com.br/app/endereco/index.php?t" target="_blank" class="text-muted" style="margin-top: 29px;margin-left: 15px;font-size: 13px;position: absolute;cursor: pointer;">
                <small>Não sei meu CEP</small>
              </a>
              <input type="text" name="cep" id="cep" class="form-control mk-cep" required placeholder="Ex 03676-070">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="rua">Endereço</label>
              <input type="text" name="rua" id="rua" class="form-control" required placeholder="Logradouro (Rua General Pamplona...)">
            </div>
            <div class="col-lg-2 col-md-6">
              <label for="numero">Número</label>
              <input type="text" name="numero" id="numero" class="form-control" minlenght="0" maxlength="6" required placeholder="Número (33...)">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="complemento">Complemento</label>
              <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento (casa, número do apartamento...)">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" id="bairro" class="form-control" required placeholder="Bairro (Jardim Três Marias...)">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidade" class="form-control" required placeholder="Cidade (São Paulo...)">
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="estado">Estado</label>
              <select name="estado" id="estado" class="form-control" required>
                <option value="">(Selecione o Estado)</option>
              </select>
            </div>
            <div class="col-lg-4">
              <label for="camiseta">Camiseta</label>
              <select name="camiseta" id="camiseta" class="form-control" required>
                <option value="">(Selecione o Tamanho da Camiseta)</option>
								<option value="P">P</option>
								<option value="M">M</option>
								<option value="G">G</option>
								<option value="XG">XG</option>
								<option value="XXG">XXG</option>
              </select>
            </div>
			      <div class="col-lg-4 col-md-6">
              <label for="senha">Senha</label>
              <div class="pass-container">
                <input minlength="8" maxlength="50" type="password" name="senha" id="senha" class="form-control" required placeholder="SENHA (MINIMO DE 8 CARACTERES)" style="text-transform: none;">
                <a class="show-pass"><i class="fa fa-eye"></i></a>
              </div>  
            </div>
			      <div class="col-lg-4 col-md-6">
              <label for="confirmar-senha">Confirmar Nova Senha</label>
              <div class="pass-container">
                <input minlength="8" maxlength="50" type="password" id="confirmar-senha" class="form-control" required name="confirmar-senha" placeholder="CONFIRMAR A SENHA" style="text-transform: none;">
                <a class="show-pass"><i class="fa fa-eye"></i></a>
              </div>
            </div>
            <div class="col-12 text-center mt-4">
              <div class="form-check">
                <input name="regulamento" class="form-check-input" required type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1" style="margin-top: 0;">
                  <a href="assets/regulamento-IBBL.pdf" target="_blank">LI E CONCORDO COM O REGULAMENTO</a>
                </label>
              </div>
              
            </div>
            <div class="col-lg-12 text-center">
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
<script src="assets/js/jquery.validate.min.js?" type="text/javascript"></script>
<script type="text/javascript">
(function($){
window.cad = $.form({
	a:'cliente',
	F:'#form-cadastro',
	style:false,
	sub:'Cadastrar',
  submit: false,
	cgCep:function(){
		var _ = this,f = _.f,c = $(f.cep),cep = c.val(),re = /^\D*(\d{2})\D*(\d{3})\D*(\d{3})\D*$/;
		if(re.test(cep))cep = cep.replace(re,'$1$2-$3'),c.val(cep);
		else return false;
		if(_.cep==cep)return false;
		_.cep = cep;
		$.getJSON("//viacep.com.br/ws/"+cep+"/json/?callback=?",function(r){
			if(!("erro" in r)){
				if(r.logradouro||r.complemento){
					$(f.rua).val(unescape(r.logradouro)).removeClass("haserror").css('border-color','initial');
					$('#erro-rua').hide();
				}if(r.bairro){
					$(f.bairro).val(unescape(r.bairro)).removeClass("haserror").css('border-color','initial');
					$('#erro-bairro').hide();
				}if(r.localidade){
					$(f.cidade).val(unescape(r.localidade)).removeClass("haserror").css('border-color','initial').attr('readonly', true);
					$('#erro-city').hide();
				}if(r.uf){
					$(f.estado).val(unescape(r.uf).toUpperCase()).removeClass("haserror").css('border-color','initial').attr('readonly', true);
					$('#erro-uf').hide();
				}
				$(f.numero).focus();
			}else{
				_.cep = 0;
        r.ok = 0;
        r.m = 'CEP não encontrado!';
				message(r);
				$(f.cidade).attr('readonly', false);
				$(f.estado).attr('readonly', false);
			}
			delete r;
			//window.resultadoCEP = undefined;
		});
	},
	reset:function(_){
		// _.cgT(1);
		//grecaptcha.reset();
	},
	load:function(_,F,f,e,o){
		$(f.cep).bind('change keyup',function(){
			_.cgCep();
		});

		e = f.estado;
		o = e.options;
		$.each(_.ufs,function(i,v){
			o[i=o.length] = new Option(v,v);
			if(v==_.estado)e.selectedIndex = i;
		});

		$('.mk-data').mask('99/99/9999');
		$('.mk-cpf').mask('999.999.999-99');
		$('.mk-cnpj').mask('99.999.999/9999-99');
		$('.mk-cep').mask('99999-999');
		$('.mk-cel').focusout(function(){
			var e = $(this);
			e.unmask().mask(e.val().replace(/\D/g,'').length>10?'(99) 99999-999?9':'(99) 9999-9999?9');
		}).focusout();
	},
	ufs:['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PR','PB','PA','PE','PI','RJ','RN','RS','RO','RR','SC','SE','SP','TO'],
	opcao:[['Não','N'],['Sim','S']]
});
})(jQuery);

jQuery(function($){
	var num = $('#num');
	$('#sem_num').click(function(){
		$('#sem_num').is(':checked')?num.prop('disabled',true):num.prop('disabled',false);
	});
});

function sn(e){
	var tecla=(window.event)?event.keyCode:e.which;
	if((tecla>47&&tecla<58)||(tecla>95&&tecla<106))return true;
	else{
		if(tecla==8||tecla==0)return true;
		else return false;
	}
}
function hasError(e){
	$("#"+e).on('keyup change',function(){
		var placeholder = $("#"+e).data('placeholder');
		$("#"+e).removeClass("haserror").css('border-color','initial').attr('placeholder',placeholder);
	});
}
</script>
<script type="text/javascript">
var n=1;
$('#form-cadastro').validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    'confirmar-senha': {
      required: true,
      equalTo: "#senha"
    }
  },
  messages: {
    nome: "Campo obrigatório",
    cpf: "Campo obrigatório",
    rg: "Campo obrigatório",
    cnpj: "Campo obrigatório",
    data_nascimento: "Campo obrigatório",
    telefone: "Campo obrigatório",
    email: {
      required: "Campo obrigatório",
      email: "O e-mail informado não tem parece com um e-mail (ex. name@domain.com...)"
    },
    cep: "Campo obrigatório",
    rua: "Campo obrigatório",
    numero: "Campo obrigatório",
    bairro: "Campo obrigatório",
    cidade: "Campo obrigatório",
    estado: "Campo obrigatório",
    camiseta: "Campo obrigatório",
    senha: "Campo obrigatório",
    'confirmar-senha': {
      required: "Campo obrigatório",
      equalTo: "As senhas precisam ser iguais"
    }
  },
  submitHandler: function() {
    var data = $('#form-cadastro').serializeArray(),dataObj = {};
    $(data).each(function(i, field){
      dataObj[field.name] = field.value;
    });
    $.post('ajax/update/cliente.json',data,function(x){
      if(x.m)message(x);
    },'json').always(function(x){
      if(x.l)window.location = x.l;
    });
  }
});

</script>
<?php
Inline::b();
?>