
var $ =jQuery.noConflict();
function addMedia(){
    lastId++;
    var lastElem = $('.widget-inside').children('hr').last();
    var pCopy = plantilla;
    var plantillaFormated = pCopy.split('-21').join(lastId);
    lastElem.append(plantillaFormated);
}
function deleteMedia(){
    var cont_id = $(this).attr('container-id');
    $("#"+cont_id).remove();
}
jQuery('#addElement').click(addMedia);
jQuery('.deleteMedia').click(deleteMedia);