
window.onload=function(){
  updateOwl();
}
//expand aside button
let expand_btn=document.querySelector("aside.main-menu .expand-aside");
expand_btn.addEventListener("click",function(){
  document.body.classList.toggle("toggle");
  setTimeout(function(){
    updateOwl();        
  },   600)     


 
});
updateOwl = function(){
  $(".owl-carousel").each(function() {
    $(this).data('owl.carousel').onResize();
  });
};






    //Start drop down menu
    $(document).on("click",function(e){
      $(".dropdown").removeClass("active");
   })
  $(".dropdown").on("click",function(e){
      e.stopPropagation();
      console.log("Dddd")
      $(".dropdown").removeClass("active");
      $(this).siblings().removeClass("active");
      $(this).toggleClass("active");

  });
  $(".dropdown-menu").on("click",function(e){
      e.stopPropagation();
      

  });

  $(" .dropdown .dropdown-menu").on("click",function(){
      console.log($(".dropdown.active .dropdown-menu::-webkit-scrollbar-thumb"))
      $(".dropdown.active .dropdown-menu::-webkit-scrollbar-thumb").css({"visibility": "visible"});
      setTimeout(function(){
          $(".dropdown.active .dropdown-menu::-webkit-scrollbar-thumb").css({"visibility": "hidden"})
      },1000)
  
  });


