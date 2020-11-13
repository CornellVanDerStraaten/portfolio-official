$(document).ready(function(){
    let owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        navText: ["<i class='fas fa-arrow-circle-left nav-right'></i>", "<i class='fas fa-arrow-circle-right nav-right'></i>"],
        responsive: {
            0:{
                items:1
            },
            530:{
                items:2
            },
            1050:{
                items:3
            }
        }
    });
  });