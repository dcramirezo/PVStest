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
                url: 'http://localhost:8000' +  '/games/' + patron_id,
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