# LUCA

# LUDOVICO

# CHANGELOG
- modifica visualizzazione da "Diario giornaliero" a "Registro"
- mettere link da ins azienda a tutor aziendale
- cambio key API google maps
- cambio tipo LAT e LONG nel DB, a Decimal con 10 cifre max in tutto di cui 7 dopo la virgola
- Geocoding coordinate
- ore tirocinio non calcolate ma inserite manualmente dal tutor scolastico
- Descrizione attività ABCD
- Autenticazione TUTTO
- aggiungere tabella questionario tutor con: pk, fktir, fkaz, valutaz (1-5), commento e da aggiungere 
	a schermata tutor scolastico
- scroll in alto quando triggera il tab 
- titolo che porta alla HOME
- Gestione Sessioni (destroy all'uscita)
- gestione credenziali db migliore
- cambio psw OK
- gestioe stessi pezzi PHP magari con require
- Gestione INDIRIZZI TIROCINI e LEGALI, due separati e piu controlli all'inseirmento del geocode
- scroll in alto quando triggera il tab 
- Descrizione attività ABCD
- viusalizzazione voto medio Azienda secondo il questionario tutor, solo per DIRIGENTE e tutsc
- Ottimizzazione stessi js e css tra ins view e home

# deprecate
- lat e long non obbl nel db 

# Non da fare noi
- (inserire download modulistica)