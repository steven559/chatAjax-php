
$(function() {
    $('#tchatForm form').submit(function(){

        var message= $('#tchatForm form textarea').val();
        $.post({url: "tchatAjax.php",action:"addMessage",message:message},function (data) {
            if(data.erreur =="ok"){
                alert("ok");
            }
            else{
                alert(data.erreur);
            }
        },"json");
        return false;
    })
});
