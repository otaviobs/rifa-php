<div class="page-section background-imagem">
  <div class="container">
    <div class="row">
      <div class="col-12 mt-3">
        <div aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-success" href="video"><i class="fas fa-video"></i> Viváx</a></li>
            <li class="breadcrumb-item"><a class="text-success" href="video"><i class="fas fa-video"></i> Viváx Touch</a></li>
            <li class="breadcrumb-item"><a class="text-success" href="video"><i class="fas fa-video"></i> Viváx Max</a></li>
            <li class="breadcrumb-item"><a class="text-success" href="video"><i class="fas fa-video"></i> Viváx Defense</a></li>
            <li class="breadcrumb-item"><a class="text-success" href="video"><i class="fas fa-video"></i> Viváx Pro</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Quiz</li>
          </ol>
        </div>
        <h3 class="page-section-heading text-center text-uppercase text-ibbl-blue">Quiz</h2>
        <h5 class="h5 mb-3 text-center">Parabéns, você aprendeu mais sobre a Linha Viváx IBBL. Agora é só acertar a 7 perguntas do Quiz e começar a acumular pontos. Boa sorte!</h5>
        <div>
          
          <form id="form-cadastro" method="post" class="jumbotron">
            
            <div id="carouselExampleSlidesOnly" class="carousel slide pt-3" data-ride="carousel">
              <div class="carousel-inner text-justify">
<?php
$count = 0;
$perguntas = $b->query("select * from Perguntas where status=1 order by id_pergunta limit 10");
$total = $perguntas->rowCount();
while($pergunta=$perguntas->fetchObject()){
  $count++;
?>
                <div class="carousel-item<?=$count==1?' active':''?>">
                  <h3>Questão <?=$count?> de <?=$total?>:</h3>
                  <p class="pergunta"><?=$pergunta->titulo?></p>
<?php
  $respostas = $b->query("select * from Respostas where id_pergunta={$pergunta->id_pergunta} order by id_resposta limit 4");
  while($resposta=$respostas->fetchObject()){
?>

                  <div class="form-check pb-2">
                    <input class="form-check-input respostas-radio" type="radio" name="respostas[<?=$pergunta->id_pergunta?>]" id="<?=$resposta->id_resposta?>" value="<?=$resposta->id_resposta?>">
                    <label class="form-check-label" for="<?=$resposta->id_resposta?>"><?=$resposta->titulo?></label>
                  </div>
<?php
  }
?>
                </div>
<?php
}
?>
              </div>
            </div>
            
            <div class="d-flex justify-content-between bd-highlight mb-3 pt-3">
              <a id="previous" class="btn btn-primary mt-3">Anterior</a>
              <button type="submit" class="btn btn-primary btn-finalizar mt-3 disabled" disabled>Finalizar</button>
              <a id="next" class="btn btn-primary mt-3">Próximo</a>
            </div>
          </form>
      
        </div>
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
	a:'quiz',
	F:'#form-cadastro',
	style:false,
	sub:'Cadastrar',
	reset:function(_){
		// _.cgT(1);
		//grecaptcha.reset();
	},
	load:function(_,F,f,e,o){},
});
})(jQuery);
</script>
<script type="text/javascript">
$('.carousel').carousel({
  interval: false,
  pause: true
})
$("#previous").click(() => $(".carousel").carousel("prev"));
$("#next").click(() => $(".carousel").carousel("next"));

$(document).on('click', '.respostas-radio' , function() {
  radios = $('.respostas-radio:checked').length;
  if(radios == 10) {
    $('.btn-finalizar').removeClass('disabled').attr('disabled', false);
  } else {
    $('.btn-finalizar').addClass('disabled').attr('disabled', true);
  }
})
</script>
<?php
Inline::b();
?>