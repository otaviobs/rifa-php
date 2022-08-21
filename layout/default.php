<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?
  // $codigoExterno = $b->query("select * from codigo_externo where id=1")->fetchObject();
  if ($codigoExterno->ga) {
  ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $codigoExterno->ga ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', '<?= $codigoExterno->ga ?>');
      <?
      if ($codigoExterno->ad) {
      ?>
        gtag('config', '<?= $codigoExterno->ad ?>');
      <?
      }
      if ($codigoExterno->adConversion && $s->pg == 'obrigado') {
      ?>
        gtag('event', 'conversion', {
          'send_to': '<?= $codigoExterno->ad . "/" . $codigoExterno->adConversion ?>'
        });
      <?
      }
      ?>
    </script>
  <?
  } elseif ($codigoExterno->googleTagManager) {
  ?>
    <!-- Google Tag Manager -->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', '<?= $codigoExterno->googleTagManager ?>');
    </script>
    <!-- End Google Tag Manager -->
  <?
  }
  if ($codigoExterno->pixelFacebook) {
  ?>
    <!-- Facebook Pixel Code -->
    <script>
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '<?= $codigoExterno->pixelFacebook ?>');
      fbq('track', 'PageView');
    </script>
    <noscript>
      <img height="1" width="1" src="https://www.facebook.com/tr?id=<?= $codigoExterno->pixelFacebook ?>&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
  <?
  }
  $noCache = $s->noCache();
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <base href="<?= "{$s->dom}{$s->dir}" ?>" />
  <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
  <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="assets/css/theme.min.css?<?= $noCache ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <?php
  if ($s->pg == 'ranking') {
  ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css" />
  <?php
  }
  ?>

  <?
  // if($s->pg==='404'){
  //   $s->tagd = 'Página não encontrada!';
  //   $s->h1 = '404';
  //   $s->tagt = '404';
  // }elseif($s->pg==='empresa'){
  //   $s->tagd = $rs->d;
  //   $s->tagt = $rs->nome;
  // }elseif($meta=$s->metatag($s->pg)){
  // 	if(!$s->tagd)$s->tagd = $meta->d;
  // 	if(!$s->h1)$s->h1 = $meta->h1;
  // 	if(!$s->tagt)$s->tagt = $meta->t.($s->pgn>1?' - página '.$s->pgn:'');
  // }
  if (!$s->seo['/canonical']) $s->seo['/canonical'] = $s->base . ($s->pg == 'home' ? '' : $s->pg . ($s->spg && $s->spg != 'home' ? '/' . $s->spg : '') . ($s->cat ? '/' . $s->cat : '') . ($s->pgn > 1 ? '/' . $s->pgn : ''));
  if (!$s->seo['@og:image']) $s->seo['@og:image'] = $s->base . 'images/logo-face.png';
  //if(!$s->seo['revisit-after'])$s->seo['revisit-after'] = $s->pg==='home'?'1 day':'3 days';

  $s->seo['description'] = $s->tagd;
  $s->seo['keywords'] = $s->tagk;
  $s->seo['@og:title'] = $s->tagt;
  $s->seo['@og:description'] = $s->tagd;
  $s->seo['@og:url'] = $s->seo['/canonical'];
  //if($s->seo['/alternate'] = $s->seo['/canonical'])$s->seo['/alternate'] .= '" hreflang="pt-br';

  $s->seo['twitter:title'] = $s->tagt;
  $s->seo['twitter:description'] = $s->tagd;
  $s->seo['twitter:image'] = $s->seo['@og:image'];

  //if($s->pgn>1||$s->spg=='categoria'||$s->spg=='marca'||$s->spg=='tag')echo '<meta name="robots" content="noindex,follow"/>';
  //if($s->pgn>1&&($s->pg=='blog'))echo '<meta name="robots" content="noindex,follow"/>';
  if ($s->pg == 'fb-callback' || $s->pg == 'home-slider' || $s->pg == 'checkout-pagsegurocard') echo '<meta name="robots" content="noindex,nofollow"/>';
  ?>
    <meta name="title" content="Chá de fraldas do Théo">
    <meta name="description" content="Uma nova solução para todos se unirem nesse momento único. Funciona como um chá de fralda com rifa.">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Chá de fraldas do Théo">
    <meta itemprop="description" content="Uma nova solução para todos se unirem nesse momento único. Funciona como um Chá de fraldas da  com rifa.">
    <meta itemprop="image" content="https://chadotheo.com.br/assets/img/icon.png">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://chadotheo.com.br/">
    <meta property="og:title" content="Chá de fraldas do Théo">
    <meta property="og:description" content="Uma nova solução para todos se unirem nesse momento único. Funciona como um chá de fralda com rifa.">
    <meta property="og:image" content="https://chadotheo.com.br/assets/img/icon.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://chadotheo.com.br/">
    <meta property="twitter:title" content="Chá de fralda do Théo">
    <meta property="twitter:description" content="Uma nova solução para todos se unirem nesse momento único. Funciona como um chá de fralda com rifa.">
    <meta property="twitter:image" content="https://chadotheo.com.br/assets/img/icon.png">
  <title><?= $s->tagt ?></title>
  <!-- SEO -->
  <?php
  $s->printTags($s->seo);
  ?>
  <!-- / SEO -->
  <?php
  if ($s->richCards) {
  ?>
    <script type="application/ld+json">
      <?= json_encode($s->richCards) ?>
    </script>
  <?php
  }
  ?>
  <style>

    .backgroud {
      background: #add4f2;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
    }

    .form-signin {
      background: #ffffff73;
      border-radius: 1.5rem;
    }
  </style>
</head>

<body class="backgroud" <?= $s->bodyCls . ($s->pg == '404' ? '' : '') ?>">
  <div class="loading text-center" style="margin-left: auto;margin-right: auto;">
    <img width="200" src="assets/img/loading.gif">
  </div>
  <div class="container d-none">
    <div class="row">
<?php
    if (file_exists($_inc = "{$s->VIEW}{$s->pg}.php")) include $_inc;
?>     
    </div>
  </div>

  <!--
<a href="https://wa.me/5511999999999" target="_blank" class="js-statsd-wa-event-click btn-whatsapp btn-floating fixed-whats visible-when-content-ready" style="right: 20px">
  <svg baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="300 -476.1 1792 1792">
    <path d="M1413 497.9c8.7 0 41.2 14.7 97.5 44s86.2 47 89.5 53c1.3 3.3 2 8.3 2 15 0 22-5.7 47.3-17 76-10.7 26-34.3 47.8-71 65.5s-70.7 26.5-102 26.5c-38 0-101.3-20.7-190-62-65.3-30-122-69.3-170-118s-97.3-110.3-148-185c-48-71.3-71.7-136-71-194v-8c2-60.7 26.7-113.3 74-158 16-14.7 33.3-22 52-22 4 0 10 .5 18 1.5s14.3 1.5 19 1.5c12.7 0 21.5 2.2 26.5 6.5s10.2 13.5 15.5 27.5c5.3 13.3 16.3 42.7 33 88s25 70.3 25 75c0 14-11.5 33.2-34.5 57.5s-34.5 39.8-34.5 46.5c0 4.7 1.7 9.7 5 15 22.7 48.7 56.7 94.3 102 137 37.3 35.3 87.7 69 151 101a44 44 0 0 0 22 7c10 0 28-16.2 54-48.5s43.3-48.5 52-48.5zm-203 530c84.7 0 165.8-16.7 243.5-50s144.5-78 200.5-134 100.7-122.8 134-200.5 50-158.8 50-243.5-16.7-165.8-50-243.5-78-144.5-134-200.5-122.8-100.7-200.5-134-158.8-50-243.5-50-165.8 16.7-243.5 50-144.5 78-200.5 134S665.3 78.7 632 156.4s-50 158.8-50 243.5a611 611 0 0 0 120 368l-79 233 242-77a615 615 0 0 0 345 104zm0-1382c102 0 199.5 20 292.5 60s173.2 93.7 240.5 161 121 147.5 161 240.5 60 190.5 60 292.5-20 199.5-60 292.5-93.7 173.2-161 240.5-147.5 121-240.5 161-190.5 60-292.5 60a742 742 0 0 1-365-94l-417 134 136-405a736 736 0 0 1-108-389c0-102 20-199.5 60-292.5s93.7-173.2 161-240.5 147.5-121 240.5-161 190.5-60 292.5-60z"></path>
  </svg>
</a>
-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="assets/js/scripts.js?<?= $noCache ?>"></script>
  <script src="assets/js/scripts.js?<?= $noCache ?>"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">

    $(document).ready(function() {
      $('.loading').addClass('d-none');
      $('.container').removeClass('d-none');
      $('#nome').focus();

    });

  </script>
  <?php
  Inline::write();
  InlineComponent::write();
  ?>
</body>

</html>