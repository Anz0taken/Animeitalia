<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN)    //Se il mio utente è loggato
    {
          $Array = array_fill(0,1,0);

          $Array[0] = new DatoInputHTML();
          $Array[0]->Testo = "Inserisci ID numerico del canale";
          $Array[0]->Placeholder = "ID canale";
          $Array[0]->IdTag = "IdCanale";

          PrintInputForm("Gestione discord",$Array,"aggiungiCanale.php","#dialogBox");
    }
?>