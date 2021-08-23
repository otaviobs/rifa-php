<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=$s->tit?></title>
<base href="<?="{$s->dom}{$s->dirAdmin}"?>"/>
<link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
<meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
<?
//foreach($s->css as $v)echo '<link rel="stylesheet" type="text/css" href="'.$v.'"/>'."\r\n";
?>
<!-- Styles -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link href="assets/css/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
<link href="assets/css/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
<link href="assets/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/administrador.css?" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
<!-- Theme Styles -->
<link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
<?
foreach($s->css2 as $v)echo '<link rel="stylesheet" type="text/css" href="'.$v.'"/>'."\r\n";
?>
<style>
.menu ul{padding:10px 0px!important}
li ul.sub-menu li ul.sub-menu{display:none !important}
li ul.sub-menu li.open ul.sub-menu{display:block !important}
li ul.sub-menu li.open ul.sub-menu li a{color:#899dc1 !important}
li ul.sub-menu li.open ul.sub-menu li a:hover{background:#2b384e !important;color:#fff !important}
li ul.sub-menu li.open ul.sub-menu li.active a{background:#2b384e !important;color:#fff !important}
#backTop{cursor:pointer;position:fixed;right:15px;line-height:50px;width:50px;height:50px;text-align:center;background-color:#e0e0e0;color:#bbb;top:70%;-webkit-box-shadow:0 0 0 0 #34425a inset;box-shadow:0 0 0 0 #34425a inset;-webkit-transition:all .5s ease-in-out 0s;-o-transition:all .5s ease-in-out 0s;transition:all .5s ease-in-out 0s;z-index:999}
#backTop a{color:#666}
.rtl #backTop{left:15px;right:auto}
#backTop:hover{-webkit-box-shadow:0 0 0 30px #34425a inset;box-shadow:0 0 0 30px #34425a inset;color:#fff}
#backTop:hover a{color:#fff}
#backTop a:hover{color:#fff!important}
</style>
</head>
<body class="page-header-fixed">
<main class="page-content content-wrap">
<?
if($s->spg!='login'&&$s->spg!='esqueci'&&$s->spg!='confirmar-cadastro'){
?>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="sidebar-pusher">
				<a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="logo-box">
				<a href="." class="logo-text"><img src="assets/img/logo.png" width="140" height="34" alt="Logo"></a>
			</div>
			<div class="topmenu-outer">
				<div class="top-menu">
					<ul class="nav navbar-nav navbar-left">
						<li>		
							<a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a><strong><?=$s->nomeAdm?></strong></a>
						</li>
						<li>
							<a href="." class="log-out waves-effect waves-button waves-classic">
								<span><i class="fa fa-home m-r-xs"></i>Início</span>
							</a>
						</li>
						<li>
							<a href="logout" class="log-out waves-effect waves-button waves-classic">
								<span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="page-sidebar sidebar">
		<div class="page-sidebar-inner slimscroll">
			<ul class="menu accordion-menu">
				<li class="droplink pg-home pg-alterar-senha<?=$s->spg=='home'||$s->spg=='alterar-senha'?' open':''?>"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Home</p><span class="arrow"></span></a>
					<ul class="sub-menu">
<?php
if($s->tipoAdm<=2){
?>
						<li class="pg-home"><a href="home">Dashboard</a></li>
<?php
}
?>

						<li class="pg-alterar-senha"><a href="alterar-senha">Alterar Senha</a></li>
					</ul>
				</li>
				<li class="pg-pedidos pg-pedido"><a href="pedidos" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-shopping-cart"></span><p>Pedidos</p></a></li>
<?php
if($s->tipoAdm<=2){
?>
				<li class="pg-produtos pg-produto"><a href="produtos"><span class="menu-icon glyphicon glyphicon-barcode"></span><p>Produtos</p></a></li>
				<li class="pg-users pg-user"><a href="users" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Usuários</p></a></li>
<?php
}
?>
				<li class="pg-vendedores pg-vendedor"><a href="vendedores" class="waves-effect waves-button"><span class="menu-icon fa fa-users"></span><p>Vendedores</p></a></li>
				<?php/*<li class="droplink pg-vendedores-banido pg-vendedores pg-vendedor<?=$SPG=='vendedores-banido'||$SPG=='vendedores'||$s->spg=='vendedor'?' open':''?>">
					<a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-users"></span><p>Vendedores</p><span class="arrow"></span></a>
					<ul class="sub-menu">
						<li class="pg-vendedores pg-vendedor"><a href="vendedores">Vendedores</p></a></li>
						<li class="pg-vendedores-banido"><a href="vendedores-banido">Vendedores Banidos</p></a></li>
					</ul>
				</li>*/?>
				<li class="pg-lojas pg-loja"><a href="lojas" class="waves-effect waves-button"><span class="menu-icon fa fa-bank"></span><p>Lojas</p></a></li>
			</ul>
		</div>
	</div>
<?
}
?>
	<div class="page-inner">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="sys-notification" style="margin:0px 0 20px 0">
				<div>
					<div id="notification"></div>
				</div>
			</div>
		</div>
<?
if($s->spg!='login'&&$s->spg!='esqueci'&&$s->spg!='confirmar-cadastro'){
?>
		<div class="page-title">
			<h3><?=$s->titpg?></h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href=".">Home</a></li>
					<?=$s->titpg2?'<li '.($s->titpg3?'':'class="active"').'>'.($s->titpg3?'<a href="'.$s->back.'">':'').$s->titpg2.($s->titpg3?'</a>':'').'</li>':''?>
					<?=$s->titpg3?'<li class="active">'.$s->titpg3.'</li>':''?>
				</ol>
			</div>
		</div>
<?
}
?>
		<div id="main-wrapper">
			<div class="row">
<?
if($s->spg!='login'&&$s->spg!='esqueci'&&$s->spg!='confirmar-cadastro'){
	if(file_exists($f="{$s->VIEW}{$s->spg}.php"))include $f;
?>
			</div>
			<div class="clearfix"></div>
<?
}elseif(file_exists($f="{$s->VIEW}{$s->spg}.php"))include $f;
?>
		</div>
<?
if($s->spg!='login'&&$s->spg!='esqueci'&&$s->spg!='confirmar-cadastro'){
?>
		<div class="page-footer">
			<p class="no-s">&copy; <?=date('Y')?><a href="" target="_blank"></a></p>
		</div>
<?
}
?>
	</div>
</main>
<div id="backTop" style="display:none"><a>TOPO<!--<i class="fa fa-angle-up"></i>--></a></div>
<script src="assets/js/admin/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
jQuery(function($){
	$('.menu li.pg-<?=$SPG?$SPG:$s->spg?>').addClass('active');
});
</script>
<?
foreach($s->js as $v)echo '<script type="text/javascript" src="'.$v.'"></script>'."\r\n";
foreach($s->ijs as $v)echo '<script type="text/javascript">'.$v.'</script>'."\r\n";
?>
<script src="assets/js/admin/jquery-ui.min.js"></script>
<script src="assets/js/admin/jquery.blockui.js"></script>
<script src="assets/js/admin/bootstrap.min.js"></script>
<script src="assets/js/admin/jquery.slimscroll.min.js"></script>
<script src="assets/js/admin/switchery.min.js"></script>
<script src="assets/js/admin/jquery.uniform.min.js"></script>
<script src="assets/js/admin/waves.min.js"></script>
<script src="assets/js/admin/modern.min.js"></script>
<?
foreach($s->js2 as $v)echo '<script type="text/javascript" src="'.$v.'"></script>'."\r\n";
foreach($s->ijsl as $v)echo '<script type="text/javascript">'.$v.'</script>'."\r\n";
?>
<script type="text/javascript">
window.setInterval(function(){
	$.get('ajax/session.json',function(x){
		//$('#result').html(x.timeoutAdm);
	});
},120000);
$('#id-form').on('focus', 'input[type=number]', function (e) {
	$(this).on('mousewheel.disableScroll', function (e) {
		e.preventDefault()
	})
});
$('#id-form').on('blur', 'input[type=number]', function (e) {
	$(this).off('mousewheel.disableScroll')
});

var ar=new Array(38,40);

/*
//DISABLE UP AND DOWN ON INPUT NUMBER
$('input[type=number]').keydown(function(e) {
	var key = e.which;
	if($.inArray(key,ar) > -1) {
		e.preventDefault();
		return false;
	}
	return true;
});*/



/*if($("#tagd").length==1){
	$("#tagd").prev().html('Meta Description<div class="clearfix"></div><span id="limite" class="pull-left" style="font-weight:bold;color:#00750F;margin:3px 0 5px 0"></span>');
	$("#tagt").prev().html('Meta Title<div class="clearfix"></div><span id="limite-title" class="pull-left" style="font-weight:bold;color:#00750F;margin:3px 0 5px 0"></span>');
	$(document).ready(function(){
		var m = 153,mt = 70,d = $("#tagd").val().length,t = $("#tagt").val().length;
		$("#limite").text('* '+d+' caracter'+(d>1?'es':'')+' digitado!');
		if(d>m)$("#limite").css('color','#f00');
		else $("#limite").css('color','#00750F');
		$("#limite-title").text('* '+t+' caracter'+(t>1?'es':'')+' digitado!');
		if(t>mt)$("#limite-title").css('color','#f00');
		else $("#limite-title").css('color','#00750F');
	});
	$(document).on("#tagd keyup",function(){
		var m = 153,mt = 70,d = $("#tagd").val().length,t = $("#tagt").val().length;
		$("#limite").text('* '+d+' caracter'+(d>1?'es':'')+' digitado!');
		if(d>m)$("#limite").css('color','#f00');
		else $("#limite").css('color','#00750F');
		$("#limite-title").text('* '+t+' caracter'+(t>1?'es':'')+' digitado!');
		if(t>mt)$("#limite-title").css('color','#f00');
		else $("#limite-title").css('color','#00750F');
	});
}

$("#d").prev().html('Meta Description<div class="clearfix"></div><span id="limite" class="pull-left" style="font-weight:bold;color:#00750F;margin:3px 0 5px 0"></span>');
$("#t").prev().html('Meta Title<div class="clearfix"></div><span id="limite-title" class="pull-left" style="font-weight:bold;color:#00750F;margin:3px 0 5px 0"></span>');
$(document).ready(function(){
	var m = 153,mt = 70,d = $("#d").val().length,t = $("#t").val().length;
	$("#limite").text('* '+d+' caracter'+(d>1?'es':'')+' digitado!');
	if(d>m)$("#limite").css('color','#f00');
	else $("#limite").css('color','#00750F');
	$("#limite-title").text('* '+t+' caracter'+(t>1?'es':'')+' digitado!');
	if(t>mt)$("#limite-title").css('color','#f00');
	else $("#limite-title").css('color','#00750F');
});
$(document).on("#d keyup",function(){
	var m = 153,mt = 70,d = $("#d").val().length,t = $("#t").val().length;
	$("#limite").text('* '+d+' caracter'+(d>1?'es':'')+' digitado!');
	if(d>m)$("#limite").css('color','#f00');
	else $("#limite").css('color','#00750F');
	$("#limite-title").text('* '+t+' caracter'+(t>1?'es':'')+' digitado!');
	if(t>mt)$("#limite-title").css('color','#f00');
	else $("#limite-title").css('color','#00750F');
});*/



$(function(){
	var offset = 300,scroll_top_duration = 700,$back_to_top = $('#backTop');

	$(window).scroll(function(){
		$(this).scrollTop()>offset?$back_to_top.show(): $back_to_top.hide();
	});

	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	},scroll_top_duration
		);
	});

	$('#h1').caracters({minAlert:101,max:125});
<?
if($SPG=='produto'){
?>
	$('#h2').caracters({max:41});
<?
}else{
?>
	$('#h2').caracters({minAlert:151});
<?
}
?>
	$('#tagd').caracters({minAlert:144,max:153});
	$('#tagt').caracters({minAlert:55,max:70});

});






(function($){
	var defaults = {
		isRender:true,
		colorok:'#00750f',
		coloralert:'#ff8f00',
		colorerror:'#f00',
		min:null,
		minAlert:null,
		maxAlert:null,
		max:null,
		length:0,
		ok:true,
		alert:false,
		$this:null,
		$label:null,
		$caption:null,
		quantity:function(l,ok,alert){
			return '* '+l+' caractere'+(l>1?'s':'')+' digitado!';
		},
		missing:function(l,ok,alert){
			return this.min!=null&&l<this.min?' ('+(this.min-l)+')':this.max!=null?' ('+(this.max-l)+')':'';
		},
		text:function(l,ok,alert){
			return this.quantity(l,ok,alert)+this.missing(l,ok,alert);
		},
		css:function(l,ok,alert){
			return {
				'color':ok?(alert?this.coloralert:this.colorok):this.colorerror
			};
		},
		trigger:function(){
			var l = this.length = this.$this.val().length,
			ok = this.ok = (this.min==null||l>=this.min)&&(this.max==null||l<=this.max),
			alert = this.alert = this.minAlert!=null&&l>=this.minAlert&&(this.maxAlert==null||l<=this.maxAlert);
			this.$caption.text(this.text(l,ok,alert)).css(this.css(l,ok,alert));
			return this;
		}
	};
	$.fn.caracters = function(options){
		return this.each(function(){
			var $this = $(this),
			data = $this.data();
			data = data.caracters = data.caracters||{};
			if(data.isRender){
				if($.isPlainObject(options)){
					$.extend(data,options);
					data.trigger();
				}
				return;
			}
			$.extend(data,defaults,options);
			data.$this = $this;
			data.$label = data.$label?$(data.$label):$this.prev();
			data.$caption = data.$caption?$(data.$caption):$('<div>',{
				'class':'',
				css:{'font-weight':'bold',margin:'3px 0 5px 0'},
				appendTo:data.$label
			});
			data.$this.on('keyup',function(){
				data.trigger();
			});
			data.trigger();
		});
	}
})(jQuery);

jQuery(function($){
	$('#tagt').on('keyup',function(){
		$('.title-seo span').html($(this).val());
	});
	$('#tagd').on('keyup',function(){
		var chars = $(this).val().length;
		if(chars<320)$('.description-seo span').html($(this).val());
	});

	$('#s').on('click',function(){
		if($(this).is(':checked')){
			if(!confirm('Você deseja ativar?')){
				$('div.checker span').removeClass('checked');
				$('#s').prop('checked',false);
			}
		}else{
			if(!confirm('Você deseja desativar?')){
				$('div.checker span').addClass('checked');
				$('#s').prop('checked',true);
			}
		}
	});
	/*$('#l').on('click',function(){
		if($(this).is(':checked')){
			if(!confirm('Você deseja ativar?')){
				$('div.checker span').removeClass('checked');
				$('#l').prop('checked',false);
			}
		}else{
			if(!confirm('Você deseja desativar?')){
				$('div.checker span').addClass('checked');
				$('#l').prop('checked',true);
			}
		}
	});*/
	/*$('#mais_vendido').on('click',function(){
		if($(this).is(':checked')){
			if(!confirm('Você deseja ativar?')){
				$('div.checker span').removeClass('checked');
				$('#mais_vendido').prop('checked',false);
			}
		}else{
			if(!confirm('Você deseja desativar?')){
				$('div.checker span').addClass('checked');
				$('#mais_vendido').prop('checked',true);
			}
		}
	});
	$('#promo_mes').on('click',function(){
		if($(this).is(':checked')){
			if(!confirm('Você deseja ativar?')){
				$('div.checker span').removeClass('checked');
				$('#promo_mes').prop('checked',false);
			}
		}else{
			if(!confirm('Você deseja desativar?')){
				$('div.checker span').addClass('checked');
				$('#promo_mes').prop('checked',true);
			}
		}
	});*/
});
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
function message(msg, ok) {
	Swal.fire({
		icon: ok?'success':'error',
		title: msg,
		allowOutsideClick: false
	});
}
</script>
<?
Inline::write();
?>
</body>
</html>