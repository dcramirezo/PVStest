<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PVS Test</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- D3.js, C3.js graphs -->
        <script src="https://d3js.org/d3.v3.js"></script>
        <script src="/js/c3.min.js"></script>
        <link href="/css/c3.min.css" rel="stylesheet" type="text/css">
        
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

        <script src="/js/displayGames.js"></script>
        <script src="/js/chart_display.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <style>
        #patrons-by-turnover-chart svg {
            font-family: Raleway,sans-serif;
        }
        
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default">
                         <div class="panel-body"><h1>PVS Test</h1></div>
                    </div>
                                      
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Top 10 Patrons by turnover</h3></div>
                        <div class="panel-body">
                            <div id="patrons-by-turnover-chart"></div>
                        </div>
                    </div>
            
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Games per Patron</h3></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4"> 
                                    <p>Please select the Patron ID from the list.</p>       
                                    <select id="patron-id" name="patron-id" onChange="showGames(this);">
                                    <option selected disabled>Patron id...</option>
                                    @foreach ($top_patrons as $patron)
                                         <option value="{{ $patron->Patron_id }}">{{ $patron->Patron_id }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-8"> 
                                    <div id="games_per_patron">
                                        <table id="example" class="display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">Patron id</th>
                                                    <th>Game</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>