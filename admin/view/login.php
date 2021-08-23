<script type="text/javascript">
var _xm = '<?=$x->m?>';
var _xl = '<?=$x->l?>';
if(_xm)alert(_xm);
if(_xl)window.location = _xl;
</script>
<script type="text/javascript">
function ver(f){
}
</script>
<div class="col-md-3 center">
	<div class="login-box">
		<a href="admin" class="logo-name text-lg text-center"><img src="assets/img/logo.png"/></a>
		<p class="text-center m-t-md">Utilize o formulário abaixo para logar no sistema e utilizar as funcionalidades disponíveis para seu usuário.</p>
		<form method="post" class="m-t-md">
			<input type="hidden" name="referer" value="<?=strg('referer')?>"/>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="E-mail" name="user"
				value="<?=$u?>"
				style="text-transform: uppercase"
				required
				/>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Senha" name="pass" required>
			</div>
			<button type="submit" class="btn btn-success btn-block">Login</button>
			<a href="esqueci" class="display-block text-center m-t-md text-sm">Esqueceu a senha?</a>
		</form>
		<p class="text-center m-t-xs text-sm">&copy; <?=date('Y')?><a href="" target="_blank"></a></p>
	</div>
</div>