$(document).ready(function() {
var noStreetIndices = [2,4,7,17,22,33,36,38];
for(var i = 0; i < 40; i++) {
	 if(i % 10 != 0 && !noStreetIndices.includes(i)) {

	 $('feld'+i).hover(
	 function() {
		 $('#content').append("this worked");
		 alert("worked");		 
	 }, function() {
	 }
		);
		 }
 }
});