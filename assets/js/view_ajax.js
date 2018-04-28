  $(document).ready(function(){
    var done = false;

    $(".modDia").click(function(evt) { 
            var questo = $(this);
            var data = { 
                'idDiario' : questo.attr("id")
                };
            var type = "post";
            var url = "../server/view_getDiario.php";

            $.ajax({
                type        : type, // Definisce il metodo HTTP di invio dati utilizzato (post o get)
                url         : url, // l'indirizzo della pagina cui inviare i dati
                data        : data, // oggetto contenente tutti i dati, oppure stringa
                dataType    : 'json', // Tipo di dati che ci si aspetta di ottenere come risposta dal Server
                encode      : true
            })
            .done(function(risp) {
                if(risp['query']){
                    console.log(risp["query"]);
                    $("#span-data-diario").html(risp["query"][0]);
                    $("#span-tipo-att-diario").html(risp["query"][1]);
                    $("#div-descr-diario").html(risp["query"][2]);
                    $("#ore-diario").html(risp["query"][3]);
                    done = true;
                    $('#modalDiario').modal('open');
                } else {
                    alert("noGood");
                    console.log(risp['fail']);
                    console.log(risp['valore']);
                }
            }) /* chiusura .done */
            .fail(function(risp) {
                alert("ERRORE lato SERVER");
            }); /* chiusura .fail */
        });/* chiusura click*/

  }); /* chiusura .doc-ready */
