<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    $ImageFormatURI = "";

    $answer = '<p style="color:#EA4335;">Sembra esserci stato un errore, riprovare.</p>';

    if(isset($_SESSION[$UserToken."UserName"]))
    { 
        if(isset($_POST['Contenuto']))
        {
            $Contenuto = filter_input(INPUT_POST, "Contenuto", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            $db 			= NOMESERVER;
            $db_username 	= DATABASEUSERNAME;
            $db_password 	= PASSWORD;
            $DataBase = mysqli_connect($db,$db_username,$db_password);
            Mysqli_select_db($DataBase,NOMEDB);

            $ArrayUpdate = array_fill(0,1,0);

            $ArrayUpdate[0] = new DatoInsertSQL();
            $ArrayUpdate[0]->NomeParametro = "Bio";
            $ArrayUpdate[0]->Valore = $Contenuto;
            $ArrayUpdate[0]->Numero = '\'';

            $ArrayCondtion = array_fill(0,1,0);

            $ArrayCondtion[0] = new DatoInsertSQL();
            $ArrayCondtion[0]->NomeParametro = "IdUtente";
            $ArrayCondtion[0]->Valore = $_SESSION[$UserToken."IdUtente"];
            $ArrayCondtion[0]->Numero = '';

            if(UpdateInTabella("Utente",$ArrayUpdate, $ArrayCondtion,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables))
                $answer = '<p style="color:#28A74B;">File caricato con successo!<br>Ricaricare la pagina per aggiornare le impostazioni.</p>';
        }
    }

    echo $answer;
?>