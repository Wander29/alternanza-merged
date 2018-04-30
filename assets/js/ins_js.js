$(document).ready(function(){
	
	$('.datepicker').pickadate({
		default: "01-01-1999",
		selectMonths: true, // Creates a dropdown to control month
	    selectYears: 60, // Creates a dropdown of 15 years to control year,
	    today: 'Oggi',
	    clear: 'Cancella',
	    close: 'Ok',
	    closeOnSelect: false, // Close upon selecting a date,
	    container: undefined, // ex. 'body' will append picker to body
	});
	var data, picker;
	$data = $('#dateAl').pickadate()
	picker = $data.pickadate('picker')
	picker.set('select', [1999, 01, 01]);

	$data = $('#datetut').pickadate()
	picker = $data.pickadate('picker')
	picker.set('select', [1970, 01, 01]);

	$('select').material_select();

	$('.modal').modal();

	$("#sliderTrigger").sideNav();
});

