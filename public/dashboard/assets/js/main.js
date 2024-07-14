var $owlCarousel =$('.owl-carousel.two').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    lazyLoad: true,
    lazyContent: true,
  
    navText: [
      "<img src='assets/images/angle-left.png'>",
      "<img src='assets/images/angle-right.png'>"
    ],
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 2
      }
    },
  
    
    
  })
  var $owlCarousel =$('.owl-carousel.one').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    lazyLoad: true,
    lazyContent: true,
  
    navText: [
      "<img src='assets/images/angle-left.png'>",
      "<img src='assets/images/angle-right.png'>"
    ],
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
  
    
    
  })

  
  
  
  

  // const ctx = document.getElementById('canvas').getContext("2d")).Bar(barChartData);

  // new Chart(ctx, {
  //   type: 'bar',
  //   data: {
  //     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
  //     datasets: [{
  //       label: '# of Votes',
  //       data: [12, 19, 3, 5, 2, 3],
  //       borderWidth: 1
  //     }]
  //   },
  //   options: {
  //     scales: {
  //       y: {
  //         beginAtZero: true
  //       }
  //     }
  //   }
  // });
  var ctx = document.getElementById("canvas1").getContext("2d");
  var myChart = new Chart(ctx, {
      type: 'bar',
      
      // The data for our dataset
      data: {
          labels:["8","6","4","10","4","10"],
          datasets: [{
              label: 'My First dataset',
              backgroundColor: ["#F57F17", "#F9A825", "#FBC02D" ,"#FDD835","#FFEB3B","#FFEE58", "#FFF176", "#FFF59D" ,"#FFF9C4","#FFFDE7","#FFE082", "#FFD54F", "#FFCA28" ,"#FFC107","#FFB300"],
              data: [8,6,4,10,4,10]
          }]
      },
      
      // Configuration options go here
      options: {
           
          display:true,
          text:'Time Used In A Day Chart (Shown in %)',
          responsive: true,
          maintainAspectRatio:false,
          showScale: false
      }
  });
  var barChartData = {
    labels : ["8","6","4","10","4","10"],
    datasets : [
      {
        fillColor : "#FFBE3F",
        strokeColor : "rgba(220,220,220,1)",
        data : [8,6,4,10,4,10]
      }],
      options: {
        display:true,
        text:'Time Used In A Day Chart (Shown in %)',
        responsive: true,
        maintainAspectRatio:false,
        showScale: false,
        scales: {
          x: {
            grid: {
              display: false
            }
          },
          y: {
            grid: {
              display: false
            }
          }
        }
    }
      
    
    
  }

var myLine = new Chart(document.getElementById("canvas2").getContext("2d")).Bar(barChartData);


var lineChartData2 = {
  labels : ["5th","4th","3th","2th","1th"],
  datasets : [
    {
      fillColor : "rgba(220,220,220,0.5)",
      strokeColor : "#00C8AE",
      pointColor : "#00C8AE",
      pointStrokeColor : "#fff",
      data : [10,8,10,7,2]
    }
  ]
  
}

var myLine2 = new Chart(document.getElementById("canvas1").getContext("2d")).Line(lineChartData2);
