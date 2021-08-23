<div class="col-12 mt-2">
  <div class="row align-items-center mb-5">
    <a href="numeros" style="font-size: 55px;color:#03b1de;" title="Voltar para página inicial">
      <i class="fas fa-chevron-left"></i>
    </a>
    <div class="col d-flex justify-content-center">
      <div class="image-center"></div>
    </div>
  </div>
  <p class="text-justify">
    Muito obrigado por participar! Agora é só guardar o(s) número(s) escolhido e esperar o dia do sorteio. Lembrando que enviamos um lembrete para você no seu e-mail.
  </p>
  <div class="card" style="background-color: #dae0f0;">
    <div class="card-body">
      <h5 class="card-title"><?= $_SESSION['user']['name'] ?></h5>
      <div class="card-text">
        <ul>
          <?
          while ($rs = $num->fetchObject()) {

            echo '<li class="mb-1" style="list-style-type:none"><span class="bg-primary" style="color:#fff;padding: 2px 5px;box-shadow: 2px 1px #00000042;">' . $rs->numero . '</span> '.$rs->fralda.'</li>';
          }
          ?>
        </ul>
        <img class="float-right" width="70" src="assets/img/sucesso-2.gif">
      </div>      
    </div>
  </div>

</div>
<?php
Inline::a();
?>

<script type="text/javascript">

</script>
<?php
Inline::b();
?>