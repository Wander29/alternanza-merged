$(document).ready(function(){
    
    $(".viewer").click(function(){
        $(".alunni").toggleClass("moveup");
        $(".viewer img").toggleClass("rotate");
    });
    
    $('.tooltipped').tooltip({delay: 50});
    
    $(".filter").click(function(){
        $(this).toggleClass("toglfilter");
        $("#imgfilt").toggleClass("toglsubfilt");
    });
    
});