<?php
    session_start();
    include 'vardefine.php';
    include 'functions.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    if(isset($_SESSION[$UserToken."Privilegi"]) )    //Se il mio utente è loggato
    {
        ?>
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Social</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Visualizzazione amministratori</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="table-responsive add-project">
                      <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>Nome</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                                $db_username = DATABASEUSERNAME;
                                $db_password = PASSWORD;
                                
                                $DataBase = mysqli_connect($db,$db_username,$db_password);
                                
                                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
                                
                                $Query = Mysqli_query($DataBase,"SELECT * FROM Utente");
                                
                                $Count = 1;

                                while($Row = Mysqli_fetch_array($Query))
                                {
                                    $UserName = $Row['NomeUtente'];
                                    echo "	<tr id='Utente_$Count'>
                                                <td id='UserName'>".$Row["NomeUtente"]."</td>
                                                <td>".$Row["Nome"]."</td>
                                                <td class=\"text-right\"><a class=\"icon\" href=\"javascript:void(0)\"></a>

                                                <button class='btn btn-success' onclick='visualizzaAccount($Count)'>Visualizza account</button>
                                            </td>
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
                <script>
                    function visualizzaAccount(NumeroAccount)
                    {
                        var UserName = $("#Utente_"+NumeroAccount+" #UserName").text();

                        $.post("./visualizzaAccount.php",  {"UserName": UserName } )
                        .done(function(result) 
                        {
                        $("#main").html(result);
                        });
                    }
                </script>
        <?php
    }
?>