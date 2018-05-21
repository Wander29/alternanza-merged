$(document).ready(function() {
    var appoidtir = "";
    var html_appo = "";
    var nomeAzienda = "";
    var lat = long = 0;
    var indirizzo = "";
    var sedetir = "";
    var sedeleg = "";
    var tipo_att = "";
    var formData = {};
    var form;
    var tipo

    $(".modal-trigger").click(function(){
        appoidtir = $(this).data("id");
    });

    //FocusOut per la Geocodifica, purtroppo le richieste sono lente e l'Ajax è più veloce
    $("#sedeleg").focusout(function(){
        geocodeLeg();
    })
    $("#capLeg").focusout(function(){
        geocodeLeg();
    })


    $("#sedetir").focusout(function(){
        geocodeTir();
    })
    $("#capTir").focusout(function(){
        geocodeTir();
    })

    function geocodeLeg(){
        sedeleg = $('#sedeleg').val();
        indirizzo = sedeleg + " Italy " +  $('#capLeg').val();

        //Geocoding coordinate
        $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyB-gSOx6HEUZS6AZheeSZ1JPwNVOLQXsWI&',{
            sensor: false,
            address: indirizzo
        }, function(data, textStatus) {
                $("#latLeg").val(data.results[0].geometry.location.lat);
                $("#longLeg").val(data.results[0].geometry.location.lng);
            }
        );
    }

    function geocodeTir(){
        sedetir = $('#sedetir').val();
        indirizzo = sedetir + " Italy " +  $('#capTir').val();

        //Geocoding coordinate
        $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyB-gSOx6HEUZS6AZheeSZ1JPwNVOLQXsWI&',{
            sensor: false,
            address: indirizzo
        }, function(data, textStatus) {
                $("#latTir").val(data.results[0].geometry.location.lat);
                $("#longTir").val(data.results[0].geometry.location.lng);
            }
        );
    }

    $('.inserimento').submit(function(event) {
        event.preventDefault();
        var form = $(this), //prende gli attributi del form
            url = form.attr("action"), 
            type = form.attr("method"),
            data = {}; //data del form è un oggetto con più valori
        
        var tipo = $(this).attr("id");

        if(tipo == "alunno"){
            formData = { //valori del form inseriti
                'nome'              : $('#nome').val(),
                'cognome'           : $('#cognome').val(),
                'codfisc'           : $('#codfisc').val(),
                'datanasc'          : formatDate($('#dateAl').val()),
                'emailains'         : $("#emailains").val(),
                'psw'               : $("#pswa").val(),
                'fkclass'           : $('#classeAl').val()
            };
        }
        if(tipo == "tutsco"){
            formData = { //valori del form inseriti
                'nome'              : $('#nomet').val(),
                'cognome'           : $('#cognomet').val(),
                'codfisc'           : $('#codfisct').val(),
                'emailpins'         : $("#emailpins").val(),
                'psw'               : $("#pswp").val()
            };
        }
        if(tipo == "classe"){
            formData = { //valori del form inseriti
                'classe'            : $('#nomec').val(),
                'annoSc'            : $('#annoSc').val(),
                'tutor'             : $('#fkt').val(),
                'spec'              : $('#fks').val()
            };
        }
        if(tipo == "azienda"){
            nomeAzienda = $('#nomea').val();
            if ($('#sedetir').val() == ""){
                lat = $('#latLeg').val();
                long = $('#longLeg').val();
            } else {
                lat = $('#latTir').val();
                long = $('#longTir').val();
            }

            formData = { //valori del form inseriti
                'nomea'             : nomeAzienda,
                'piva'              : $('#piva').val(),
                'nomer'             : $('#nomer').val(),
                'sedeleg'           : sedeleg,
                'sedetir'           : sedetir,
                'lat'               : lat,
                'long'              : long,
                'tel'               : $('#tel').val(),
                'email'             : $('#email').val()
            };            
        }
        if(tipo == "tirocinio"){
            var descr = $("#descr").val();
            var vt = $("#valTest").val();
            /*if($.trim(descr).length>0) { } else { descr = null }
            if($.trim(vt).length>0) { } else { vt = null }*/

            formData = { //valori del form inseriti
                'inizio'            : formatDate($('#inizio').val()),
                'fine'              : formatDate($('#fine').val()),
                'descr'             : descr,
                'oreTot'            : $('#oreTot').val(),
                'fkalu'             : $('#fkalu').val(),
                'fkaz'              : $('#fkaz').val(),
                'value'             : $("#valut").val(),
                'valTest'           : vt
            };
        }
        if(tipo == "tutoraziendale"){
            formData = { //valori del form inseriti
                'nome'              : $('#nometa').val(),
                'cognome'           : $('#cognometa').val(),
                'data'              : formatDate($('#datetut').val()),
                'codfisc'           : $('#codfiscta').val(),
                'tel'               : $('#telta').val(),
                'mail'              : $('#emailta').val(), 
                'psw'               : $('#pswta').val(),              
                'fka'               : $('#fkazt').val()
            };
        }
        if(tipo == "diario"){
            tipo_att = ftipo($('#typeat').val());
            $('#typeat').val("");

            formData = { //valori del form inseriti
                'descr'             : $('#descrdia').val(),
                'ore'               : $('#oredia').val(),
                'data'              : formatDate($('#datedia').val()),
                'tipo'              : tipo_att,
                'idtir'             : appoidtir
            };
        }
        if(tipo == "autenticazione_alunno"){
            formData = { //valori del form inseriti
                'mail'              : $('#maila').val(),
                'psw'               : $('#pswa').val(),
            };
        }
        if(tipo == "autenticazione_professore"){
            formData = { //valori del form inseriti
                'mail'              : $('#mailp').val(),
                'psw'               : $('#pswp').val(),
            };
        }
        if(tipo == "specializzazione"){
            formData = { //valori del form inseriti
                'spec'              : $('#spec').val()
            };
        }
        if(tipo == "questionario_tutor"){
            formData = { //valori del form inseriti
                'idtut'                 : $('#idtutquesttut').val(),
                'tirocinio'             : $('#fktirquesttut').val(),
                'commit'                : $('#commitquesttut').val(),
                'val'                   : $('#valutquesttut').val()
            };
        }

        $.ajax({
			type 		: type, // define the type of HTTP verb we want to use (POST for our form)
			url 		: url, // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
            .done(function(risp) {
                console.log(risp);
                if(risp.error == undefined){
                    if(risp.sucquery){
                        if (risp.idAz !== undefined){
                            $("#fkazt option:selected").removeAttr("selected");
                            $("#fkaz option:selected").removeAttr("selected");
                            html_appo = "<option value=" + risp.idAz + " selected>" + nomeAzienda + "</option>";
                            $("#fkazt").append(html_appo);
                            $("#fkaz").append(html_appo);
                            $("#fkazt").material_select();
                            $("#fkaz").material_select();
                            $("#tutorAzTab").trigger("click");
                        }
                        Materialize.toast(risp.query, 1000);
                        if (risp.reload) {
                            setTimeout(function(){
                                location.reload();
                            }, 1100);
                        } else {
                            svuota(form);
                        }   
                    }else{
                        Materialize.toast(risp.errore, 1000);
                    }
                }
            })
			.fail(function(risp) {
			});
        });
    
        return false;
    });

     $("#classe_tir").change(function() { 
        var questo = $(this);  
        var data = { 
            'classe' : questo.val() 
            };
        var type = "post";
        var url = "../server/ins_getAlunni.php";

        $.ajax({
            type        : type, // Definisce il metodo HTTP di invio dati utilizzato (post o get)
            url         : url, // l'indirizzo della pagina cui inviare i dati
            data        : data, // oggetto contenente tutti i dati, oppure stringa
            dataType    : 'json', // Tipo di dati che ci si aspetta di ottenere come risposta dal Server
            encode      : true
        })
        .done(function(risp) {
            if(risp['query']){

                $.each(risp['query'], function (i, item) {
                    $('#fkalu').append($('<option>', { 
                        value: item[2],
                        text : item[0] + " " + item[1] 
                    }));
                });

                html_appo = "<option disabled selected value=''>Scegli l'Alunno</option>";
                risp['query'].forEach(function(item, index) {
                    html_appo += "<option value='" + item[2] +"'>" + item[0] + " "
                    + item[1] + "</option>";
                });
                $("#fkalu").html(html_appo);
                $('select').material_select();
            }else{
            }
        })
        .fail(function(risp) {
        });
    return false;
    });

    $("#idtutquesttut").change(function() { 
        var questo = $(this);  
        var data = { 
            'tutor' : questo.val() 
            };
        var type = "post";
        var url = "../server/ins_getAlquest.php";

        $.ajax({
            type        : type, // Definisce il metodo HTTP di invio dati utilizzato (post o get)
            url         : url, // l'indirizzo della pagina cui inviare i dati
            data        : data, // oggetto contenente tutti i dati, oppure stringa
            dataType    : 'json', // Tipo di dati che ci si aspetta di ottenere come risposta dal Server
            encode      : true
        })
        .done(function(risp) {
            if(risp['query']){

                html_appo = "<option disabled selected value=''>Scegli l'Alunno</option>";
                risp['query'].forEach(function(item, index) {
                    html_appo += "<option value='" + item[0] +"'>" + item[1] + "</option>";
                    //$('<option>').val(item[2]).text('999').appendTo('#fkalu');
                });
                $("#az").html(html_appo);
                $('select').material_select();
                
            }else{
                //console.log(risp['fail']);
            }
        })
        .fail(function(risp) {
            console.log("ERRORE lato SERVER");
            console.log(risp);
        });
    return false;
    });

    $("#az").change(function() { 
        var questo = $(this);  
        var data = { 
            'azienda' : questo.val() 
            };
        var type = "post";
        var url = "../server/ins_getAlquest.php";

        $.ajax({
            type        : type, // Definisce il metodo HTTP di invio dati utilizzato (post o get)
            url         : url, // l'indirizzo della pagina cui inviare i dati
            data        : data, // oggetto contenente tutti i dati, oppure stringa
            dataType    : 'json', // Tipo di dati che ci si aspetta di ottenere come risposta dal Server
            encode      : true
        })
        .done(function(risp) {
            if(risp['query']){

                $.each(risp['query'], function (i, item) {
                    $('#al').append($('<option>', { 
                        value: item[0],
                        text : item[2] + " " + item[1] 
                    }));
                });

                html_appo = "<option disabled selected value=''>Scegli l'Alunno</option>";
                risp['query'].forEach(function(item, index) {
                    html_appo += "<option value='" + item[0] +"'>" + item[2] + " "
                    + item[1] + "</option>";
                    //$('<option>').val(item[2]).text('999').appendTo('#fkalu');
                });
                $("#al").html(html_appo);
                $('select').material_select();
                
            }else{
                //console.log(risp['fail']);
            }
        })
        .fail(function(risp) {
            console.log("ERRORE lato SERVER");
            console.log(risp);
        });
    return false;
    });

    $("#al").change(function() { 
        var questo = $(this);  
        var data = { 
            'alunno' : questo.val() 
            };
        var type = "post";
        var url = "../server/ins_getTir.php";

        $.ajax({
            type        : type, // Definisce il metodo HTTP di invio dati utilizzato (post o get)
            url         : url, // l'indirizzo della pagina cui inviare i dati
            data        : data, // oggetto contenente tutti i dati, oppure stringa
            dataType    : 'json', // Tipo di dati che ci si aspetta di ottenere come risposta dal Server
            encode      : true
        })
        .done(function(risp) {
            if(risp['query']){
                $.each(risp['query'], function (i, item) {
                    $('#fktirquesttut').append($('<option>', { 
                        value: item[0],
                        text : item[1] + " " + item[2] 
                    }));
                });

                html_appo = "<option disabled selected value=''>Scegli il Tirocinio</option>";
                risp['query'].forEach(function(item, index) {
                    html_appo += "<option value='" + item[0] +"'>" + item[1] + " | "
                    + item[2] + "</option>";
                    //$('<option>').val(item[2]).text('999').appendTo('#fkalu');
                });
                $("#fktirquesttut").html(html_appo);
                $('select').material_select();
                
            }else{
                //console.log(risp['fail']);
            }
        })
        .fail(function(risp) {
            console.log("ERRORE lato SERVER");
            //console.log(risp);
        });
    return false;
    });

function svuota(form) {
    Materialize.updateTextFields();
    form.trigger("reset");

    if (form.attr('id') == "questionario_tutor") {
        svuota_select('#fktirquesttut');
        svuota_select('#al');
        //svuota_select('#az');
        $("#idtutquesttut option[value='']").prop('selected', true);
        $('#idtutquesttut').material_select();
    }
}

function svuota_select(id_select){
    $(id_select + ' option').each(function() {
        if ($(this).val() !== ""){ $(this).remove(); }
    });
    $(id_select).material_select();
}

function formatDate(inco){
    if (inco == "")
        return null;
    var date = inco.split(" ");
    var final = "";
 
    final += "'";
    final += date[2] + "-";
    final += getDate(date[1]) + "-";
    final += date[0];
    final += "'";

    return final;
}

function getDate(inco){
    var data = inco.replace(',', '');
    switch (data) {
        case "January":
            data = "01";
            break;
        case "February":
            data = "02";
            break;
        case "March":
            data = "03";
            break;
        case "April":
            data = "04";
            break;
        case "May":
            data = "05";
            break;
        case "June":
            data = "06";
            break;
        case "July":
            data = "07";
            break;
        case "August":
            data = "08";
            break;
        case "September":
            data = "09";
            break;
        case "October":
            data = "10";
            break;
        case "November":
            data = "11";
            break;
        case "December":
            data = "12";
            break;
    }

    return data;
}

function ftipo(arr){
    var app = "";
    arr.sort();
    for(var i=0; i<arr.length; i++){
        app += arr[i];
    }
    return app;
}