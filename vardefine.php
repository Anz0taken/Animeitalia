<?php
    /* Definizioni colori primario/secondario */
    $MainColor_R        = 255;
    $MainColor_G        =  94;
    $MainColor_B        =   0;
    $SecondaryColor_R   = 181;
    $SecondaryColor_G   =   0;
    $SecondaryColor_B   =   0;

    /* Dati bot */
    define('TOKENBOTSERVER','NzcyNTE5MTI0ODI4MDI4OTk5.X572gA.Y-QiC18RVi2IQA0ekYn251b1XrA');

    /* Variabili database */
    define('NOMESERVER', 'localhost');
    define('DATABASEUSERNAME', 'root');
    define('PASSWORD','');
    define('NOMEDB', 'animeitalianetwork');

    /* Permessi */
    define('PERMESSOADDADMIN', 1);
    define('PERMESSONEWS', 2);
    define('PERMESSOREDATTORE', 4);
    define('PERMESSOSTATISTICHE', 8);
    define('PERMESSOWEBHOOK', 16);
    define('PERMESSOPERMESSI', 32);

    /* Variabili notifiche */
    define('SUCCESS',2048);
    define('WARNING',1024);
    define('ERROR',512);

    define('ALREADYLOGGED',1);
    define('CAPCHAPROB',2);
    define('CAPCHAREFUSE',4);
    define('CREDENTIALSPROB',8);
    define('TOOMANYATTEMPTS',16);
    define('LOGINREFUSE',32);
    define('LOGINSUCCESS',64);
    define('LOGOUTSUCCESS',128);
    define('LOGINGOOGLEREFUSE',256);

    /* Definizione costanti estrapolazione emssaggi standard */
    define('CHANNELS','#');
    define('USERS','@');

    /* Definizione tipologia di commenti */
    define('COMMENTTYPE', 1);
    define('LIKETYPE',    2);

    /* Definizione tipologia tabelle mysql */

    /* CONSTANT  */
    define('UTENTE'   ,     1);
    define('IPACCESSI',     2);
    define('TOKENUTENTI',   3);
    define('ANNUNCI',       4);
    define('GIORNI',        5);
    define('ATTIVITA',      6);
    define('CHAT',          7);
    define('MESSAGGIO',     8);
    define('CANALIDISCORD', 9);
    define('UTENTEDISCORD', 10);
    define('POSTUTENTE',    11);
    define('COMMENTIUTENTE',12);
    define('MIPIACE',       13);
    define('ADMINLOGS',     14);

    /* ARARAY ASSOCIATIVO *I Nomi sono quelli effettivi dei nomi tabella di mysql */
    $NameToNumberSQLTables = array( "Utente"            =>UTENTE,
                                    "IpAccessi"         =>IPACCESSI,
                                    "TokenUtenti"       =>TOKENUTENTI,
                                    "Annunci"           =>ANNUNCI,
                                    "Giorni"            =>GIORNI,
                                    "Attivita"          =>ATTIVITA,
                                    "Chat"              =>CHAT,
                                    "Messaggio"         =>MESSAGGIO,
                                    "CanaliDiscord"     =>CANALIDISCORD,
                                    "UtenteDiscord"     =>UTENTEDISCORD,
                                    "PostUtente"        =>POSTUTENTE,
                                    "CommentiUtente"    =>COMMENTIUTENTE,
                                    "MiPiace"           =>MIPIACE,
                                    "AdminLogs"         =>ADMINLOGS
                                  );

    $NumberToNameSQLTables[0] = "Utente";
    $NumberToNameSQLTables[1] = "IpAccessi";
    $NumberToNameSQLTables[2] = "TokenUtenti";
    $NumberToNameSQLTables[3] = "Annunci";
    $NumberToNameSQLTables[4] = "Giorni";
    $NumberToNameSQLTables[5] = "Attivita";
    $NumberToNameSQLTables[6] = "Chat";
    $NumberToNameSQLTables[7] = "Messaggio";
    $NumberToNameSQLTables[8] = "CanaliDiscord";
    $NumberToNameSQLTables[9] = "UtenteDiscord";
    $NumberToNameSQLTables[10] = "PostUtente";
    $NumberToNameSQLTables[11] = "CommentiUtente";
    $NumberToNameSQLTables[12] = "MiPiace";
    $NumberToNameSQLTables[13] = "AdminLogs";

    /* Definizione tipologia comandi mysql */
    define('INSERT',        1);
    define('DELETE',        2);
    define('UPDATE',        3);

    /* Array ordinato comandi */
    $NumberToSQLCommand[0] = "INSERT";
    $NumberToSQLCommand[1] = "DELETE";
    $NumberToSQLCommand[2] = "UPDATE";

    $ChannelType = array("Canale testuale", "Messaggio diretto", "Canale vocale","Messaggio diretto multicast", "Canale organizzato", "Canale news","Canale store");
		
    $Notify_Type[0] = "success";
    $Notify_Type[1] = "warning";
    $Notify_Type[2] = "danger";

    $Notify_Message[0] = "Sembra tu sia già <strong>loggato</strong>.";
    $Notify_Message[1] = "Sono stati trovati problemi con il <strong>capcha</strong>.";
    $Notify_Message[2] = "Il <strong>capcha</strong> potrebbe non essere stato inserito correttamente.";
    $Notify_Message[3] = "Le <strong>credenziali</strong> non sono state inserite correttamente.";
    $Notify_Message[4] = "Sembra tu abbia effettuato <strong>troppi tentativi</strong>, riprovare tra poco.";
    $Notify_Message[5] = "Nome utente o/e password <strong>errato/i</strong>.";
    $Notify_Message[6] = "Login effettuato con <strong>successo</strong>.";
    $Notify_Message[7] = "Logout effettuato con <strong>successo</strong>.";
    $Notify_Message[8] = "Login con Google <strong>rifiutato.</strong>";
	
    /* Oggetti Utilizzati */
    class DatoInputHTML
    {
      public $Testo;
      public $IdParametro;
    }

    class DatoInsertSQL
    {
      public $NomeParametro;  //Nome della colonna del record del dato da savare
      public $Valore;         //Valore effettivo
      public $Numero;         //true/false, indica se il valore salvato è un numero
    }
?>