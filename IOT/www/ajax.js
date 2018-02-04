//$(function(){listar();});
function listar(){
_ajax("fisicalab/datos_servidor.php", "")
.done(function(info){
    var datos = JSON.parse(info); 
    var html = "";
    console.log(datos);
    for(var i in datos.data){
       html+=`<tr>
       <td>${datos.data[i].Sensor}</td>
       <td>${datos.data[i].Dato}</td>
       <td>${datos.data[i].Magnitud}</td>
       <td>${datos.data[i].Fecha}</td>
       </tr>`}
    $("#datos_json").html(html);
    setTimeout('listar()',1000);
});}

function _ajax(url, data){
var ajax = $.ajax({
        async: true,
        type: "POST",
        url: url,
        data: data,
    });
    
    return ajax;}


$(document).ready(function()
{
	listar();
});	 
