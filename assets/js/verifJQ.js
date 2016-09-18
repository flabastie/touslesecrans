





$(function() {
    $("#valider").click(function(){

        valid = true;
        if($("#nom").val() == ""){
            $("#nom").css("border-color", "FF0000");
            valid = false;
        }


        return false;
    }):

});