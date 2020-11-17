$(document).ready(function () {
            
    $("#forgotten-passeord").click(function(){
        console.log("clicked");
        $(".overlay").show();
        $("#popup").show();
        
    });

    function closeDialog(){
        console.log("closed");
        $("#popup").hide();
        $(".overlay").hide();
    }

    $("#close").click(function(){
        console.log("closed");
        $("#popup").hide();
        $(".overlay").hide();
    });

    $("#close-x").click(function(){
        console.log("closed");
        $("#popup").hide();
        $(".overlay").hide();
    });

});