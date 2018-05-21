$(document).ready(function() {
    var altezza;
    
    $('#login').submit(function(event) {
        event.preventDefault();
        $(".progress_cont").toggleClass("dn");
        var form = $(this), //prende gli attributi del form
            url = form.attr("action"), 
            type = form.attr("method"),
            data = {}; //data del form è un oggetto con più valori
       
        var formData = { //valori del form inseriti
            'email'             : $('#email').val(),
            'psw'               : $('#psw').val()
        };
        
        $.ajax({
			type 		: type, // define the type of HTTP verb we want to use (POST for our form)
			url 		: url, // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
            .done(function(risp) {
                $(".progress_cont").toggleClass("dn");
                if (risp.login) {
                    window.location.href = "public/home.php";
                } else {
                    Materialize.toast(risp.errore_login, 1000);
                }
            })
			.fail(function(risp) {
                Materialize.toast(risp.errore, 1000);
                console.log(risp);
                $(".progress_cont").toggleClass("dn");
			});
        });
        return false;
    });
