$(document).ready(function() {
    
    $('.changep').submit(function(event) {
        
        event.preventDefault();
        var form = $(this), //prende gli attributi del form
            url = form.attr("action"), 
            type = form.attr("method"),
            data = {}; //data del form è un oggetto con più valori
       
        var formData = { //valori del form inseriti
            'nomeut'              : $('#nome_ut').val(),
            'oldpsw'              : $('#oldpsw').val(),
            'newpsw'              : $('#newpsw').val()
        };
        
        
        $.ajax({
			type 		: type, // define the type of HTTP verb we want to use (POST for our form)
			url 		: url, // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
            .done(function(risp) {
            console.log(risp);
                if(risp.success == true){
                    console.log("successo");
                } else {
                    console.log("errore query");
                }
            })
			.fail(function(risp) {
                console.log(risp);
			});
        });
    
        return false;
    });
