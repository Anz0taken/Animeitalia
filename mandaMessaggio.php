<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    $Answer = false;

    if(isset($_SESSION[$UserToken."CurrentChat"]) && isset($_POST["MessaggioDaMandare"]))
    {
        $Messaggio = filter_input(INPUT_POST, "MessaggioDaMandare", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

        $db = NOMESERVER;
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);	

        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO Messaggio (IdChat, IdUtenteMittente, Messaggio, Orario, Giorno) VALUES (". $_SESSION[$UserToken."CurrentChat"] .", ". $_SESSION[$UserToken."IdUtente"] .", '$Messaggio', '$date', '$date') ";
        $Query = Mysqli_query($DataBase, $sql);

        if($Query)
            $Answer = true;
    }

    return $Answer;
?>