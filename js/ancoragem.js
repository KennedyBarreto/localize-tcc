$(document).ready(function(){
	// Armazenando elementos da página
	var barraNavegacao = $('nav');
	var linksMenu = $('nav div ul li a');

	// Criando um evento de 'click' para todos os elementos da variável 'linksMenu'
	linksMenu.on('click', function(evento){
		// Não executa o evento do link
		// Ou seja, o link para de funcionar

		// Pegando o valor do link (href) da seção que o usuário clicou
		var nomeSecao = $(this).attr('href');

		// Pegando a posição em relação ao 'topo' da seção escolhida pelo usuário
		var posicaoSecao = $(nomeSecao).offset().top;

		// Pegando a altura do menu
		var alturaMenu = $(barraNavegacao).height();

		// Criando uma animação para o corpo da página
		// (Em alguns navegadores utiliza-se somente 'body' ou somente o 'html')
		$('html').animate({
			// Faz uma scrollagem para um determinado valor em relação ao 'topo' da página
			scrollTop: (posicaoSecao - alturaMenu)
		}
		// Determina a velocidade da scrollagem
		,1000);
	});
});