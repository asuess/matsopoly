var username = document.getElementById('username').innerHTML;
window.setInterval(function() {
	if($('#'+username).length==0) {
		addUserToVisibleQueue(username);
	}
	var myArr = [];
	$("#warteListeObj").each(function() {
		myArr.push($(this).html());
	});
	var jsonString = JSON.stringify(myArr);
	$.ajax({
		url: '../game/checkForUsers.php',
		type: "POST",
		data: {data : jsonString},
		cache: false,
		dataType: 'text', //the type of data you're expecting
		success: function(result){
			if(result != "") {
				var nameArray = result.split(";");
				nameArray.forEach(function(element) {
					addUserToVisibleQueue(element);
				});
			}
		}
	});
}, 1000);
window.addEventListener('unload', function(e) {
	$.ajax({
    url: '../game/deleteUserFromQueue.php',
    dataType: 'text', //the type of data you're expecting
    success: function(result){
	}
	
	});
	return null;
});

	
function addUserToVisibleQueue(name) {
	 document.getElementById('warteListeObj').innerHTML += "<li id='"+name+"'>"+name+"</li>";
}