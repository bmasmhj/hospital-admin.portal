	
/*scrolling banner*/
(function ($) {
    "use strict";
 
      $(document).ready(function(){
          $('.carousel_se_03_carousel').owlCarousel({
              items: 4,
              nav: true,
              dots: false,
              loop :true,
             
              mouseDrag: true,
              responsiveClass: true,
              autoplay: true,
              autoplayTimeout: 2000,
              autoplayHoverPause: true,
              navText : ["<i class='icofont-scroll-left'></i>","<i class='icofont-scroll-right'></i>"],
              responsive: {
                  0:{
                    items: 1
                  },
                  480:{
                    items: 2
                  },
                  767:{
                    items: 3
                  },
                  992:{
                    items: 3
                  },
                  1200:{
                    items: 4
                  }
              }
          });
      });  
  
  
      
  
  
  
        
  
  
  })(jQuery); 
  