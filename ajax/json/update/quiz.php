<?php
if($s->idc){
	$id_usuario = $s->idc;
	$respostas = strps('respostas');
  $quantidade = count($respostas);

	if($quantidade<10)$x->m = 'Responda todas as perguntas!';
	else{
		if($b->exec("insert into Quiz set dataCadastro=now(),id_usuario=$id_usuario")){
			$id = $b->lastInsertId();
      foreach($respostas as $id_pergunta => $id_resposta) {
        $id_pergunta = (int)$id_pergunta;
        $id_resposta = (int)$id_resposta;
        $b->exec("insert into QuizRespostas set dataCadastro=now(),id_quiz=$id,id_pergunta=$id_pergunta,id_resposta=$id_resposta");
      }
			$x->ok = 1;
			$x->m = 'Quiz realizado com sucesso!';
			$x->l = 'certificado';
		}else $x->m = 'Erro ao realizar o Quiz!';
	}
}else $neg = true;