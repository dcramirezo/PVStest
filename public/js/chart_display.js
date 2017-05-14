$(function() {
var TopTenChart, Turnover, patrons_id, topTenData = [];

var getTopTenData = function() {
        $.ajax({
            url: 'http://pvs-test-dcramirezo.c9users.io'+  '/top_ten',
            type: 'GET'
        }).done(function(rawData) {
            // Save Data
            topTenData = rawData;
            
            drawTopTenChart();
        });
    };

getTopTenData();
var drawTopTenChart = function() {

  var data = [
        Object.values(topTenData[0]),
        Object.values(topTenData[1]),
        Object.values(topTenData[2]),
        Object.values(topTenData[3]),
        Object.values(topTenData[4]),
        Object.values(topTenData[5]),
        Object.values(topTenData[6]),
        Object.values(topTenData[7]),
        Object.values(topTenData[8]),
        Object.values(topTenData[9])
      ]

   TopTenChart = c3.generate({
   	size: {
         height: 240,
     },
    bindto: '#patrons-by-turnover-chart',
    data: {
      columns: data,
      type: 'bar',
      order: 'desc'
    },
    axis: {
      y: {
        label: {
          text: 'Turnover',
          position: 'outer-middle'
        },
        tick: {
          format: d3.format("$,") // ADD
        }
      },
      x: {
      	label: {
      		text: 'Patrons ID',
      		position: 'outer-center'
      	},
      	tick: {
            count: 0,
        }
      }
      
      }
    });

 };
});