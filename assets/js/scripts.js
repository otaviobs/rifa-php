jQuery(document).ready(function($){
	//FUNCTIONS
	function message(ok,msg){
		$('#sys-notification').show();
		var answer = ok==1?'success':'danger';
		var icon = ok==1?'check':'question';
		$('#notification').html('<div class="alert alert-'+answer+'"><i class="fa fa-'+icon+'-circle"></i> '+msg+'<button type="button" class="close" data-dismiss="alert">×</button></div>').show();
		setTimeout(function(){$('#notification').hide();},5000);
	}

	//SUBMETE FORM
	function onSubmit(token,event){
		event.preventDefault();
		$('.btn-primary').addClass('face');
		var data = $('#actionForm').serializeArray(),dataObj = {};;
		$(data).each(function(i, field){
			dataObj[field.name] = field.value;
		});
		$.post(dataObj['caminho'],data,function(x){
			if(x.hasCaptcha==1)grecaptcha.execute();
			$('.btn-primary').removeClass('face');
			if(x.m)message(x.ok,x.m);
		},'json').always(function(x){
			$('.btn-primary').removeClass('face');
			if(x.hasCaptcha==1)grecaptcha.reset();
			if(x.ok==1)window.location = x.l;
		});
	}

	$(document).on('submit','#actionForm',function(){
		token = 'teste';
		onSubmit(token,event);
	});

	//REGISTER NEWSLETTER
	$(document).on('submit','#newsletter-form',function(event){
		jQuery.post('ajax/email.json',{email:$('.email-newsletter').val()},function(x){
			if(x.news)message(x.ok,x.news);
		},'json').success(function(x){
		});
		return false;
	});

	// scroll animation
	$("a").on("click", function(event) {
		if (this.hash !== "") {
				event.preventDefault();
				var hash = this.hash;
				$("html, body").animate({
						scrollTop: $(hash).offset().top - 50
				}, 850);
		}
	});

	if($(window).scrollTop() > 50) {
		$(".navbar").addClass("navbar-fixed");
	}
	// navbar on scroll
	$(window).on("scroll", function() {
		var onScroll = $(this).scrollTop();
		if( onScroll > 50) {
			$(".navbar").addClass("navbar-fixed");
		}
		else {
			$(".navbar").removeClass("navbar-fixed");
		}
	});
});

$('.navbar-toggler').on('click', function(){
	if ($(this).hasClass('open-menu')) {
		$(this).removeClass('open-menu');
	}else{
		$(this).addClass('open-menu');
	}
});