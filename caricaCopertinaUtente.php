<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    $ImageFormatURI = "";

    $upload = 'err';

    if(isset($_SESSION[$UserToken."UserName"]))
    { 
        if(!empty($_FILES['file']))
        {    
            //Ottieni nome file
            $fileName = basename($_FILES['file']['name']); 
            
            //Ottieni path
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

            //Ottieni contenuto file
            $Uri = file_get_contents($_FILES['file']['tmp_name']);

            if(strlen($Uri) < 500000)
            {
                $db 			= NOMESERVER;
                $db_username 	= DATABASEUSERNAME;
                $db_password 	= PASSWORD;
                $DataBase = mysqli_connect($db,$db_username,$db_password);
                Mysqli_select_db($DataBase,NOMEDB);

                $ImageType = "image";
        
                $ImageFormatURI = "data:$ImageType/$fileType;base64,".base64_encode($Uri);

                $ArrayUpdate = array_fill(0,1,0);

                $ArrayUpdate[0] = new DatoInsertSQL();
                $ArrayUpdate[0]->NomeParametro = "Copertina";
                $ArrayUpdate[0]->Valore = $ImageFormatURI;
                $ArrayUpdate[0]->Numero = '\'';

                $ArrayCondtion = array_fill(0,1,0);

                $ArrayCondtion[0] = new DatoInsertSQL();
                $ArrayCondtion[0]->NomeParametro = "IdUtente";
                $ArrayCondtion[0]->Valore = $_SESSION[$UserToken."IdUtente"];
                $ArrayCondtion[0]->Numero = '';

                if(UpdateInTabella("Utente",$ArrayUpdate, $ArrayCondtion,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables))
                    $upload = 'ok';
            }
            else
                $upload = "toobig";
        }
    }

    echo $upload;
?>