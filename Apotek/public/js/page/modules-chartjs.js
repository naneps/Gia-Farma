"use strict";
$(function() {
var ctx = document.getElementById("myChart").getContext('2d');
let total = []
let dayname = []

    $.ajax({
        url: `${baseUrl}/grafik`,
        type:'GET',
        dataType: 'json',
        success: function(data) {
            $.each(data,function(k,v){
                total.push(v.total);
                dayname.push(v.day_name)
            })

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: dayname,
                  datasets: [{
                    label: 'Statistics',
                    data: total,
                    borderWidth: 2.5,
                    borderColor: '#6777ef',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                  }]
                },
                options: {
                  legend: {
                    display: false
                  },
                  scales: {
                    yAxes: [{
                      gridLines: {
                        drawBorder: true,
                        color: '#f2f2f2',
                      },
                      ticks: {
                        beginAtZero: true,
                        stepSize: 100000
                      }
                    }],
                    xAxes: [{
                      ticks: {
                        display: false
                      },
                      gridLines: {
                        display: false
                      }
                    }]
                  },
                }
              });

        }
    })
})

