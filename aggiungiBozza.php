<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSONEWS)    //Se il mio utente è loggato
    {
        $Answer = "";

        if(isset($_POST["Titolo"]) && isset($_POST["Tag"]))
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

                    if(strlen($Uri) < 1000000)
                    { 
                        $ImageFormatURI = "data:image/$fileType;base64,".base64_encode($Uri);
                        $Answer = "ok";
                    }
                    else
                        $Answer = "toobig";
                }
            }

            if($Answer == "ok")
            {
                $Array = array_fill(0,5,0);

                $Array[0] = new DatoInsertSQL();
                $Array[0]->NomeParametro = "IdUtente";
                $Array[0]->Valore = $_SESSION[$UserToken."IdUtente"];
                $Array[0]->Numero = '\'';

                $Array[1] = new DatoInsertSQL();
                $Array[1]->NomeParametro = "Titolo";
                $Array[1]->Valore = filter_input(INPUT_POST, "Titolo", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $Array[1]->Numero = '\'';

                $Array[2] = new DatoInsertSQL();
                $Array[2]->NomeParametro = "Copertina";
                $Array[2]->Valore = $ImageFormatURI;
                $Array[2]->Numero = '\'';

                $Array[3] = new DatoInsertSQL();
                $Array[3]->NomeParametro = "Tag";
                $Array[3]->Valore = filter_input(INPUT_POST, "Tag", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $Array[3]->Numero = '\'';

                $Array[4] = new DatoInsertSQL();
                $Array[4]->NomeParametro = "Stato";
                $Array[4]->Valore = 0;
                $Array[4]->Numero = '';

                if(AggiungiInTabella("Annunci",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables))
                {
                    $Answer = "ok";
                }
                else
                {
                    echo "Cristo";
                }
            }
      }
    }

    echo $Answer;
?>