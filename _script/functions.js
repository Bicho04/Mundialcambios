$(function () {
  $('#wrapper').waypoint('xpanel', {
      shadow: false,
      dim: false,
      reverse:false
  });

  $('ul.menu li a').on('click',function(e){
    e.preventDefault();
    var strAncla=$(this).attr('href');
    $('body,html').stop(true,true).animate({
    scrollTop: $(strAncla).offset().top
    },1000);
  });


  $(window).scroll(function(){
    
    var wScroll = $(this).scrollTop();

    if (wScroll > $('section.mundialcambios').offset().top - $(window).height()){
      var offset = (Math.min(0, wScroll - $('.mundialcambios').offset().top +$(window).height() - 350)).toFixed();
      $('.cuadro').css({'transform': 'translate('+ offset +'px, '+ Math.abs(offset * 0.2) +'px)'});
    }

    if (wScroll > $('section.clima').offset().top - $(window).height()){
      var offset = (Math.min(0, wScroll - $('.clima').offset().top +$(window).height() - 350)).toFixed();
      $('.cuadro').css({'transform': 'translate('+ offset +'px, '+ Math.abs(offset * 0.2) +'px)'});
    }

    if (wScroll > $('section.horarios').offset().top - $(window).height()){
      var offset = (Math.min(0, wScroll - $('.horarios').offset().top +$(window).height() - 350)).toFixed();
      $('.cuadro').css({'transform': 'translate('+ offset +'px, '+ Math.abs(offset * 0.2) +'px)'});  
    }

    if (wScroll > $('section.noticias').offset().top - $(window).height()){
      var offset = (Math.min(0, wScroll - $('.noticias').offset().top +$(window).height() - 350)).toFixed();
      $('.cuadro').css({'transform': 'translate('+ offset +'px, '+ Math.abs(offset * 0.2) +'px)'});
    }

  });


  $(".slides").owlCarousel({
    loop:true,
    center:true,
    nav:false,
    dots:false,
    items:1,
    autoplay:true,
    autoplayHoverPause:true,
    smartSpeed:300
  });

  $('#economia').FeedEk({
    FeedUrl: 'http://www.ultimahora.com/rss/Economia.xml',
    MaxCount: 5,
    ShowDesc: false
  });

  $('#mundo').FeedEk({
    FeedUrl: 'http://www.ultimahora.com/rss/Mundo.xml',
    MaxCount: 5,
    ShowDesc: false
  });



});


// ########### Masa Matriz #####################

var casaMatriz = (function () {
  var myLatlng = new google.maps.LatLng(-25.511867,-54.613134),
      mapCenter = new google.maps.LatLng(-25.511867,-54.613134),
      mapCanvas = document.getElementById('casaMatriz'),
      mapOptions = {
        center: mapCenter,
        zoom: 16,
        scrollwheel: false,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(mapCanvas, mapOptions),
      contentString =
        '<div class="content">'+
        '<div class="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Mundial Cambios</h2>'+
        '<div class="bodyContent"'+
        '<p>Avda. Curupayty c/Adrián Jara, Edif.Globo P.B.</p>'+
        '</div>'+
        '</div>',
      infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 300
      }),
      marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Casa Matriz'
      });

  return {
    init: function () {
      map.set('styles', [{
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          { hue: '#ffff00' },
          { saturation: 30 },
          { lightness: 60}
        ]}
      ]);

      // google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map,marker);
      // });
    }
  };
}());

$(function() {
  $("#casaMatriz").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});


// ########### Salto del Guaira #####################

var salto = (function () {
  var myLatlng = new google.maps.LatLng(-24.064138,-54.307952),
      mapCenter = new google.maps.LatLng(-24.064138,-54.307952),
      mapCanvas = document.getElementById('salto'),
      mapOptions = {
        center: mapCenter,
        zoom: 16,
        scrollwheel: false,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(mapCanvas, mapOptions),
      contentString =
        '<div class="content">'+
        '<div class="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Mundial Cambios</h2>'+
        '<div class="bodyContent"'+
        '<p>Suc. Saltos: Avda. Paraguay c/ B ernardino Caballero</p>'+
        '</div>'+
        '</div>',
      infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 300
      }),
      marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Salto del Guaira'
      });

  return {
    init: function () {
      map.set('styles', [{
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          { hue: '#ffff00' },
          { saturation: 30 },
          { lightness: 60}
        ]}
      ]);

      // google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map,marker);
      // });
    }
  };
}());

$(function() {
  $("#salto").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});


// ########### Shopping Vendome #####################

var vendome = (function () {
  var myLatlng = new google.maps.LatLng(-25.512129,-54.607898),
      mapCenter = new google.maps.LatLng(-25.512129,-54.607898),
      mapCanvas = document.getElementById('vendome'),
      mapOptions = {
        center: mapCenter,
        zoom: 16,
        scrollwheel: false,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(mapCanvas, mapOptions),
      contentString =
        '<div class="content">'+
        '<div class="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Mundial Cambios</h2>'+
        '<div class="bodyContent"'+
        '<p>Suc. Vendome: Avda. Itá Ybaté c/Adrián Jara, Shopp. Vendome</p>'+
        '</div>'+
        '</div>',
      infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 300
      }),
      marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Shopping Vendome'
      });

  return {
    init: function () {
      map.set('styles', [{
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          { hue: '#ffff00' },
          { saturation: 30 },
          { lightness: 60}
        ]}
      ]);

      // google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map,marker);
      // });
    }
  };
}());

$(function() {
  $("#vendome").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});


// ########### km4 Super Carretera #####################

var km4 = (function () {
  var myLatlng = new google.maps.LatLng(-25.509258,-54.639435),
      mapCenter = new google.maps.LatLng(-25.509258,-54.639435),
      mapCanvas = document.getElementById('km4'),
      mapOptions = {
        center: mapCenter,
        zoom: 16,
        scrollwheel: false,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(mapCanvas, mapOptions),
      contentString =
        '<div class="content">'+
        '<div class="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Mundial Cambios</h2>'+
        '<div class="bodyContent"'+
        '<p>Suc. KM 4 Super Carretera sentido Pdte. Franco, a 100 mts. de la rotonda</p>'+
        '</div>'+
        '</div>',
      infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 300
      }),
      marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'km4 Super Carretera'
      });

  return {
    init: function () {
      map.set('styles', [{
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          { hue: '#ffff00' },
          { saturation: 30 },
          { lightness: 60}
        ]}
      ]);

      // google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map,marker);
      // });
    }
  };
}());

$(function() {
  $("#km4").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});


// ########### katueté #####################

var katuete = (function () {
  var myLatlng = new google.maps.LatLng(-24.24815,-54.757682),
      mapCenter = new google.maps.LatLng(-24.24815,-54.757682),
      mapCanvas = document.getElementById('katuete'),
      mapOptions = {
        center: mapCenter,
        zoom: 16,
        scrollwheel: false,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(mapCanvas, mapOptions),
      contentString =
        '<div class="content">'+
        '<div class="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Mundial Cambios</h2>'+
        '<div class="bodyContent"'+
        '<p>Suc. Katueté: Ruta X De las Residentas</p>'+
        '</div>'+
        '</div>',
      infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 300
      }),
      marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'katueté'
      });

  return {
    init: function () {
      map.set('styles', [{
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          { hue: '#ffff00' },
          { saturation: 30 },
          { lightness: 60}
        ]}
      ]);

      // google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map,marker);
      // });
    }
  };
}());

$(function() {
  $("#katuete").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});


// ########### Jebai Center #####################

var jebai = (function () {
  var myLatlng = new google.maps.LatLng(-25.510716,-54.60984),
      mapCenter = new google.maps.LatLng(-25.510716,-54.60984),
      mapCanvas = document.getElementById('jebai'),
      mapOptions = {
        center: mapCenter,
        zoom: 16,
        scrollwheel: false,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(mapCanvas, mapOptions),
      contentString =
        '<div class="content">'+
        '<div class="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Mundial Cambios</h2>'+
        '<div class="bodyContent"'+
        '<p>Suc. Galeria Jebai Center: Avda. Adrian Jara.</p>'+
        '</div>'+
        '</div>',
      infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 300
      }),
      marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Jebai Center'
      });

  return {
    init: function () {
      map.set('styles', [{
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          { hue: '#ffff00' },
          { saturation: 30 },
          { lightness: 60}
        ]}
      ]);

      // google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map,marker);
      // });
    }
  };
}());

$(function() {
  $("#jebai").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});


casaMatriz.init();
salto.init();
vendome.init();
km4.init();
katuete.init();
jebai.init();