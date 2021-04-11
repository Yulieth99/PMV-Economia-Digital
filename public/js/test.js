
  

    $(document).ready(function () {

      
      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
      var slidesPerPage = 4; //globaly define number of elements per page
      var syncedSecondary = true;
      sync1
        .owlCarousel({
          items: 1,
          slideSpeed: 1000,
          nav: true,
          autoplay: true,
          dots: true,
          loop: true,
          responsiveRefreshRate: 200,
          navText: [
            '<svg width="10px" height="10px"   viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg width="10px" height="10px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
          ]
        })
        
      
     //StoreComentarios
     function limpiar(){
      $('#commentary').nodeValue('');
              }

   /* $.ajaxSetup({
      Headers:{
        'X-CSRF-TOKEN':$("input[name=_token]").nodeValue
      }
    });*/

   $('#send').click(function(e){
    e.preventDefault();
    
    var comment = $("#commentary").val();
    var ad = document.getElementById("advert_id");
    var advert = ad.getAttribute("data-value");
    var advert_id = $("input[name=advert_id]").val();
    var advert_id = $("input[name=advert_id]").val();

    

    
    

   });
    

    
      
      
     //ventana emergente
     var openmodal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function(event){
    event.preventDefault()
    toggleModal()
    })
  }
  
  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)
  
  var closemodal = document.querySelectorAll('.modal-close')
  for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
  }
  
  document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
    isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
    isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
    toggleModal()
    }
  };
  function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }



      

    });
