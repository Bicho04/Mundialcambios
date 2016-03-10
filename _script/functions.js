// var navigation = responsiveNav(".header-menu",{
//     label: "",
// });


$(function(){
    $('.nav-toggle').addClass('fa fa-bars');

    $(".pictures").responsiveSlides({
        speed: 600,
        nav: true,
        prevText: "",
        nextText: "",   
        navContainer: ".slide-navs",
        namespace: "slide"
    });

});
