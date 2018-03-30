$(function(){
	var ex = $('.ex1');
	$('.ev1').click(function(){
		$(this).css("background", "#ccc"); //Um clique
		ex.text("voce clicou!");
	});

	$('.ev2').dblclick(function(){           //2 cliques
		ex.text("voce deu 2 cliques!");
	});

	$('.ev3').focusin(function(){
		$(this).css("background", "#ccc"); //Um clique
		ex.text("voce deu foco!");
	}).focusout(function(){
		$(this).css("background", "#000"); //Um clique
		ex.text("voce tirou o foco!");
	});

	$('.ev4').hover(function(){
		
		$(this).css("background", "#fff"); //Um clique
		ex.text("voce passou o mouse!");
	});

	$('.ev5').mousedown(function(){
		$(this).css("background", "red");
		ex.text("voce apertou o botao do mouse!");
	}).mouseup(function(){
		ex.text("voce soltou o botao do mouse!");
	});
	var a =0;
	$('.ev6').mouseenter(function(){
		a +=1;
		ex.text("entradas do mouse: "+a);
	}).mouseout(function(){
		ex.text("saida do mouse: ");
	});
	
	var b =0;
	$('.ev7').mouseover(function(){
		b+=1;
		ex.text("mouse over: "+b);
	}).mouseleave(function(){
		ex.text(" mouse leave: ");
	});
});