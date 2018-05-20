  $(document).ready(function(){
    $('.collapsible').collapsible();
    $('.modal').modal();
    $("#sliderTrigger").sideNav();
    $('.tooltipped').tooltip({delay: 50, html: true});
      
    $("#changeP").click(function(){
		$("#nome_ut").val($(".email").html());
	});
  });