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
	$data = $('#dateAl').pickadate();
	picker = $data.pickadate('picker');
	picker.set('select', [1999, 00, 01]);
	$('#dateAl').val("");

	$data = $('#datetut').pickadate()
	picker = $data.pickadate('picker');
	picker.set('select', [1980, 01, 01]);
	$('#datetut').val("");

	$('select').material_select();

	$('.modal').modal();

	$('.tooltipped').tooltip({delay: 50, html: true});

	$("#sliderTrigger").sideNav();

	$("#changeP").click(function(){
		$("#nome_ut").val($(".email").html());
	});
    
    $(".tab").click(function(){
       $("html,body").animate({scrollTop: 0}, 1000, function(){}); 
    });
});

