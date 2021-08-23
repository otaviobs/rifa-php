<?php
class uploadFoto{
	public function getFotos($idp=0,$tipo_post){
		global $b;
		$stf = $b->query("select i from fotos where idp=$idp and tipo='$tipo_post'");
		$array = array();
		while($rstf=$stf->fetch())array_push($array,$rstf["i"]);
		return $array;
	}
	public function getIdFotos($file_name,$tipo_post){
		global $b;
		$rstf = $b->query("select id from fotos where i='$file_name' and tipo='$tipo_post' limit 1")->fetchObject();
		return $rstf->id;
	}
	public function deleteFotos($id=0,$tipo_post,$P,$Pt){
		global $b;
		$rstf = $b->query("select * from fotos where id=$id and tipo='$tipo_post' limit 1")->fetchObject();
		if($rstf->i){
			@unlink($P.$rstf->i);
			$fileName = pathinfo($rstf->i, PATHINFO_FILENAME);
			$webpI = $fileName.'.webp';
			@unlink($P.$webpI);
		}
		if($rstf->it){
			@unlink($Pt.$rstf->it);
			$fileName = pathinfo($rstf->it, PATHINFO_FILENAME);
			$webpIt = $fileName.'.webp';
			@unlink($Pt.$webpIt);
		}
		if($rstf->itc){
			@unlink($Pt.$rstf->itc);
			$fileName = pathinfo($rstf->itc, PATHINFO_FILENAME);
			$webpItc = $fileName.'.webp';
			@unlink($Pt.$webpItc);
		}
		if($rstf->ith){
			@unlink($Pt.$rstf->ith);
			$fileName = pathinfo($rstf->ith, PATHINFO_FILENAME);
			$webpIth = $fileName.'.webp';
			@unlink($Pt.$webpIth);
		}
		if($rstf->iti){
			@unlink($Pt.$rstf->iti);
			$fileName = pathinfo($rstf->iti, PATHINFO_FILENAME);
			$webpIti = $fileName.'.webp';
			@unlink($Pt.$webpIti);
		}
		if($rstf->itm){
			@unlink($Pt.$rstf->itm);
			$fileName = pathinfo($rstf->itm, PATHINFO_FILENAME);
			$webpItm = $fileName.'.webp';
			@unlink($Pt.$webpItm);
		}
		if($rstf->itr){
			@unlink($Pt.$rstf->itr);
			$fileName = pathinfo($rstf->itr, PATHINFO_FILENAME);
			$webpItr = $fileName.'.webp';
			@unlink($Pt.$webpItr);
		}
		if($rstf->itu){
			@unlink($Pt.$rstf->itu);
			$fileName = pathinfo($rstf->itu, PATHINFO_FILENAME);
			$webpItu = $fileName.'.webp';
			@unlink($Pt.$webpItu);
		}
		$b->exec("delete from fotos where id=$id and tipo='$tipo_post' limit 1");
		if($rstf->principal)$b->exec("update fotos set principal=1 where idp='{$rstf->idp}' and tipo='$tipo_post' limit 1");
	}
	public function insertFotos($idp=0,$tipo_post,$file_name,$file_path){
		global $b;
		$stf = $b->query("select i from fotos where idp=$idp and tipo='$tipo_post'");
		if($stf->rowCount())$b->exec("insert into fotos (idp,tipo,dc,i) values ($idp,'$tipo_post',now(),'$file_name')");
		else $b->exec("insert into fotos (idp,tipo,dc,i,principal) values ($idp,'$tipo_post',now(),'$file_name',1)");

		// //WEBP CONVERT
		// $pasta = pathinfo($file_path, PATHINFO_DIRNAME).'/';
		// $name = $file_name;
		// $fileName = pathinfo($name, PATHINFO_FILENAME);
		// $ext = pathinfo($name, PATHINFO_EXTENSION);
		// $newName = $fileName.'.webp';

		// if($ext=='png'){
		//     $img = @imagecreatefrompng($pasta . $name);
		//     imagepalettetotruecolor($img);
		//     imagealphablending($img, true);
		//     imagesavealpha($img, true);
		//     imagewebp($img, $pasta . $newName, 80);
		//     imagedestroy($img);  
		// }if($ext=='jpg'||$ext=='jpeg'){
		//     $img = imagecreatefromjpeg($pasta . $name);
		//     imagewebp($img, $pasta . $newName, 80);
		//     imagedestroy($img);
		// }
	}
	public function updateFotos($id=0,$tipo_post,$it,$col,$file_path){
		global $b;
		$b->exec("update fotos set $col='$it',da=now() where id=$id and tipo='$tipo_post' limit 1");
	}
	public function convertFotos($file_path){
		global $b;
		//WEBP CONVERT THUMBS
		$pasta = pathinfo($file_path, PATHINFO_DIRNAME).'/';
		$pastaThumb = $pasta.'thumb/';
		$fileName = pathinfo($file_path, PATHINFO_FILENAME);
		$ext = pathinfo($file_path, PATHINFO_EXTENSION);
		$newName = $fileName.'.webp';
		$I = $fileName.'.'.$ext;

		$fotos = $b->query("select * from fotos where i='$I' limit 1")->fetchObject();
		$images = array();
		if($fotos->it)$images[] = $fotos->it;
		if($fotos->itc)$images[] = $fotos->itc;
		if($fotos->ith)$images[] = $fotos->ith;
		if($fotos->iti)$images[] = $fotos->iti;
		if($fotos->itm)$images[] = $fotos->itm;
		if($fotos->itr)$images[] = $fotos->itr;
		if($fotos->itu)$images[] = $fotos->itu;

		// foreach ($images as $v) {
		// 	$thumbName = pathinfo($v, PATHINFO_FILENAME);
		// 	$newThumb = $thumbName.'.webp';
		// 	if($ext=='png'){
		// 	    $img = @imagecreatefrompng($pastaThumb.$v);
		// 	    imagepalettetotruecolor($img);
		// 	    imagealphablending($img, true);
		// 	    imagesavealpha($img, true);
		// 	    imagewebp($img, $pastaThumb . $newThumb, 80);
		// 	    imagedestroy($img);  
		// 	}if($ext=='jpg'||$ext=='jpeg'){
		// 	    $img = @imagecreatefromjpeg($pastaThumb . $v);
		// 	    imagewebp($img, $pastaThumb . $newThumb, 80);
		// 	    imagedestroy($img);
		// 	}
		// }
	}
}