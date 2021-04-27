
var imported = false;

//set the colors for each life, in HEX
var colors = ["#001D7E","#BA007C","#003366","#001948", "#000C24"];
function getColor(n) {
	if (n < colors.length) {
		return colors[n];
	} else {
		return colors[colors.length - 1];
	}
}

function importTabSeparated(ts) {
	imported = [];
	var rows = ts.split("\n");
	for (var row of rows) {
		var nameWithPoints = row.split("\t");
		var name = nameWithPoints[0];
		var points = nameWithPoints[1] === undefined ? 1 : parseInt(nameWithPoints[1], 10);
		imported.push({name: name, points: points});
	}
	$('.enter-names').hide(500, function(){
		makeTicketsWithPoints();
	});
}

