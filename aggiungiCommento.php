<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]) && isset($_POST["IdPost"]) && isset($_POST["Commento"]))
    {
        $Array = array_fill(0,6,0);

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
        $Array[2]->Valore = COMMENTTYPE;
        $Array[2]->Numero = '';

        $Array[3] = new DatoInsertSQL();
        $Array[3]->NomeParametro = "Descrizione";
        $Array[3]->Valore = filter_input(INPUT_POST, "Commento", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        $Array[3]->Numero = '\'';

        $Array[4] = new DatoInsertSQL();
        $Array[4]->NomeParametro = "Giorno";
        $Array[4]->Valore = date('Y-m-d');
        $Array[4]->Numero = '\'';

        $Array[5] = new DatoInsertSQL();
        $Array[5]->NomeParametro = "Orario";
        $Array[5]->Valore = date('H:i:s');
        $Array[5]->Numero = '\'';

        AggiungiInTabella("CommentiUtente",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables);

        /* Mandiamo i nuovi commenti all'utente */

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;
        
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        
        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $CommentiPost = Mysqli_query($DataBase,"SELECT * FROM CommentiUtente WHERE IdElementoCommentato = ".filter_input(INPUT_POST, "IdPost", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH)." AND TipoElementoCommentato = ".COMMENTTYPE." ORDER BY Giorno ASC, Orario ASC");

        while($CommentoUtente = Mysqli_fetch_array($CommentiPost))
        {
            $ProfiloUtenteCommento = GetUserProfileById($CommentoUtente["IdUtente"]);

            ?>

                <div class="your-msg">
                    <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="
                        <?php
                            if(isset($ProfiloUtenteCommento["Immagine"]))
                            {
                                if($ProfiloUtenteCommento["Immagine"] != "")
                                {
                                    echo $ProfiloUtenteCommento["Immagine"];
                                }
                            }
                            else
                                echo "assets/img/UserIcon.png";
                        ?>
                    ">
                        <div class="media-body"><span class="f-w-600"><?php echo $ProfiloUtenteCommento["NomeUtente"]; ?> <span><?php echo $CommentoUtente["Giorno"].", ".$CommentoUtente["Orario"]; ?> <i class="fa fa-reply font-primary"></i></span></span>
                            <p><?php echo $CommentoUtente["Descrizione"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php
        }
    }


?>