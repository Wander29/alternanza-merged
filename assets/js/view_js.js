  $(document).ready(function(){
    $('.collapsible').collapsible();
    $('.modal').modal();
    $("#sliderTrigger").sideNav();
      
    $("#changeP").click(function(){
		$("#nome_ut").val($(".email").html());
	});
  });