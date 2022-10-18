<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]) && isset($_POST["IdPost"]))
    {
        $Answer = array("Button"=>"", "NumeroMiPiace"=>0);

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;
        
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        
        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $QueryLike = Mysqli_query($DataBase,"SELECT * FROM MiPiace WHERE IdElementoCommentato = ".filter_input(INPUT_POST, "IdPost", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH)." AND TipoElementoCommentato = ".LIKETYPE." AND IdUtente = ".$_SESSION[$UserToken."IdUtente"]."");
        $LikeUtente = Mysqli_fetch_array($QueryLike);

        /* Se l'utente ha messo mi piace al post */
        if($LikeUtente)
        {
            Mysqli_query($DataBase,"DELETE FROM MiPiace WHERE IdMiPiace = ".$LikeUtente["IdMiPiace"]."");
            $Answer["Button"] = "Mi piace";
        }
        else
        {
            $Array = array_fill(0,4,0);

            $Array[0] = new DatoInsertSQL();
            $Array[0]->NomeParametro = "IdUtente";
            $Array[0]->Valore = $_SESSION[$UserToken."IdUtente"];
            $Array[0]->Numero = '';
    
            $Array[1] = new DatoInsertSQL();
            $Array[1]->NomeParametro = "IdElementoCommentato";
            $Array[1]->Valore = filter_input(INPUT_POST, "IdPost", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $Array[1]->Numero = '';
    
            $Array[2] = new DatoInsertSQL();
            $Array[2]->NomeParametro = "TipoElementoCommentato";
            $Array[2]->Valore = LIKETYPE;
            $Array[2]->Numero = '';

            $Array[3] = new DatoInsertSQL();
            $Array[3]->NomeParametro = "TipoMiPiace";
            $Array[3]->Valore = 1;
            $Array[3]->Numero = '';
    
            $Answer["Button"] =  "Non mi piace più";

            AggiungiInTabella("MiPiace",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables);
        }

        $QueryCounter = Mysqli_query($DataBase,"SELECT COUNT(IdMiPiace) AS NumeroMiPiace FROM MiPiace WHERE IdElementoCommentato = ".filter_input(INPUT_POST, "IdPost", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH)." AND TipoElementoCommentato  = ".LIKETYPE."");

        $NumeroMiPiace = Mysqli_fetch_array($QueryCounter);

        $Answer["NumeroMiPiace"] =  $NumeroMiPiace["NumeroMiPiace"];

        echo json_encode($Answer);
    }
?>