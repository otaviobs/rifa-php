<div class="col-12 mt-2">
  <div class="row align-items-center mb-5">
    <a href="." style="font-size: 55px;color:#fc7db0;" title="Voltar para página inicial">
      <i class="fas fa-chevron-left"></i>
    </a>
    <div class="col d-flex justify-content-center">
      <div class="image-center"></div>
    </div>
  </div>
  <p class="text-center">
    Escolha até 3 números disponíveis e clica no botão "Continuar" para seguir a diante e participar da nossa rifa.
  </p>
  <p class="text-center">
    <strong><?= $_SESSION['user']['name'] ?></strong>
  </p>
  <form id="form-numbers">
    <div class="col-12 mb-3">
      <a id="btnConfirm" class="btn btn-success">Continuar</a>
    </div>
    <div class="col-12 select-number">
      <?php
      for ($i = 1; $i <= 100; $i++) {
        $disponivel = true;
        if (in_array($i, $indisponivel))
          $disponivel = false;
      ?>
        <div class="float-left w-20 mb-3 mr-2 number">
          <div class="btn-group-toggle" data-toggle="buttons">
            <label class="btn <?=$disponivel?'btn-outline-primary':'btn-danger'?>">
              <?=$disponivel?'<input name="numbers[]" type="checkbox" value="'.$i.'">':''?>
              <i class="fas fa-baby-carriage text-center mt-3"></i>
              <p><?=$i?></p>
              <small></small>
            </label>
          </div>

        </div>
      <?php
      }
      ?>
    </div>
  </form>
</div>
<?php
Inline::a();
?>
<script src="assets/js/jbr.form-1.0.2.js" type="text/javascript"></script>
<script src="assets/js/jbr.file-1.0.1.js" type="text/javascript"></script>
<script type="text/javascript">
  $('input:checkbox').click(function() {
    let check = $('input:checkbox:checked').length;
    if (check > 3) {
      Swal.fire({
        icon: 'error',
        title: 'Não pode escolher mais de 3 números',
        allowOutsideClick: false
      })
      return false;
    }
  });
  $('#btnConfirm').click(function() {
    Swal.fire({
      title: 'Confirmar?',
      text: "Deseja confirmar o(s) número(s) selecionado(s)?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar',
      cancelButtonText: 'Voltar'
    }).then((result) => {
        Swal.fire({
            title: '',
            allowEscapeKey: false,
            allowOutsideClick: false,
            onOpen: () => {
                swal.showLoading();
            }
        });
      if (result.isConfirmed) {
        $('#form-numbers').submit();
      }
    })

  });

(function($){
  window.cad = $.form({
    a:'save-number',
    F:'#form-numbers',
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