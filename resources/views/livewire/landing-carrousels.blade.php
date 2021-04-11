<div>
    <h1 class="text-4xl dark:text-white">
       <a href="">
        @foreach ($categories as $cate)
            {{ $cate->name }}   
        @endforeach
       </a>
    </h1>
    <div>
        <div id="sync1c-@foreach($categories as $cate){{$cate->id}}@endforeach" class="owl-carousel owl-theme sync">
          
          @foreach ($adverts as $advert)
      
                    
          <div class="item"> 
                    <x-advert-card>
                        <x-slot name="title">
                            {{ $advert->title}}
                        </x-slot>
                        <x-slot name="imgUser">
                            {{ $advert->imgUser}}
                        </x-slot>
                        <x-slot name="imgAdvert">
                            {{ $advert->imgAdvert}}
                        </x-slot>
                        {{-- <x-slot name="curriency">
                            {{ number_format($advert->price,2) }}
                        </x-slot> --}}
                        <x-slot name="price">
                            {{ number_format($advert->price,2) }}
                        </x-slot>
                        <x-slot name="location">
                            {{ $advert->township . ', '. $advert->departament }}
                        </x-slot>
                        <x-slot name="date">
                            {{ number_format((strtotime('now')-strtotime($advert->creation_date))/86400,0) }}
                            {{-- //{{ getday()->diff() }} --}}
                        </x-slot>
                        <x-slot name="AdvertLink">
                            {{ route('advert.show', $advert->advert_id)}}
                        </x-slot>
                        <x-slot name="Userid">
                            {{ $advert->user_id}}
                        </x-slot>
                        <x-slot name="UserName">
                            {{ $advert->user_name}}
                        </x-slot>
                        <x-slot name="UserLink">
                            {{ route('perfiles.show', $advert->user_id)}}
                        </x-slot>
                                            
                    </x-advert-card>
          </div>
        
                @endforeach

       
    </div>
    <script>
        $(document).ready(function() {

        var sync1 = $("#sync1c-@foreach($categories as $cate){{$cate->id}}@endforeach");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
        items : 4,
        slideSpeed : 80000,
        nav: true,
        autoplay: true,
        dots: true,
        loop: true,
        responsiveRefreshRate : 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        }).on('changed.owl.carousel', syncPosition);


        function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;
        
        //if you disable loop you have to comment this block
        var count = el.item.count-1;
        var current = Math.round(el.item.index - (el.item.count/2) - .5);
        
        if(current < 0) {
            current = count;
        }
        if(current > count) {
            current = 0;
        }
        }

        function syncPosition2(el) {
        if(syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
        }
        });
    </script>
    
</div>
