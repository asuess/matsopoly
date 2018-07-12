var username = document.getElementById('username').innerHTML;

function addUserToVisibleQueue (name) {
	if(name !== "") {
		document.getElementById('warteListeObj').innerHTML += "<li id='"+name+"'>"+name+"</li>";
	}
}
function addUserToQueue(name) {
	$.ajax({
		url: '../game/addUserToFileQueue.php',
		type: "POST",
		data: {user : name},
		cache: false,
		dataType: 'text', //the type of data you're expecting
		success: function(result){
			document.getElementById('queueMessage').innerHTML = "User "+result+" in die Warteschlange hinzugefügt";
			if(result != "") {
				addUserToVisibleQueue(result);
			}
		}
	});
}

var intervalUsers = window.setInterval(function() {
	if($("#warteListeObj li").length > 1) {
		matchPossible();
	} else {
	document.getElementById('warteListeObj').innerHTML = "";
	getNewUsers();
	}
}, 3000);

function matchPossible() {
	var opponent = "";
	$("li").each(function(index) {
		if($(this).text() !== username) {
			opponent = $(this).text();
		}
	});
	console.log(opponent);
	window.location.href = "actualGame.php?op="+opponent;
}
function getNewUsers() {
	$.ajax({
		url: '../game/checkForUsers.php',
		cache: false,
		dataType: 'text', //the type of data you're expecting
		success: function(result){
			if(result != "") {
				var names = result.split(";");
				names.forEach(function(element) {
					addUserToVisibleQueue(element);
				});
			}
		}
	});
}
addUserToQueue(username);