function showGames(sel) {   
    var PatronGames;
    var patron_id = document.getElementById("patron-id").value;
                    
    var PrintGames = function(patron_id) {
        $('#example').DataTable( {
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                }
            ],
            "searching": false,
            "ajax": {
                url: 'http://pvs-test-dcramirezo.c9users.io' +  '/games/' + patron_id,
                type: 'GET',
                dataSrc:''
            },
            "columns": [
                { "data": "Patron_id" },
                { "data": "Game" },
                
            ],
            "bDestroy": true,
        });

        
    };
    PrintGames(patron_id);
                
}