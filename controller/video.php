<?
if(!$s->idc)$s->loc('.');
if($s->id) {
  $rs = $b->query("select * from Videos where id_video={$s->id} limit 1")->fetchObject();
  if(!$rs)$s->loc('vendedor');
}else{
  $s->loc('vendedor');
}
$videos = $b->query("select * from Videos order by id_video asc");
$checkQuiz = $b->query("select * from Videos v inner join VideoUsuarios vu on vu.id_video = v.id_video where vu.id_usuario={$s->idc}");
$enableQuiz = $checkQuiz->rowCount() == 5;
$quizOk = 'danger';
if($enableQuiz){
  $quiz = $b->query("select * from Quiz where id_usuario={$s->idc} order by id_quiz desc limit 1")->fetchObject();
  if($quiz){
    $resultado = $b->query("select * from QuizRespostas as q inner join Respostas as r on q.id_resposta=r.id_resposta and r.correta=1 where q.id_quiz={$quiz->id_quiz}");
    $resultado->rowCount()>=7?$quizOk='success':'danger';
  }
}
