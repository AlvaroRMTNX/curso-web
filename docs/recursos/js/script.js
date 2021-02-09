$(document).ready(function(){

	//Menu stiky
	var altura = $('#fixed').offset().top;

	$(window).on('scroll', function(){
		if($(window).scrollTop() > altura)
		{
			$('#fixed').addClass('fixed');
		}
		else
		{
			$('#fixed').removeClass('fixed');
		}
	});

	//Menu de los temas
	var links = $('.temas');
	var pestanas = links.find('li');
	var documento = $('.documento');

	pestanas.eq(0).add(documento.eq(0)).addClass('active');

	links.on('click', 'li', function(){
		var t = $(this);
		var i = t.index();

		t.add(documento.eq(i)).addClass('active').siblings().removeClass('active');
	});

	//Redirección
	$('#html').click(function(){
		redireccion("./html.html");
	});

	$('#html5').click(function(){
		redireccion("./html5.html");
	});

	$('#estructura').click(function(){
		redireccion("./estructura.html");
	});

	$('#etiquetas').click(function(){
		redireccion("./etiquetas.html");
	});

	function redireccion(url) {
		var a = document.createElement("a");
		a.target = "_blank";
		a.href = url;
		a.click();
	}

});