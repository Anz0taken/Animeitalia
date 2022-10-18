<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN)    //Se il mio utente è loggato
    {
        if(isset($_POST["DataInizio"]) && isset($_POST["DataFine"]) && isset($_POST["OrarioInizio"]) && isset($_POST["OrarioFine"]) && isset($_POST["Descrizione"]) && isset($_POST["Titolo"]) )
        {
            $DataInizio     = filter_input(INPUT_POST, "DataInizio", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $DataFine       = filter_input(INPUT_POST, "DataFine", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $OrarioInizio   = filter_input(INPUT_POST, "OrarioInizio", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $OrarioFine     = filter_input(INPUT_POST, "OrarioFine", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $Descrizione    = filter_input(INPUT_POST, "Descrizione", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $Titolo         = filter_input(INPUT_POST, "Titolo", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            $Array = array_fill(0,7,0);

            $Array[0] = new DatoInsertSQL();
            $Array[0]->NomeParametro = "IdUtente";
            $Array[0]->Valore = $_SESSION[$UserToken."IdUtente"];
            $Array[0]->Numero = '';

            $Array[1] = new DatoInsertSQL();
            $Array[1]->NomeParametro = "Titolo";
            $Array[1]->Valore = $Titolo;
            $Array[1]->Numero = '\'';

            $Array[2] = new DatoInsertSQL();
            $Array[2]->NomeParametro = "Descrizione";
            $Array[2]->Valore = $Descrizione;
            $Array[2]->Numero = '\'';

            $Array[3] = new DatoInsertSQL();
            $Array[3]->NomeParametro = "DataAttivitaInizio";
            $Array[3]->Valore = $DataInizio;
            $Array[3]->Numero = '\'';

            $Array[6] = new DatoInsertSQL();
            $Array[6]->NomeParametro = "DataAttivitaFine";
            $Array[6]->Valore = $DataFine;
            $Array[6]->Numero = '\'';

            $Array[4] = new DatoInsertSQL();
            $Array[4]->NomeParametro = "OrarioInizio";
            $Array[4]->Valore = $OrarioInizio;
            $Array[4]->Numero = '\'';

            $Array[5] = new DatoInsertSQL();
            $Array[5]->NomeParametro = "OrarioFine";
            $Array[5]->Valore = $OrarioFine;
            $Array[5]->Numero = '\'';

            if(AggiungiInTabella("Attivita",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables) )
            {
                echo "Inserimento avvenuto con successo!.";
            }
            else
                echo "Problema rilevato nell'inserimento dell'evento.";
        }
        else
            echo "Errore ottenimento dati input.";
    }
    else
        echo "Sembra tu non abbia i permessi per accedere a questa sezione.";
?>