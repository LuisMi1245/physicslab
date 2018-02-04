$(function(){
listar();
});

function listar(){
ajax("", "").done(function(info){
	console.log(info);
});}

function ajax(url, data){
	var ajax = $.ajax({
		"method": "POST",
		"url": url,
		"data": data
	})
	return ajax;
}
