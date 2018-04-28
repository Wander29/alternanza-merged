  $(document).ready(function(){
    $('.collapsible').collapsible();
    $('.modal').modal();

	$("#sliderTrigger").click(function(){
		$("#triggerat").trigger("click");
	});
    
  });