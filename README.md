# Introduzione
MyHotels è un progetto IN FASE DI SVILUPPO basato su Laravel che offre un sistema di gestione alberghiera completo per gli amministratori. Consente agli amministratori di gestire gli hotel, le camere e i ruoli degli utenti nel sistema.

# Tecnologie utilizzate
Laravel: Framework PHP che offre una struttura robusta per lo sviluppo di applicazioni web moderne.
MySQL: Database relazionale utilizzato per archiviare dati come hotel, camere e informazioni sugli utenti.
Bootstrap: Framework CSS utilizzato per lo sviluppo del frontend, fornendo un'interfaccia utente pulita e reattiva.
Amministrazione degli utenti
Gli amministratori possono gestire gli utenti nel sistema, inclusi i ruoli e i permessi. Questo è reso possibile grazie al pacchetto Laravel Spatie Permission, che semplifica l'assegnazione di ruoli e permessi agli utenti. Gli amministratori possono creare nuovi ruoli, assegnare permessi ai ruoli e quindi assegnare ruoli agli utenti.

# Gestione degli hotel
Creazione e visualizzazione degli hotel
Gli amministratori possono eseguire le seguenti operazioni CRUD (Create, Read, Update, Delete) sugli hotel:
Per entrare nel sistema degli amministratori entrare in ADMIN Area

Creazione: Creare un nuovo hotel specificando il nome, l'indirizzo e altre informazioni pertinenti.
Visualizzazione: Visualizzare un elenco di tutti gli hotel presenti nel sistema, insieme ai dettagli di ciascun hotel.
Modifica: Modificare le informazioni di un hotel esistente, ad esempio il nome o l'indirizzo.
Eliminazione: Eliminare un hotel esistente dal sistema.
Gestione delle camere
Creazione e visualizzazione delle camere
Gli amministratori possono eseguire le seguenti operazioni CRUD sulle camere:

Creazione: Creare una nuova camera specificando il numero di camera, il tipo di camera, il prezzo e altre informazioni pertinenti.
Visualizzazione: Visualizzare un elenco di tutte le camere presenti in ciascun hotel, insieme ai dettagli di ciascuna camera.
Modifica: Modificare le informazioni di una camera esistente, ad esempio il prezzo o lo stato di disponibilità.
Eliminazione: Eliminare una camera esistente dal sistema.
Conclusioni
MyHotels offre agli amministratori un'interfaccia intuitiva e potente per gestire gli hotel e le camere all'interno del sistema. Utilizzando le tecnologie moderne offerte da Laravel, il progetto fornisce una solida base per la gestione efficiente di una struttura alberghiera.

# Configurazione
Assicurati di avere PHP, Composer e Node.js installati sul tuo computer.
Installa le dipendenze del progetto con composer install e npm install.
Crea un file .env dalla copia di .env.example e configura le variabili d'ambiente.
Genera una nuova chiave di applicazione con php artisan key:generate.
Esegui le migrazioni del database con php artisan migrate.
Popola il database con dati fittizi eseguendo i tuoi seeder con php artisan db:seed.
php artisan db:seed --class=UserTableSeeder
php artisan db:seed --class=HotelSeeder
php artisan db:seed --class=RoomSeeder
php artisan db:seed --class=BookingSeeder

Avvia il server Laravel con php artisan serve.
