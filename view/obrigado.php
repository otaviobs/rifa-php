<style>
.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #fff;
  stroke-miterlimit: 10;
  margin: 2% auto;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #7ac142;
  }
}
</style>
<div class="page-section background-imagem pb-5">
  <div class="container">
    <h3 class="page-section-heading text-center text-uppercase p-3">Obrigado <i class="far fa-smile-wink"></i></h3>
    <div class="row justify-content-center">
      <h5 class="h5 mb-3 col-12 text-center">
        O seu cadastro foi realizado com sucesso
      </h5>

      <div class="col-12 mb-3 text-uppercase jumbotron">
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
              <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
              <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
          </div>
          <div class="col-md-7 col-sm-12">
            ENVIAMOS UM E-MAIL PARA CONFIRMAR O SEU ENDEREÇO DE EMAIL. <br />
            CASO NÃO ESTEJA NA SUA CAIXA DE ENTRADA, VERIFIQUE NA CAIXA DE SPAM
          </div>
        </div>
      </div>

    </div>
  </div>
</div>