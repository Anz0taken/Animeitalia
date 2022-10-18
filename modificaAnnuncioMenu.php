<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"])) //se il mio utente è loggato
    {
        if($_SESSION[$UserToken."Privilegi"] & PERMESSONEWS || $_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE)  //ed ho il permesso di gestire gli amministratori
        {
            $TitoloAnnuncio = filter_input(INPUT_POST, "TitoloAnnuncio", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
            $db_username = DATABASEUSERNAME;
            $db_password = PASSWORD;
            
            $DataBase = mysqli_connect($db,$db_username,$db_password);
            
            Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
            
            $sql = "SELECT * FROM Annunci WHERE Titolo = '$TitoloAnnuncio' ";

            if(!($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN) && !($_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE))         //se l'utente non è un amministratore e non è un redattore
                $sql.= " AND IdUtente = ".$_SESSION[$UserToken."IdUtente"]." ";

            if($Row_Data = Mysqli_fetch_array(mysqli_query($DataBase, $sql)))
            {
                ?>
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-lg-6">
                                <h3>Modifica annuncio '<strong id="OldTitolo"><?php echo $Row_Data[2]; ?></strong>'</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Editor documento news</h5>
                  </div>
                  <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="form-label">Titolo</label>
                            <input id="NewTitolo" class="form-control" type="text" placeholder="Titolo" value="<?php echo $Row_Data[2]; ?>">
                            
                            <br>
                        </div>
                    </div>

                    <textarea id="editor1" name="editor1" cols="30" rows="10">
                        <?php echo $Row_Data[3]; ?>
                    </textarea>

                    <div class="row">
                        <div class="col-lg-6">
                        <h3 id="dialogBox"></h3>
                        </div>
                        <div class="col-lg-6 text-right">
                            <br>
                        <input type="button" onclick="aggiornaAnnuncio()" class="btn btn-primary" value="Aggiorna"></button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                    </div>
                    </div>
                    <script src="cp/assets/js/editor/ckeditor/ckeditor.js"></script>
                    <script src="cp/assets/js/editor/ckeditor/adapters/jquery.js"></script>
                    <script src="cp/assets/js/editor/ckeditor/styles.js"></script>

                    <!-- Error -> -->
                    <script src="cp/assets/js/editor/ckeditor/ckeditor.custom.js"></script>
                    <!-- EEnd -->

                    <script src="cp/assets/js/tooltip-init.js"></script>
                    <script>
                        function aggiornaAnnuncio()
                        {
                            var OldTitolo = document.getElementById("OldTitolo").innerHTML;
                            var NewTitolo = document.getElementById("NewTitolo").value;
                            var Contenuto = CKEDITOR.instances.editor1.getData();
                            
                            Contenuto = Contenuto.replace(/[\n\r]/g, "\\n");
                            ontenuto = Contenuto.replace(/</g, "&#60;");
                            
                            $.post("./modificaAnnuncio.php",  { "NewTitolo": NewTitolo, "OldTitolo": OldTitolo, "Contenuto": Contenuto } )
                            .done(function( result ) 
                            {
                                $("#main").html(result);
                            });
                        }
                    </script>
                <?php
            }
            else
                echo "ERRORE : Non e' stato possibile effettuare il comando sql. ".$sql." " . mysqli_error($DataBase);
        }
        else
            echo "<p> Non hai i permessi per visualizzare questa sezione . . .<p>";
    }
    else
        echo "Wops, sembra che qualcosa sia andato storto :(";
?>