<?php
if(!$s->idc)$s->loc('.');

$videos = $b->query("select * from Videos order by id_video asc");
$checkQuiz = $b->query("select * from Videos v inner join VideoUsuarios vu on vu.id_video = v.id_video where vu.id_usuario={$s->idc}");
$enableQuiz = $checkQuiz->rowCount() >= 5;


$quiz = $b->query("select * from Quiz where id_usuario={$s->idc} order by id_quiz desc limit 1")->fetchObject();
$finishQuiz = false;
if($quiz){
	$resultado = $b->query("select * from QuizRespostas as q inner join Respostas as r on q.id_resposta=r.id_resposta and r.correta=1 where q.id_quiz={$quiz->id_quiz}");
	$finishQuiz = $resultado->rowCount()>=7;
}
$rank = $b->prepare("SET @curRank = 0, @prev_val = NULL");
$rank->execute();

$rank = $b->query("
SELECT * FROM (
    SELECT d.id_usuario, d.nome, d.pontos, d.nome_loja,
        @curRank := IF(@prev_val=d.pontos,@curRank,@curRank+1) AS rank,
        @prev_val := d.pontos as pontos_anterior
    FROM (
        SELECT u.id_usuario, u.nome, l.nome AS nome_loja,
        (CASE 
			WHEN u.aprovado = 1 AND u.dataCadastro >='2021-06-28' THEN sum(COALESCE(p.pontos,0)) + 60
			WHEN u.aprovado = 1 THEN sum(COALESCE(p.pontos,0)) + 50
			WHEN u.dataCadastro >='2021-06-28' THEN sum(COALESCE(p.pontos,0)) + 10
			ELSE sum(COALESCE(p.pontos,0)) 
		END) as pontos
        FROM Usuarios AS u 
            LEFT JOIN Pedidos AS p on (u.id_usuario = p.id_usuario and p.status = 1)
            LEFT JOIN Lojas AS l on u.cnpj = l.cnpj
        WHERE u.id_perfil = 4
        and u.status = 1
        group by u.id_usuario, u.nome, l.nome
        order by pontos desc 
    ) AS d, (SELECT @curRank := 0) AS r
) AS ranking
WHERE pontos <>0 and ranking.id_usuario = {$s->idc}
")->fetchObject();