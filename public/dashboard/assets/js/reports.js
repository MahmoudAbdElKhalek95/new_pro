$('.owl-carousel').owlCarousel({
  loop: false,
  margin: 10,
  nav: true,
  rewindNav:false,
  rtl:true,

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
      items: 2
    },
    1000: {
      items: 4
    }
  },

  
  
})




