$(document).ready(function(){
	
	$('.datepicker').pickadate({
		default: "01-01-1999",
		selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year,
	    today: 'Today',
	    clear: 'Clear',
	    close: 'Ok',
	    closeOnSelect: false, // Close upon selecting a date,
	    container: undefined, // ex. 'body' will append picker to body
	});
	var data, picker;
	$data = $('#dateAl').pickadate()
	picker = $data.pickadate('picker')
	picker.set('select', [1999, 01, 01]);

	$('select').material_select();

	$('.modal').modal();

	$(".button-collapse").sideNav();

	$("#sliderTrigger").click(function(){
		$("#triggerat").trigger("click");
	});
});

