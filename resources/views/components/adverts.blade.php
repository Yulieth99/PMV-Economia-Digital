<x-app-layout>

    <div class="flex flex-row h-full">

        </div>
    
        <div class="sm:w-full md:w-3/4 h-full mx-auto py-10 px-12 relative">

            <div class="h-15 md:absolute top-2 right-12 sm:flex flex-row text-sm">
                {{--  BOTON FILTRAR--}}
                    
            </div>

            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3  gap-4 ">

         
            
                @foreach ($adverts as $advert)
                
            
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


                    @if(isset($idUser))
                    <x-slot name="Userid">
                        {{ auth()->user()->id}}
                    </x-slot>
                    <x-slot name="UserName">
                        {{ auth()->user()->name}}
                    </x-slot>
                    <x-slot name="UserLink">
                        {{ route('perfiles.show', $idUser)}}
                    </x-slot>

                    
                        @if ($advert->advert_status_id == 1)
                            <div class="py-1 w-100">
                                <div class="w-50 py-4" style="float: left"></div>
                                <div class="py-1" style="float: right" >
                                    <a href="{{route('advertsUser.edit',$advert->id)}}" @if ($advert->advert_status_id == 2) aria-disabled="true" class=" bg-gray-100 rounded-lg text-white mr-2" @endif class="px-4 bg-gray-400 rounded-lg text-white -bottom-8">Eliminar</a>
                                </div>
                            </div>  
                        @endif

                                            
                    @else

                        <x-slot name="Userid">
                            {{ $advert->user_id }}
                        </x-slot>
                        <x-slot name="UserName">
                            {{ $advert->user_name }}
                        </x-slot>
                        <x-slot name="UserLink">
                            {{ route('perfiles.show', $advert->user_id )}}
                        </x-slot>

                    @endif
    
                    
                </x-advert-card>
    
            @endforeach
    
            </div>
            {{ $adverts->links() }}
        </div>
        
    </div>



</div>
    @yield('js')


    <script>
        $(function(){
            function slideMenu(){
                var activeState = !$("#menu-container").hasClass("hidden");
                $("#menu-container").animate({left: activeState ? "0%" : "-100%"}, 400);
            }

            function toggleMenu(even){
                event.stopPropagation();

                $("#menu-container").toggleClass("w-3/4");
                $("#menu-container").toggleClass("hidden");
                $("#btn-close-menu").toggleClass("hidden");
                $("#menu-container").toggleClass("absolute");
                $("#menu-container").toggleClass("shadow-2xl");
                slideMenu();
            }

            $('#btn-close-menu').click(function(even){
                toggleMenu(even);
            });
            $('#btn-menu').click(function(even){
                toggleMenu(even);
            });

            
        });
    </script>
</x-app-layout>
