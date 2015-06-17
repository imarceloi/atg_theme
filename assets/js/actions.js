jQuery(document).ready(function($) {
	var aulturaTela		= $( window ).height();
	var alturaMenu 		= $( '#header' ).height();
	var alturaFooter	= $( '.footer' ).height();
	var alturaFooterInt	= $( '.footer-int' ).height();
	var pegaClassFooterInt = $('footer').hasClass('.footer-int');
	var caluculaAltura	= aulturaTela-alturaMenu-alturaFooter;

	function geralTamanhos() {
		aulturaTela		= $( window ).height();
		alturaMenu 		= $( '#header' ).height();
		alturaFooter	= $( '.footer' ).height();
		alturaFooterInt	= $( '.footer-int' ).height();
		caluculaAltura	= aulturaTela-alturaMenu-alturaFooter;
		// APLICA O TAMANHO RESTANTE DA ALTURA NOS BANNERS
		$( '.banner li' ).height( caluculaAltura-alturaFooterInt );
		$( '.banner' ).height( caluculaAltura-alturaFooterInt );
		$( '.slider_home' ).height( caluculaAltura );
	}
	geralTamanhos();

	// CAROUSEL HOME
 	$('.bxslider').bxSlider({
 		infiniteLoop: false,
 		auto: true
	});
	
	//MASCARA TELEFONE
    $('.wpcf7-tel').mask('99 (99) 9?9999-9999');
	
	// GOOGLE ANALYTICS
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-55225399-1', 'auto');
	ga('send', 'pageview');

	window.onresize = function() {
		geralTamanhos();
	};
});
