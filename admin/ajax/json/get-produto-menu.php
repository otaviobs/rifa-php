<?
$id = strg('id',3);
if($id){
	$spm = $b->query("select p.h1,p.t,f.it,f.alt,b.it background,b.alt altb from produto p inner join fotos f on p.id=f.idp and f.tipo='produto' and f.principal inner join fotos b on p.id=b.idp and b.tipo='produto-background' and b.principal where p.s and p.idc=$id order by p.om limit 3");
	while($rpm=$spm->fetchObject()){
		$x->result.= '
		<li class="col-xl-4">
      <div class="item">
        <div class="b-goods">
          <h4>'.$rpm->h1.'</h4>
          <h6>SAIBA MAIS</h6>
          <a href="'.$rpm->t.'"><img class="img-float1 swingS" src="upload/produtos/thumb/'.$rpm->it.'" alt="'.($rpm->alt?$rpm->alt:$rpm->h1).'"/></a>
          <img class="img-scale" src="upload/produtos/thumb/'.$rpm->background.'" alt="'.($rpm->altb?$rpm->altb:$rpm->h1).'"/>
        </div>
      </div>
    </li>';
	}
}