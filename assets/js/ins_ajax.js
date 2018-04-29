$(document).ready(function() {
    var appoidtir = "";
    var html_appo = "";
    $(".modal-trigger").click(function(){
        appoidtir = $(this).data("id");
    });

    $('.inserimento').submit(function(event) {
        event.preventDefault();
        var form = $(this), //prende gli attributi del form
            url = form.attr("action"), 
            type = form.attr("method"),
            data = {}; //data del form è un oggetto con più valori
        
        var tipo = $(this).attr("id");

        if(tipo == "alunno"){
            var formData = { //valori del form inseriti
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
            var formData = { //valori del form inseriti
                'nome'              : $('#nomet').val(),
                'cognome'           : $('#cognomet').val(),
                'codfisc'           : $('#codfisct').val(),
                'emailpins'         : $("#emailpins").val(),
                'psw'               : $("#pswp").val()
            };
        }
        if(tipo == "classe"){
            var formData = { //valori del form inseriti
                'classe'            : "'" + $('#nomec').val() + "'",
                'tutor'             : $('#fkt').val(),
                'spec'              : $('#fks').val()
            };
        }
        if(tipo == "azienda"){
            var formData = { //valori del form inseriti
                'nomea'             : $('#nomea').val(),
                'piva'              : $('#piva').val(),
                'nomer'             : $('#nomer').val(),
                'sedeleg'           : $('#sedeleg').val(),
                'sedetir'           : $('#sedetir').val(),
                'lat'               : $('#lat').val(),
                'long'              : $('#long').val(),
                'tel'               : $('#tel').val(),
                'email'             : $('#email').val()
            };
        }
        if(tipo == "tirocinio"){
            var descr = $("#descr").val();
            var vt = $("#valTest").val();
            /*if($.trim(descr).length>0) { } else { descr = null }
            if($.trim(vt).length>0) { } else { vt = null }*/

            var formData = { //valori del form inseriti
                'inizio'            : formatDate($('#inizio').val()),
                'fine'              : formatDate($('#fine').val()),
                'descr'             : descr,
                'fkalu'             : $('#fkalu').val(),
                'fkaz'              : $('#fkaz').val(),
                'value'             : $("#valut").val(),
                'valTest'           : vt
            };
        }
        if(tipo == "tutoraziendale"){
            var formData = { //valori del form inseriti
                'nome'              : $('#nometa').val(),
                'cognome'              : $('#cognometa').val(),
                'data'              : formatDate($('#datetut').val()),
                'codfisc'              : $('#codfiscta').val(),
                'tel'              : $('#telta').val(),
                'mail'              : $('#emailta').val(),               
                'fka'              : $('#fkazt').val()
            };
        }
        if(tipo == "diario"){
            var formData = { //valori del form inseriti
                'descr'              : $('#descrdia').val(),
                'ore'              : $('#oredia').val(),
                'data'              : formatDate($('#datedia').val()),
                'tipo'              : ftipo($('#typeat').val()),
                'idtir'              : appoidtir
            };
        }
        if(tipo == "autenticazione_alunno"){
            var formData = { //valori del form inseriti
                'mail'              : $('#maila').val(),
                'psw'              : $('#pswa').val(),
            };
        }
        if(tipo == "autenticazione_professore"){
            var formData = { //valori del form inseriti
                'mail'              : $('#mailp').val(),
                'psw'              : $('#pswp').val(),
            };
        }
        if(tipo == "specializzazione"){
            var formData = { //valori del form inseriti
                'spec'              : $('#spec').val()
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
                if(risp.result !== undefined){
                    if (risp.user == 'alunno') {
                        window.location.href = "public/view.php";
                    } else {
                        window.location.href = "public/ins.php";
                    }
                    
                }else{
                    if(risp.error == undefined){
                        if(risp.sucquery){
                            Materialize.toast(risp.query, 1000);
                            svuota(form[0]);
                            setTimeout(function(){
                                location.reload();
                            }, 1100);
                        }else{
                            Materialize.toast(risp.errore, 1000);
                        }
                    }
                }
            })
			.fail(function(risp) {
				//console.log(risp);
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
                    //$('<option>').val(item[2]).text('999').appendTo('#fkalu');
                });
                $("#fkalu").html(html_appo);
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
    form.reset();
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