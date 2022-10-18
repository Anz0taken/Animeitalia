<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."GiornoLastUpdate"]))
    {
        if($_SESSION[$UserToken."GiornoLastUpdate"])
        {
            $sql = "SELECT * FROM Messaggio WHERE IdChat = ". $_SESSION[$UserToken."CurrentChat"] ." AND IdUtenteMittente != ". $_SESSION[$UserToken."IdUtente"] ." AND Giorno >= '". $_SESSION[$UserToken."GiornoLastUpdate"] ."' AND Orario > '". $_SESSION[$UserToken."OrarioLastUpdate"] ."' ORDER BY IdMessaggio";
            
            $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
            $db_username = DATABASEUSERNAME;
            $db_password = PASSWORD;

            $DataBase = mysqli_connect($db,$db_username,$db_password);

            Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

            $log = array();

            $Query = Mysqli_query($DataBase,$sql);

            $count = 0;

            while($Row = Mysqli_fetch_array($Query))
            {
                $log[$count++] = $Row["Messaggio"];
                $_SESSION[$UserToken."GiornoLastUpdate"] = $Row["Giorno"];
                $_SESSION[$UserToken."OrarioLastUpdate"] = $Row["Orario"];
            }
        }
        echo json_encode($log);
    }
?>