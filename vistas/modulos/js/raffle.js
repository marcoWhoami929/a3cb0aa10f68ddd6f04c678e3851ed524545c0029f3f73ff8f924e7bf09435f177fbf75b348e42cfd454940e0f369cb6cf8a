
var inProgress = false;
var size = 60;
function map(a, f){
	for(var i=0; i<a.length; i++){
		f(a[i], i);
	}
}

function desordenar(){
	var folios = JSON.parse(localStorage.participantes);
	folios.sort(function() {return Math.random() - 0.5});
  	return folios;
}

var numberOfWinnersPerRound = 1;

function process(){
	var folios = desordenar();
	imported = [];
	
    folios.forEach(function (boleto) {
 
	    imported.push({'folioBoleto':boleto.folioBoleto,'participante':boleto.participante,'idBoleto':boleto.idBoleto,'idParticipante':boleto.idParticipante,'monto':boleto.montoAcumulado});
	     
	});

    var numFromInput = parseInt(1, 10);
    if (isNaN(numFromInput) || numFromInput < 1) {
        numberOfWinnersPerRound = 1;
    } else {
        numberOfWinnersPerRound = Math.min(numFromInput, folios.length);
    }
    document.getElementById("iniciarRifa").style.display="";
	$('.enter-names').hide(500, function(){
		makeTicketsWithPoints();
	});
}

$(document).ready(function(){
	if(imported && imported.length > 0) {
		$('.enter-names').hide();

		makeTicketsWithPoints();
	}

	$('.name-text-field').on('input', function() {
		$('#participant-number').text(getNames().length || '');
	});
});



function remainingParticipants() {
	var participants = 0;
	for (var ticket of tickets) {
		if (ticket.points > 0) {
			participants++;
		}
	}

	return participants;
}

function Ticket(idBoleto,folioBoleto,idParticipante,participante,monto,points){
	this.folioBoleto = folioBoleto;
	if(typeof(points) == "number")
		this.points = points;
	else
		this.points = 1;
	this.dom = $("<div class='ticket' idBoleto='"+idBoleto+"' folioBoleto='"+folioBoleto+"' idParticipante='"+idParticipante+"' participante='"+participante+"' monto='"+monto+"'>").text("#"+folioBoleto);
	this.fixPosition = function(){
		var me = this;
		this.dom.css({
			'position':'absolute',
			'top': me.dom.offset().top,
			'left':me.dom.offset().left,
			'background': getColor(me.points),
		});
	};
	this.decrement = function(length, callback){
		var me = this;
		this.points--;
		if(this.points == 0){
			var directions = ['up', 'down', 'left', 'right'];
			this.dom.css({'background-color':colors[0]}).hide('drop', {direction:directions[length%directions.length]}, length <= 3 ? 750 : 3000/length, function(){
				callback();
			});
			$('#participant-number').text(remainingParticipants() + '/' + tickets.length);
		}
		else{
			this.dom.css({
				'background-color': getColor(me.points),
			})
			setTimeout(function() {
				callback();
			}, length == 2 ? 1000 : 3000/(length - numberOfWinnersPerRound));
		}
	}
}

var tickets = [];
var removeWinners = true;

function toggleRemoveWinners() {
	removeWinners = !removeWinners;
}

var removeDuplicateNames = function(data){
	var seen = {};
	return data.filter(function(d){
		if(seen[d.folioBoleto.toLowerCase()]){
			return false;
		}
		seen[d.folioBoleto.toLowerCase()] = true;
		return true;
	});
}

function standardizedImported() {
	var namePoints = {};
	
	var arreglo = desordenar();


	
	for (var entry of imported) {
		var points = (entry.points === undefined ? 1 : entry.points);
		if (entry.folioBoleto in namePoints) {
			namePoints[entry.folioBoleto] += points;
		} else {
			namePoints[entry.folioBoleto] = points;
		}
	}
	imported = [];
	
		for (var folioBoleto of arreglo) {
			imported.push({'idBoleto': folioBoleto["idBoleto"],folioBoleto: folioBoleto["folioBoleto"],'participante': folioBoleto["participante"],'idParticipante': folioBoleto["idParticipante"],'monto':folioBoleto["montoAcumulado"],points: namePoints[folioBoleto["folioBoleto"]]});
	
		}
    console.log(imported);
	return imported;

}

var makeTicketsWithPoints = function(){
	standardizedImported();

	tickets = [];
	$('.ticket').remove();

	map(removeDuplicateNames(imported), function(tdata){
		
		if (tdata.points === undefined) {
			tdata.points = 1;
		}
		if (tdata.points > 0) {
			var t = new Ticket(tdata.idBoleto,tdata.folioBoleto,tdata.idParticipante,tdata.participante,tdata.monto,tdata.points);
			t.dom.appendTo($('body'));
			tickets.push(t);
		}
    });

    $('#participant-number').css('width', '').text(tickets.length);
    
    if (tickets.length < 1) {
        return;
    }

	tickets.reverse();
	size = 40;
	$('.ticket').css('font-size', size + 'px');
	
	setTimeout(function() {
		map(tickets, function(ticket){
			ticket.fixPosition();
		});
		$('#iniciarRifa').unbind('click').click(function(){
	
			$("#iniciarRifa").addClass('not-active');
			var vueltas = localStorage.vueltas;
			if (vueltas == 0) {
				localStorage.setItem("vueltas",1);
				var width = $('#participant-number').text(tickets.length + '/' + tickets.length).width();
				$('#participant-number').css('width', width + 'px'); //keep position consistent during countdown
				pickName();
			}
			else if(vueltas == 9){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Ya se ha realizado la rifa',
				  
				})
				localStorage.setItem("vueltas",0);
				location.href="inicio";

			}else{
				var vuelta = vueltas*1+1;
				localStorage.setItem("vueltas",vuelta);
				var width = $('#participant-number').text(tickets.length + '/' + tickets.length).width();
				$('#participant-number').css('width', width + 'px'); //keep position consistent during countdown
				pickName();

			}
			
		});
	}, 800);
}

var getChoices = function(){
	var result = [];
	
	map(tickets, function(ticket){
		for (var i = 0; i < ticket.points; i++)
			result.push(ticket)
	});

	return result;
}

$(window).resize(function(){
	if(!inProgress)
		makeTicketsWithPoints(tickets);
});

function randomInt(max) {

	return Math.floor(Math.random() * max);
}

var pickName = function(){
	inProgress = true;
	$('.ticket').unbind('click');
	$('body').unbind('click');
	
	var choices = getChoices();

	if(remainingParticipants() > numberOfWinnersPerRound){
		var remove = randomInt(choices.length);
		choices[remove].decrement(choices.length, function(){
			pickName();
		});
	} else {
		if (removeWinners) {
			
            choices.forEach(choice => {
                var winner = choice.folioBoleto;

                for (var entry of imported) {
                    if (entry.folioBoleto == winner) {
                        entry.points--;
                    }
                }
            });
        }
        
        if (numberOfWinnersPerRound == 1) {
        	var premios = localStorage.premios; 
	      	var premios = premios.split(",");
	      	var vueltas = localStorage.vueltas*1;
        	choices = $(choices[0].dom);
            var top = choices.css('top');
            var left = choices.css('left');
            var fontsize = choices.css('font-size');
            var width = choices.width();

            var participanteGanador = choices.attr("participante");
	        var idParticipante = choices.attr("idParticipante");
	        
	        var premio = premios[vueltas-1];
	        var idBoleto = choices.attr("idBoleto");
	        var folioBoleto = choices.attr("folioBoleto");

	        switch(vueltas) {
	        	case 1:
	        		var premioWinner = "mochila.png";
	        		var numeroPremio = 3;
	        		break;
	        	case 2:
	        		var premioWinner = "mochila.png";
	        		var numeroPremio = 3;
	        		break;
	        	case 3:
	        		var premioWinner = "esmeriladora.png";
	        		var numeroPremio = 3;
	        		break;
	        	case 4:
	        		var premioWinner = "mochila.png";
	        		var numeroPremio = 2;
	        		break;
	        	case 5:
	        		var premioWinner = "mochila.png";
	        		var numeroPremio = 2;
	        		break;
	        	case 6:
	        		var premioWinner = "pistola-acuspray.png";
	        		var numeroPremio = 2;
	        		break;
	        	case 7:
	        		var premioWinner = "mochila.png";
	        		var numeroPremio = 1;
	        		break;
	        	case 8:
	        		var premioWinner = "mochila.png";
	        		var numeroPremio = 1;
	        		break;
	        	case 9:
	        		var premioWinner = "pistola-sagola.png";
	        		var numeroPremio = 1;
	        		break;
	        }
           
            choices.click(function(){
            	$("#iniciarRifa").removeClass('not-active');
	          
	          	  $.post('ajax/ruleta.ajax.php', {
	             		"idParticipanteDescartado":idParticipante,
						"idBoletoDescartado":idBoleto,
						"folioBoletoDescartado":folioBoleto,
						"numPremioDescartado":numeroPremio,
						"premioDescartado":premio
			             
			            },function(data) {

			            	 let timerInterval;
				             Swal.fire({
							  title: '<h3 style="color:#001781;">!FELICIDADES!</h3><br><h2 style="color:#BA007C;">'+participanteGanador+'</h2><br>Ganaste<br><img src="vistas/modulos/images/'+premioWinner+'" width="40%"></img>',
							  width: 900,
							  padding: '3em',
							  background: '#fff',
							  backdrop: `
							    rgba(0,0,123,0.4)
							    url("http://pa1.narvii.com/6542/c24963bf35f44ac2958de0a5865de931afe77e97_00.gif")
							    
							  `,
							   timer: 10000,
							  timerProgressBar: true,
							  didOpen: () => {
							    Swal.showLoading()
							    timerInterval = setInterval(() => {
							      const content = Swal.getContent()
							      if (content) {
							        const b = content.querySelector('b')
							        if (b) {
							          b.textContent = Swal.getTimerLeft()
							        }
							      }
							    }, 10000)
							  },
							  willClose: () => {
							    clearInterval(timerInterval)
							     inProgress = false;
			                choices.animate({'font-size':fontsize,'top':top,'left':left},'slow');
			                $('.ticket').show(500).unbind('click');
			                setTimeout(function(){
			                    makeTicketsWithPoints();
			                }, 700);
							  }
							})
			             
			          });

			    
	            /*
	            
	             
            	*/
                
            });
            choices.addClass('ticketWinner');
            choices.animate({'width':'400'+'px','height':'200'+'px','font-size':110 +'px','top':(window.innerHeight/5) + 'px','left':(window.innerWidth/2 - width) + 'px'},1500, function(){
                choices.animate({'left':40 + '%'}, 'slow');
            });
            
        } else {
            choices.forEach(c => {
                $(c.dom).animate({
                    'font-size':1.25*size,
                });
                $(c.dom).css('background', '#EE8800');
            });
            $('#iniciarRifa').click(() => {
                makeTicketsWithPoints();
            });
        }
	}
}