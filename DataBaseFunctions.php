<?php
    function GetUserToken()
    {
        /*
            if(!EsisteDatabase(NOMEDB))
                CreaDatabase();
        */

        $db          = NOMESERVER;
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;
        
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        
        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $ipaddress = $_SERVER['REMOTE_ADDR'];
        
        $sql = "select * from tokenutenti where iputente = '$ipaddress' ";

        $GetDataUser = Mysqli_query($DataBase,$sql);

        $TokenCode = "";
        
        if($Row_Data = Mysqli_fetch_array($GetDataUser))
        {
            $TokenCode = $Row_Data[1];
        }
        else
        {
            $TokenCode = getRandomCode();
            $sql = "insert into tokenutenti (sessioncode, iputente) values ('$tokencode', '$ipaddress')";
            Mysqli_query($DataBase,$sql);
        }

        return $TokenCode;
    }

    function getRandomCode()
    {
        $Data = "";

        $times = rand(2000, 5000);

        for($i = 0; $i < $times; $i++)
        {
            $Data .= chr(rand(8,200));
        }

        return md5($Data);
    }

    function CreaDatabase()
    {
        $Done = true;

        $conn = new mysqli(NOMESERVER, DATABASEUSERNAME, PASSWORD);

        if ($conn->connect_error == 0)
        {

            $sql = "DROP DATABASE IF EXISTS ".NOMEDB;
            $conn->query($sql);

            $sql = "CREATE DATABASE ".NOMEDB;

            if ($conn->query($sql) == true)
            {
                $sql = "USE ".NOMEDB;
                $conn->query($sql);
            
                $sql = "CREATE TABLE Utente
                (
                    IdUtente 		INT  NOT NULL AUTO_INCREMENT,
                    NomeUtente 		char(40),
                    Nome			char(40),
                    PasswordUtente 	char(64),
                    Permessi		INT,
                
                    UNIQUE (NomeUtente),
                    PRIMARY KEY (IdUtente)
                );
                ";

                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE IpAccessi
                (
                    IdIndirizzo			INT NOT NULL AUTO_INCREMENT,
                    IpUtente			char(20),
                    TentativiAccesso	INT,
                    OrarioExceed		INT,
                    
                    PRIMARY KEY (IdIndirizzo)
                );
                ";

                if( !$conn->query($sql) )
                    $Done = false;


                $sql = "CREATE TABLE TokenUtenti
                (
                    IdToken				INT NOT NULL AUTO_INCREMENT,
                    SessionCode			char(32),
                    IpUtente			char(20),
                
                    PRIMARY KEY (IdToken)
                );";

                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE Giorni
                (
                    IdGiorno	INT 		NOT NULL AUTO_INCREMENT,
                    NomeGiorno	char(9)		NOT NULL,
                    
                    PRIMARY KEY (IdGiorno)
                );";

                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE Attivita
                (
                    IdAttivita 		INT 		NOT NULL AUTO_INCREMENT,
                    IdUtente		INT 		NOT NULL,
                    IdGiorno		INT			NOT NULL,
                    Titolo			char(40) 	NOT NULL,
                    DataAttivita	date 		NOT NULL,
                    OrarioExceed	time		NOT NULL,
                    
                    FOREIGN KEY (IdUtente) REFERENCES Utente(IdUtente),
                    FOREIGN KEY (IdGiorno) REFERENCES Giorni(IdGiorno),
                    PRIMARY KEY (IdAttivita)
                );";

                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE Annunci
                (
                    IdAnnuncio 	INT 		NOT NULL AUTO_INCREMENT,
                    IdUtente	INT 		NOT NULL,
                    Titolo		char(40) 	CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                    Contenuto	char(255) 	CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                    Stato		INT,					/* 0 SE IN BOZZA, 1 MANDATO AL REDATTORE, 2 PUBBLICATO */
                    
                    UNIQUE (Titolo),
                    PRIMARY KEY (IdAnnuncio)
                );";
                

                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE Chat
                (
                    IdChat		INT 		NOT NULL AUTO_INCREMENT,
                    IdUtente_1	INT 		NOT NULL,
                    IdUtente_2	INT 		NOT NULL,
                
                    FOREIGN KEY (IdUtente_1) REFERENCES Utente(IdUtente),
                    FOREIGN KEY (IdUtente_2) REFERENCES Utente(IdUtente),
                    PRIMARY KEY (IdChat)
                );";
                    
                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE Messaggio
                (
                    IdMessaggio 	 INT NOT NULL AUTO_INCREMENT,
                    IdChat			 INT NOT NULL,
                    IdUtenteMittente INT NOT NULL,
                    Messaggio		 text,
                    Orario			 time,
                    Giorno 			 date,
                
                    FOREIGN KEY (IdChat) REFERENCES Chat(IdChat),
                    FOREIGN KEY (IdUtenteMittente) REFERENCES Utente(IdUtente),
                    PRIMARY KEY (IdMessaggio)
                );";
                    
                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE CanaliDiscord
                (
                    IdCanaleDiscord BIGINT NOT NULL,
                    NomeCanale		text,
                    LastUpdateDate	date,
                    LastUpdateTime	time,
                
                    PRIMARY KEY (IdCanaleDiscord)
                );";
                    
                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "CREATE TABLE UtenteDiscord
                (
                    IdUtenteDiscord	BIGINT NOT NULL,
                    NomeUtente		text,
                    LastUpdateDate	date,
                    LastUpdateTime	time,
                
                    PRIMARY KEY (IdUtenteDiscord)
                );";
                    
                if( !$conn->query($sql) )
                    $Done = false;

                $sql = "INSERT INTO Utente ( NomeUtente, Nome, PasswordUtente, Permessi ) values ('Administrator','Admin','c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f',255);";
                
                if( !$conn->query($sql) )
                    $Done = false;
                
                $Giorni = array( "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdi", "Sabato", "Domenica" );

                for($i = 0; $i < 7; $i++)
                {
                    $sql = "INSERT INTO Giorni ( NomeGiorno ) values ('$Giorni[$i]');";
                    if( !$conn->query($sql) )
                        $Done = false;
                }
            }
            else
               $Done = false;
        }
        $conn->close();
        return $Done;
    }

    function EsisteDatabase($NomeDatabase)
    {
        $response = false;

        $db 			= NOMESERVER;
        $db_username 	= DATABASEUSERNAME;
        $db_password 	= PASSWORD;
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        Mysqli_select_db($DataBase,NOMEDB);					
        
        $Sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '". $NomeDatabase ."'";

        $Query = Mysqli_query($DataBase,$Sql);

        if(Mysqli_num_rows($Query))
            $response = true;

        return $response;
    }

    function AggiungiBozza($Titolo,$IdUtente)
    {
        $response = false;

        $db 			= NOMESERVER;
        $db_username 	= DATABASEUSERNAME;
        $db_password 	= PASSWORD;
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        Mysqli_select_db($DataBase,NOMEDB);					
        
        $sql = "INSERT INTO Annunci (Titolo, IdUtente, Stato) VALUES ('$Titolo', '$IdUtente', 0)";

        $Query = Mysqli_query($DataBase,$sql);

        if($Query)
        {
            $response = true;

            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO AdminLogs (IdUtente, TipoTabella, TipoComando, ComandoCompleto, Giorno, Orario) VALUES ($IdUtente, ".ANNUNCI.", ".INSERT.", \"$sql\", '$date','$date')";
            $Query = Mysqli_query($DataBase,$sql);
        }

        return $response;
    }

    function AggiornaStatoAnnuncio($UserToken, $TitoloAnnuncio, $Stato)
    {
        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;
        
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        
        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $Keep = true;
        $Data = date('Y-m-d');

        if($Stato == 2 && !($_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE))     //Se si sta pubblicando un annuncio senza essere un redattore
        {
            $Keep = false;  //Non pubblicare
        }
        else if(($_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE)) //Se si sta pubblicando un annuncio essendo un redattore
        {
            $sql = "UPDATE Annunci SET Stato = $Stato, DataPubblicazione = '$Data' WHERE Titolo = '$TitoloAnnuncio'";
        }
        else
        {
            $sql = "UPDATE Annunci SET Stato = $Stato, DataPubblicazione = '$Data' WHERE Titolo = '$TitoloAnnuncio' AND IdUtente = ".$_SESSION[$UserToken."IdUtente"]." AND Stato != 2";
        }

        if( $Keep && mysqli_query($DataBase, $sql) ) //prova ad aggiungere l'utente
        {
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO AdminLogs (IdUtente, TipoTabella, TipoComando, ComandoCompleto, Giorno, Orario) VALUES (".$_SESSION[$UserToken."IdUtente"].", ".ANNUNCI.", ".UPDATE.", \"$sql\", '$date','$date')";
            $Query = Mysqli_query($DataBase,$sql);
            
            return 1;
        }
        else
            return 0;
    }

    function GetIdByUserName($UserName)
    {
        $Answer = 0;

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $Query = Mysqli_query($DataBase,"SELECT IdUtente FROM Utente where NomeUtente = '$UserName'");

        if($Row = Mysqli_fetch_array($Query))
        {
            $Answer = $Row["IdUtente"];
        }

        return $Answer;
    }

    function GetUserProfileById($IdUtente)
    {
        $Answer = false;

        $db = NOMESERVER;
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);

        $Query = Mysqli_query($DataBase,"SELECT * FROM Utente where IdUtente = $IdUtente");

        if($Row = Mysqli_fetch_array($Query))
        {
            $Answer = $Row;
        }

        return $Answer;
    }

    function GetIdByTag($NameTagToGet,$Table,$NameTagToSearch,$ValueToSearch)
    {
        $Answer = 0;

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $Query = Mysqli_query($DataBase,"SELECT $NameTagToGet FROM $Table where $NameTagToSearch = $ValueToSearch");

        if($Row = Mysqli_fetch_array($Query))
        {
            $Answer = $Row[$NameTagToGet];
        }

        return $Answer;
    }

    function EsisteChat($IdUser_1, $IdUser_2)
    {
        $Answer = 0;

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $Query = Mysqli_query($DataBase,"SELECT IdChat FROM Chat WHERE IdUtente_1 = $IdUser_1 AND IdUtente_2 = $IdUser_2 OR IdUtente_1 = $IdUser_2 AND IdUtente_2 = $IdUser_1");

        if($Row = Mysqli_fetch_array($Query))
        {
            $Answer = $Row["IdChat"];
        }

        return $Answer;
    }

    function CreaChat($IdUser_1, $IdUser_2)
    {
        $Answer = "";

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $sql = "INSERT INTO Chat (IdUtente_1, IdUtente_2) VALUES ($IdUser_1, $IdUser_2) ";
        $Query = Mysqli_query($DataBase, $sql);

        if($Query)
            $Answer = mysqli_insert_id($DataBase);

        return $Answer;
    }

    function AggiungiInTabella($Tabella, $ArrayElemento, $IdUtente, $NameToNumberSQLTables)
    {
        $response = false;

        $db 			= NOMESERVER;
        $db_username 	= DATABASEUSERNAME;
        $db_password 	= PASSWORD;
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        Mysqli_select_db($DataBase,NOMEDB);

        $NomiParametriString = "";
        $ValoriString = "";
        
        foreach($ArrayElemento as $Parametro)
        {
            $Parametro->NomeParametro;
            $Parametro->Valore;
            $Parametro->Numero;

            $NomiParametriString.="$Parametro->NomeParametro,";

            $ValoriString .= "$Parametro->Numero$Parametro->Valore$Parametro->Numero,";
        }

        $NomiParametriString = substr($NomiParametriString,0,strlen($NomiParametriString)-1);
        $ValoriString = substr($ValoriString,0,strlen($ValoriString)-1);
        
        $sql = "INSERT INTO $Tabella ($NomiParametriString) VALUES ($ValoriString)";

        $Query = Mysqli_query($DataBase,$sql);

        if($Query)
        {
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO AdminLogs (IdUtente, TipoTabella, TipoComando, ComandoCompleto, Giorno, Orario) VALUES (".$IdUtente.", ".$NameToNumberSQLTables[$Tabella].", ".INSERT.", \"$sql\", '$date','$date')";
            $Query = Mysqli_query($DataBase,$sql);

            $response = true;
        }

        return $sql;
    }

    function UpdateInTabella($Tabella,$ArrayUpdate, $IdUtente, $NameToNumberSQLTables)
    {
        $response = false;

        $db 			= NOMESERVER;
        $db_username 	= DATABASEUSERNAME;
        $db_password 	= PASSWORD;
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        Mysqli_select_db($DataBase,NOMEDB);

        $NomiParametriUpdate = "";
        $NoemiParametriWhere = "";
        
        foreach($ArrayUpdate as $Parametro)
        {
            $Parametro->NomeParametro;
            $Parametro->Valore;
            $Parametro->Numero;

            $NomiParametriUpdate.="$Parametro->NomeParametro = $Parametro->Numero$Parametro->Valore$Parametro->Numero,";
        }

        foreach($ArrayCondtion as $Parametro)
        {
            $Parametro->NomeParametro;
            $Parametro->Valore;
            $Parametro->Numero;

            $NoemiParametriWhere.="$Parametro->NomeParametro = $Parametro->Numero$Parametro->Valore$Parametro->Numero AND";
        }

        $NomiParametriUpdate = substr($NomiParametriUpdate,0,strlen($NomiParametriUpdate)-1);
        $NoemiParametriWhere = substr($NoemiParametriWhere,0,strlen($NoemiParametriWhere)-4);
        
        $sql = "UPDATE $Tabella
        SET $NomiParametriUpdate
        WHERE $NoemiParametriWhere";

        $Query = Mysqli_query($DataBase,$sql);

        if($Query)
            $response = true;

        return $response;
    }

    function UpdateCanaleDiscord($IdCanale,$NomeCanale)
    {
        $response = false;

        $db 			= NOMESERVER;
        $db_username 	= DATABASEUSERNAME;
        $db_password 	= PASSWORD;
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        Mysqli_select_db($DataBase,NOMEDB);

        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE CanaliDiscord SET NomeCanale = '$NomeCanale', LastUpdateDate = '$date', LastUpdateTime = '$date'  WHERE IdCanaleDiscord = $IdCanale ";

        $Query = Mysqli_query($DataBase,$sql);

        if($Query)
            $response = true;
        
        return $response;
    }
?>