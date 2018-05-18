# LUCA
- sviluppare parte operativa tutor scolastico
- aggiungere tabella questionario tutor con: pk, fktir, fkaz, valutaz (1-5), commento e da aggiungere 
	a schermata tutor scolastico
- scroll in alto quando triggera il tab 

# LUDOVICO
AUTENTICAZIONE
aggiungere utente guest sola lettura aziende (Comando iniziale prof)
- OVVERO--> modificare completamente il sistema di autenticazione
- X) INIZIO: schermata login e password con vicino un bottone OSPITE e didascalia di ciò che può fare
- 1) a seconda delle credenziali inserite se giuste si viene reindirizzati alla HOME con i propri permessi
- 2) aggiunta alle variaibli di sessione dei "permessi" su ciò che si può fare
- 3) le pagine saranno singole ma i pezzi di pagina saranno visibili solo se se ne hanno i diritti tramite controlli in PHP

- Gestione INDIRIZZI TIROCINI e LEGALI, due separati e piu controlli all' inseirmento del geocode
- Ottimizzazione stessi js e css tra ins view e home
- Gestione Sessioni (destroy all'uscita e permettere accesso solo se autenticato)

# FATTO
- modifica visualizzazione da "Diario giornaliero" a "Registro"
- mettere link da ins azienda a tutor aziendale
- cambio key API google maps
- cambio tipo LAT e LONG nel DB, a Decimal con 10 cifre max in tutto di cui 7 dopo la virgola
- Geocoding coordinate
- ore tirocinio non calcolate ma inserite manualmente dal tutor scolastico
- Descrizione attività ABCD

# deprecate
- lat e long non obbl nel db 


# Non da fare noi
- (inserire download modulistica)