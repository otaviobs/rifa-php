<script type="text/javascript">
<?
if($x->l)echo "window.location = '$x->l';\r\n";
?>
</script>
<script type="text/javascript">
function ver(f){}
</script>
<div class="col-md-3 center">
	<div class="login-box">
		<a href="." class="logo-name text-lg text-center"><img src="assets/img/logo.png"/></a>
		<h3 class="text-center m-t-md">CONFIRMAR CADASTRO.</h3>
		<p class="text-center m-t-md">Digite os dados para cadastrar a senha.</p>
		<div class="info" style="color:#f00"><strong class="err"></strong></div>
		<form method="post" class="m-t-md" onsubmit="return ver(this,'confirmar-cadastro','admin');">
			<div class="form-group">
				<input type="hidden" class="form-control" name="id" value="<?=$s->id?>">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" name="email" value="<?=$rs->email?>">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" name="codigo" value="<?=$rs->codigo?>">
			</div>
			<div class="form-group">
				<input type="password" min="8" max="50" class="form-control" placeholder="Nova Senha" name="p1" srequired>
			</div>
			<div class="form-group">
				<input type="password" min="8" max="50" class="form-control" placeholder="Confirmar Nova Senha" name="p2" srequired>
			</div>
			<div class="clearfix"></div>
			<button type="submit" class="btn btn-success btn-block">Enviar</button>
		</form>
		<p class="text-center m-t-xs text-sm">&copy; <?=date('Y')?><a href="" target="_blank"></a></p>
	</div>
</div>
<?
Inline::a();
?>
<script type="text/javascript">
$(function(){
	erro();
});
function erro(m,e,c){
	e = $(e||'.err');
	e.html(m||'').css('display',m?'':'none');
	if(c&&c.select)c.select();
}
function ver(f,u,l){
	if(ver.l)return false;
	ver.l = 1;
	erro();
	$.post('ajax/'+u+'.json',$(f).serialize(),function(x){
		if(x.m)x.ok?alert(x.m):erro(x.m,0,f[x.c]);
		if(x.ok)f.reset();
		if(x.ok&&l)location = l;
	},'json').complete(function(x){
		//alert(x.responseText);
		ver.l = 0;
	});
	return false;
}
</script>
<?
Inline::b();
?>