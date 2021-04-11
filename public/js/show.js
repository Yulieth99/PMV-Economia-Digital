
    function enviarComentario() {
      
      
    }
    $(document).ready(function () {    
  
        // **Imagenes en movimiento
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
          .on("changed.owl.carousel", syncPosition);
        sync2
          .on("initialized.owl.carousel", function () {
            sync2.find(".owl-item").eq(0).addClass("current");
          })
          .owlCarousel({
            items: slidesPerPage,
            dots: true,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
          })
          .on("changed.owl.carousel", syncPosition2);
        function syncPosition(el) {
          //if you set loop to false, you have to restore this next line
          //var current = el.item.index;
          //if you disable loop you have to comment this block
          var count = el.item.count - 1;
          var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
          if (current < 0) {
            current = count;
          }
          if (current > count) {
            current = 0;
          }
          //end block
          sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
          var onscreen = sync2.find(".owl-item.active").length - 1;
          var start = sync2.find(".owl-item.active").first().index();
          var end = sync2.find(".owl-item.active").last().index();
          if (current > end) {
            sync2.data("owl.carousel").to(current, 100, true);
          }
          if (current < start) {
            sync2.data("owl.carousel").to(current - onscreen, 100, true);
          }
        }
        function syncPosition2(el) {
          if (syncedSecondary) {
            var number = el.item.index;
            sync1.data("owl.carousel").to(number, 100, true);
          }
        }
        sync2.on("click", ".owl-item", function (e) {
          e.preventDefault();
          var number = $(this).index();
          sync1.data("owl.carousel").to(number, 300, true);
        });

        //Fin imagenes en movimiento

        /* Inicio stars 
        var frontStars = document.getElementsByClassName("front-stars")[0];
        var percentage = frontStars.getAttribute("data-value");
        //100 / 5 * 2.63;
        frontStars.style.width = percentage + "%";
        console.log(percentage);
        var rating = document.getElementsByClassName("star-rating")[0];
        rating.title = +frontStars.getAttribute("data-value") + "% de 100%";
        //Fin Stars*/
       
              
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



       //Inicio StoreComentarios
       function limpiar(){
        $('#commentary').val('');
                }

     /* $.ajaxSetup({
        Headers:{
          'X-CSRF-TOKEN':$("input[name=_token]").nodeValue
        }
      });*/
      var id = 0;

      $("[name='answer']").click(function(e) {
          e.preventDefault();
          $(this).parent().siblings().find("#commentary").removeClass("hidden");
          var k = $("[name='send']")

         var p = $(this).siblings().removeClass("hidden");
         $(this).addClass("hidden")


        
        
      });

      //rating user
      
      //end rating user
     
     $("[name='sendComment']").click(function(e){
      e.preventDefault();  
      function seleccionar() {

        
      }
        var r = $(this).parent().siblings();
        k(r);

      function k(r) {
        var no = $(this);
        console.log(no);
        
      }
      
        
      var commentary = $(this).parent().siblings("#commentary").val();      
      var user_id = $(this).parent().siblings("#user_id").val();
      var advert_id = $("#advert_id").val();
      var _token = $(this).parent().siblings("input[name=_token]").val();
      console.log('parece que na');
      $.ajax({
        type:'POST',
        url:'/comment',
        data:{
          commentary: commentary,
          user_id:user_id,
          advert_id:advert_id,
          _token:_token
        },
        success:function(response) {
          if(response){
            limpiar();
            console.log('parece que funcioona');
            $('#question').load('question');

          }
          
        }
      });    
     });  
        
      //Responder preguntas
      
    function openModal(key) {
      document.getElementById(key).showModal(); 
      document.body.setAttribute('style', 'overflow: hidden;'); 
      document.getElementById(key).children[0].scrollTop = 0; 
      document.getElementById(key).children[0].classList.remove('opacity-0'); 
      document.getElementById(key).children[0].classList.add('opacity-100')
    }

  function modalClose(key) {
      document.getElementById(key).children[0].classList.remove('opacity-100');
      document.getElementById(key).children[0].classList.add('opacity-0');
      setTimeout(function () {
          document.getElementById(key).close();
          document.body.removeAttribute('style');
      }, 100);
  }
      });
