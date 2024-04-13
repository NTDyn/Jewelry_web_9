$(document).ready(function(){
    revenueChart();
    $('#breadcrumb-second').text('Category');
})


function revenueChart(){

    var xValues = [100,200,300,400,500,600,700,800,900,1000];

    new Chart("revenueChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{ 
            label: "Earring",
            data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
            borderColor: "red",
            fill: false
          }, { 
            label:"Necklace",
            data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
            borderColor: "green",
            fill: false
          }, { 
            label: "Bracelet",
            data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
            borderColor: "blue",
            fill: false
          }]
        },
        options: {
          legend: {
            display:true,
            position: 'right',
            labels: {
                padding: 20,
            }
          },
          title: {
            display: true,
            text: "Doanh thu các loại sản phẩm trong tháng",
            font: {
                size: 18
            }
          },
          scales: {
            xAxes: [{
                gridLines: {
                    display:false
                }
            }],
            yAxes: [{
                gridLines: {
                    display:false
                }   
            }]
          }
        }
      });
}

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}