<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
        if($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN) //ed ho il permesso di gestire gli amministratori
        {
            ?>
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-lg-6">
                            <h3>Gestione amministratori</h3>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Visualizzazione logs amministratori</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="table-responsive add-project">
                            <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                <th>Id utente</th>
                                <th>Nome utente</th>
                                <th>Comando</th>
                                <th>Tabella</th>
                                <th>Stringa SQL</th>
                                <th>Giorno</th>
                                <th>Orario</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                                    $db_username = DATABASEUSERNAME;
                                    $db_password = PASSWORD;
                                    
                                    $DataBase = mysqli_connect($db,$db_username,$db_password);
                                    
                                    Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
                                    
                                    $Query = Mysqli_query($DataBase,"SELECT * FROM AdminLogs ORDER BY Giorno,Orario DESC");
                                    
                                    $Count = 1;
                                    $ArrUserName;

                                    while($Row = Mysqli_fetch_array($Query))
                                    {
                                        $IdUtente = $Row['IdUtente'];
                                        echo "	<tr id='Utente_$Count'>
                                                    <td>$IdUtente</td>
                                                    <td> ";
                                        
                                        if(!isset( $ArrUserName[strval($IdUtente)] ) )
                                        {
                                            $Utente = GetUserProfileById($IdUtente);
                                            $ArrUserName[strval($IdUtente)] = $Utente["NomeUtente"];
                                        }

                                        echo $ArrUserName[strval($IdUtente)];

                                        echo "
                                                    </td>
                                                    <td>".$NumberToSQLCommand[intval($Row['TipoComando']) - 1]."</td>
                                                    <td>".$NumberToNameSQLTables[intval($Row['TipoTabella']) - 1]."</td>
                                                    <td>".$Row['ComandoCompleto']."</td>
                                                    <td>".$Row['Giorno']."</td>
                                                    <td>".$Row['Orario']."</td>
                                                </tr>
                                        ";

                                        $Count++;
                                    }

                                ?>
                            </tbody>  
                            </table>
                        </div>
                        </div>
                    </div>
            <?php
        }
    }
?>