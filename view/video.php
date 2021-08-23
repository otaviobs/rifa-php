<div class="page-section background-imagem">
  <div class="container">
    <div class="row">
      <div class="col-12 mt-3">
        <div aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center">
<?
if($videos->rowCount()){
  while($rv = $videos->fetchObject()){
    $checkVideo = $b->query("select * from VideoUsuarios where id_usuario={$s->idc} and id_video = {$rv->id_video}");
    $nomeVideo = explode(" ", $rv->nome);
    if($s->id==$rv->id_video){
?>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-video"></i> <?=$nomeVideo[0].' '.$nomeVideo[1]?></li>
<?
    }else{
?>
            <li class="breadcrumb-item"><a class="text-<?=$checkVideo->rowCount()?'success':'danger'?>" href="video/<?=$rv->id_video?>"><i class="fas fa-video"></i> <?=$nomeVideo[0].' '.$nomeVideo[1]?></a></li>
<?
    }
  }
}
?>
            <li class="breadcrumb-item <?=$enableQuiz?'':'active'?>" aria-current="page">
            <?=$enableQuiz?'<a class="text-'.$quizOk.'" href="quiz"><i class="fas fa-edit"></i> Quiz</li></a>':'<i class="fas fa-edit"></i> Quiz'?>
          </ol>
        </div>
        <h3 class="page-section-heading text-center text-uppercase text-ibbl-blue"><?=$rs->nome?></h3>
        <h5 class="h5 mb-3 text-center"><?=$rs->descricao?></h5>
        <div class="embed-responsive embed-responsive-21by9">
          <iframe onclick="alert('teste')" class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$rs->link?>" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$videoAssistido = $b->query("select * from VideoUsuarios where id_usuario={$s->idc} and id_video = {$s->id}");
if(!$videoAssistido->rowCount()){
Inline::a();
?>
<script type="text/javascript">
$( document ).ready(function() {
  setTimeout(function(){
    setChecked();
  }, <?=$rs->tempo?>);
});

function setChecked(){
  var data = {id:<?=$s->id?>}
  $.post('ajax/video.json',data,function(x){
		console.log(x);
	},'json').always(function(x){

  });
}
</script>
<?php
Inline::b();
}
?>