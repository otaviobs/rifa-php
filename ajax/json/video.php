<?php
if($s->idc){
	$id_video = strpr('id');
    if($b->exec("insert into VideoUsuarios set id_video='$id_video', id_usuario={$s->idc}, dataCadastro=now()")){
        $x->m = 'Vídeo cadastrado com sucesso!';
        $x->ok = 1;
    }else $x->m = 'Ocorreu um erro, tente novamente!';
}else $neg = true;