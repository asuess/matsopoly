$(document).ready(function() {
$('#show_login').click (function() {
	showpopup();
});
$(document).mouseup(function(e) 
{
    var container = $("#loginDialog");
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});
function showpopup()
{
 $("#loginDialog").fadeIn();
 $("#loginDialog").css({"visibility":"visible","display":"block"});
}


});