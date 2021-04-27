
var inProgress = false;
var size = 60;
function map(a, f){
	for(var i=0; i<a.length; i++){
		f(a[i], i);
	}
}

var numberOfWinnersPerRound = 1;

function process(){
	var folios = JSON.parse(localStorage.participantes);
	console.log(folios);
	imported = [];
    folios.forEach(function (boleto) {
 
	    imported.push({'name':boleto.folioBoleto,'participante':boleto.participante,'idBoleto':boleto.idBoleto,'idParticipante':boleto.idParticipante});
	     
	});
    
    var numFromInput = parseInt($('#number-of-winners-input').val(), 10);
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

function Ticket(name, points){
	this.name = name;
	if(typeof(points) == "number")
		this.points = points;
	else
		this.points = 1;
	this.dom = $("<div class='ticket'>").text("#"+name);
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
		if(seen[d.name.toLowerCase()]){
			return false;
		}
		seen[d.name.toLowerCase()] = true;
		return true;
	});
}

function standardizedImported() {
	var namePoints = {};
	console.log(imported);
	for (var entry of imported) {
		var points = (entry.points === undefined ? 1 : entry.points);
		if (entry.name in namePoints) {
			namePoints[entry.name] += points;
		} else {
			namePoints[entry.name] = points;
		}
	}
	imported = [];
	for (var name in namePoints) {
		imported.push({name: name, points: namePoints[name]});
	}
	return imported;
}

var makeTicketsWithPoints = function(){
	standardizedImported();

	tickets = [];
	$('.ticket').remove();

	map(removeDuplicateNames(imported), function(tdata){
		console.log(tdata);
		if (tdata.points === undefined) {
			tdata.points = 1;
		}
		if (tdata.points > 0) {
			var t = new Ticket(tdata.name, tdata.points);
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
			var width = $('#participant-number').text(tickets.length + '/' + tickets.length).width();
			$('#participant-number').css('width', width + 'px'); //keep position consistent during countdown
			pickName();
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
                var winner = choice.name;
                for (var entry of imported) {
                    if (entry.name == winner) {
                        entry.points--;
                    }
                }
            });
        }
        
        if (numberOfWinnersPerRound == 1) {
            choices = $(choices[0].dom);
            var top = choices.css('top');
            var left = choices.css('left');
            var fontsize = choices.css('font-size');
            var width = choices.width();
            choices.click(function(){
                inProgress = false;
                choices.animate({'font-size':fontsize,'top':top,'left':left},'slow');
                $('.ticket').show(500).unbind('click');
                setTimeout(function(){
                    makeTicketsWithPoints();
                }, 700);
            });
            choices.animate({'font-size':60 +'px','top':(window.innerHeight/5) + 'px','left':(window.innerWidth/2 - width) + 'px'},1500, function(){
                choices.animate({'left':(window.innerWidth/2 - choices.width()/2) + 'px'}, 'slow');
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