function carouselDemo(){
    let items = document.querySelectorAll('.carousel .carousel-item')
    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
        // wrap carousel by using first child
        next = items[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
    }   
})

}


$(document).ready(function(){
    carouselDemo();
    revenueChart();
    ratingChart();
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
          }
        }
      });
}

function ratingChart(){
    var xValues = ["5 stars", "4 stars", "3 stars", "2 stars", "1 star"];
    var yValues = [55, 49, 44, 24, 1];
    var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145"
    ];

    new Chart("ratingChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
                display: false,
            },
            legend: {
                display: false
            }
        },
        
    });
}
