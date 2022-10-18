<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    $Answer = "";

    if(isset($_SESSION[$UserToken."UserName"]) && isset($_POST["Contenuto"]) && isset($_POST["Titolo"]))
    {
        $IsImage = false;
        $ImageFormatURI = "";

        if(!empty($_FILES['file']))
        { 
            $fileName = basename($_FILES['file']['name']); 
            
            if($fileName)
            {
                //Ottieni path
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

                //Ottieni contenuto file
                $Uri = file_get_contents($_FILES['file']['tmp_name']);

                if(strlen($Uri) < 500000)
                { 
                    $ImageFormatURI = "data:image/$fileType;base64,".base64_encode($Uri);
                }
                else
                    $Answer = "toobig";
            }
        }

        if($Answer != "toobig")
        {
            $Array = array_fill(0,5,0);

            $Array[0] = new DatoInsertSQL();
            $Array[0]->NomeParametro = "IdUtente";
            $Array[0]->Valore = $_SESSION[$UserToken."IdUtente"];
            $Array[0]->Numero = '\'';

            $Array[1] = new DatoInsertSQL();
            $Array[1]->NomeParametro = "Descrizione";
            $Array[1]->Valore = filter_input(INPUT_POST, "Contenuto", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $Array[1]->Numero = '\'';

            $Array[2] = new DatoInsertSQL();
            $Array[2]->NomeParametro = "Immagine";
            $Array[2]->Valore = $ImageFormatURI;
            $Array[2]->Numero = '\'';

            $Array[3] = new DatoInsertSQL();
            $Array[3]->NomeParametro = "Giorno";
            $Array[3]->Valore = date('Y-m-d');
            $Array[3]->Numero = '\'';

            $Array[4] = new DatoInsertSQL();
            $Array[4]->NomeParametro = "Orario";
            $Array[4]->Valore = date('H:i:s');
            $Array[4]->Numero = '\'';

            if(AggiungiInTabella("PostUtente",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables))
            {
                $Answer = "ok";
            }            
        }
    }

    echo $Answer;
?>