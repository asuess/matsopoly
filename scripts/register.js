function getColorCode(note) {
	var arrColor = ["#ff0000", "#5cb85c", "#f0ad4e", "#d9534f"];
	var index = Math.round(note/2);
	return (index < 1 || index > 3) ? arrColor[0] : arrColor[index];
} 