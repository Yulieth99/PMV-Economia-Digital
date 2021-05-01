<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Usuario') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="{{asset('css/show.css')}}">

    <div class="py-12">
        <!-- component -->
<div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-blue-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="{{ Storage::url($perfil->profile_photo_path) }}"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$perfil->name}}</h1>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Estado</span>
                            <span class="ml-auto"><span
                                    class="bg-blue-500 py-1 px-2 rounded text-white text-sm">Activo</span></span>
                        </li>
                        <li class="flex items-center  py-3">
                            <span>Calificación</span>
                            <div class="ml-auto">
                                <span >{{$valoracion}}%/100%</span>
                                
                                <div class="star-rating">
                                    <div class="back-stars">
                                        <i class="fa fa-star " aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                            
                                        <div class="front-stars" name="front" style="width:{{$valoracion}}%" id="val" data-value="">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>                                                
                                    </div>
                                </div> 
                            </div>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Se unio el</span>
                            <span class="ml-auto">{{$perfil->created_at}}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
               <!-- Calification -->
               <div>
                   
                    

               <!--prueba-->
               @if ($calificacionUsers)
                <div class="container bg-white">
                    <div class=" ">
                        <div class="following flex flex-col items-center">
                            <p class="text-gray-900 font-medium text-lg leading-8 pt-4 pb">Calificaciones de este usuario</p>
                            
                            
                        </div>
                        @foreach ($calificacionUsers as $calificacionUsers)
                            
                        <div class="bg-transparent h-auto w-full px-3 " >
                            <div class="flex  flex-col pt-2 ">
                                <div class="flex space-x-3 items-center">
                                    <a href="{{route('perfiles.show', $calificacionUsers->userId)}}"><img src="https://atamashi.org/wp-content/uploads/2020/12/sesshomaru-hanyo-no-yashahime-2-1024x640.jpg" class="rounded-full h-14 w-14 bg-black " ></a>
                                    <div>
                                        <p class="text-blue-900 pb-0" >Por <a class="text-black hover:text-blue-500" href="{{route('perfiles.show', $calificacionUsers->userId)}}">{{$calificacionUsers->name}}</a></p>
                                        <div name="cal">
                                        <div class="star-rating">
                                            <div class="back-stars">
                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                    
                                                <div class="front-stars" name="front" style="width:{{$calificacionUsers->qualification}}%" id="val" data-value="{{$calificacionUsers->qualification}}">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>                                                
                                            </div>
                                        </div>   
                                    </div>                                  
                                    </div>
                                </div>
                                    <div class="border-b border-blue-600 py-2  w-auto h-auto">                                             
                                        <p class="text-justify break-words">{{$calificacionUsers->commentary}}</p>
                                        <div class="flex">
                                        <p class="text-gray-600 text-xs  ml-auto ">{{$calificacionUsers->created_at}}</p>
                                        </div>
                                    </div>
                            </div>
                        </div> 
                        @if ($loop->iteration == 3)    
                                     @break                           
                                     @endif
                        @endforeach                                                                    
                    </div>
                    
                     <div class="following flex flex-col items-center mx-auto">                    
                    <button type="button" onclick="openModal('mostrarCalificaciones')" class="  bg-gray-200 m-2 hover:bg-blue-500 text-black font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-lg">
                      Ver todas las calificaciones
                    </button>
                    
                </div>
                <dialog id="mostrarCalificaciones" name="dialog" class="bg-transparent z-0 relative w-screen h-screen">
                    <div  class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 transition-opacity opacity-0">
                        <div class="bg-white flex roundeds w-1/2 relative  h-5/6 ">
                            <div class="py-6 px-6 w-full h-full overflow-auto overscroll-auto ">
                                <p class="text-gray-900 font-medium text-lg leading-8 pt-4 pb">Todas las calificaciones para {{$perfil->name}}</p>
                                @foreach ($calificacionUsers2 as $calificacionUsers)
                                    
                            
                                <div class="bg-transparent h-auto w-full px-3 " >
                                    <div class="flex  flex-col pt-2 ">
                                        <div class="flex space-x-3 items-center">
                                            <a href="{{route('perfiles.show', $calificacionUsers->userId)}}"><img src="https://atamashi.org/wp-content/uploads/2020/12/sesshomaru-hanyo-no-yashahime-2-1024x640.jpg" class="rounded-full h-14 w-14 bg-black " ></a>
                                            <div>
                                                <p class="text-blue-900 pb-0" >Por <a class="text-black hover:text-blue-500" href="{{route('perfiles.show', $calificacionUsers->userId)}}">{{$calificacionUsers->name}}</a></p>
                                                <div name="cal">
                                                <div class="star-rating">
                                                    <div class="back-stars">
                                                        <i class="fa fa-star " aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                            
                                                        <div class="front-stars" name="front" style="width:{{$calificacionUsers->qualification}}%" id="val" data-value="{{$calificacionUsers->qualification}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>                                                
                                                    </div>
                                                </div>   
                                            </div>                                  
                                            </div>
                                        </div>
                                            <div class="border-b border-blue-600 py-2  w-auto h-auto">                                             
                                                <p class="text-justify break-words">{{$calificacionUsers->commentary}}</p>
                                                <div class="flex">
                                                <p class="text-gray-600 text-xs  ml-auto ">{{$calificacionUsers->created_at}}</p>
                                                </div>
                                            </div>
                                    </div>
                                </div> 
                                     
                                @endforeach

                                <div class="mt-5 justify-start">

                                       <div class="my-2">
                                            
                                            <button type="button" onclick="modalClose('mostrarCalificaciones')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Cerrar
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </dialog>
                </div>

             @endif

                <dialog id="pru" name="dialog" class="bg-transparent z-0 relative w-screen h-screen">
                    <div  class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 transition-opacity opacity-0">
                        <div class="bg-white flex roundeds w-1/2 relative">
                            <div class="py-6 px-6 w-full">
                                <h1>Calificar a este usurio</h1>
                                <div class="mt-5 justify-start">
                                    <form action="{{route('perfiles.calificacion')}}" method="POST">
                                        @csrf

                                        <div>
                                            <p>Ingrese un numero entre 1 y 5</p>
                                            @error('rating') <span name="error" value="false" class="error text-red-600">*Calificación requerida</span> @enderror

                                            
                                                
                                                    
                                            <input class="appearance-none block  bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="" name="rating" id="rating">
                                            <input type="hidden" id="qualified" name="qualified" value="{{$perfil->id}}"> 
                                            <input type="hidden" id="userId" name="qualifier" value="{{$userAuth}}"> 
                                        </div>
                                        <div class="mb-9 justify-start text-left text-blue-600">
                                            <label>Escriba un comentario</label>
                                            <textarea name="comment" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" ></textarea> 
                                            @error('comment') <span name="error" value="false" class="error text-red-600">*Debe escribir un comentario sobre el vendedor</span> @enderror
                                        </div>
                                        <div class="mt-9 mb-9">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">
                                                Calificar
                                            </button>
                                            <button type="button" onclick="modalClose('pru')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Cerrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </dialog>
            </div>

               <!-- End Calification -->


            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Acerca de este perfil</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nombre</div>
                                <div class="px-4 py-2">{{$perfil->name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Genero</div>
                                <div class="px-4 py-2">{{$perfil->gender}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">N° de telefono</div>
                                <div class="px-4 py-2">{{$perfil->number}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Dirección</div>
                                <div class="px-4 py-2">{{$perfil->address}}</div>
                            </div>
                            @foreach ($municipios as $municipio)
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Municipio</div>
                                <div class="px-4 py-2">{{$municipio->name}}</div>
                            </div>
                                @foreach ($departamentos as $departamento)
                                     @if ($municipio->departament_id == $departamento->id )
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Departamento</div>
                                            <div class="px-4 py-2">{{$departamento->name}}</div>
                                        </div>
                                     @endif
                                 @endforeach
                            @endforeach
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{$perfil->email}}">{{$perfil->email}}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Fecha de Nacimiento</div>
                                <div class="px-4 py-2">{{$perfil->birthdate}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10 pb-10 uppercase text-center tracking-wide flex justify-around">
                        <div class="posts">
                          <p class="text-blue-500 text-sm">Publicaciones</p>
                          <p class="text-lg font-semibold text-blue-300">{{count($anuncios)}}</p>
                        </div>
                        <div class="followers">
                          <p class="text-blue-500 text-sm">Anuncios Activos</p>
                          <p class="text-lg font-semibold text-blue-300">{{count($activos)}}</p>
                        </div>
                        @if($perfil->id!==$userAuth)
                        <!--Calificar-->
                <div class="following">
                    <p class="text-blue-500 text-sm">Calificar este usuario</p>
                    
                    <button type="button" onclick="openModal('pru')" class="bg-transparent m-2 hover:bg-blue-500 text-blue-300 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-lg">
                      Calificar
                    </button>
                    
                </div>
                @endif
                
                <!--En calificar-->

                                
                               
                            
                            
                        </div>                        
                       
                      </div>
                </div>

                
                <!-- End of about section -->

                <div class="my-4"></div>
           
                <div class="w-100 bg-blue-100">
                    @livewire('landing-carrousels', ['iduser' => $perfil->id])
            </div>
        </div>
    </div>
</div>
    </div>
</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
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

$(document).ready(function () {    
            
    $(function () {
        $("[name='error']").attr("value","true");
        $("#rateYo").rateYo({
            ratedFill: "#008B8B",
            starWidth: "20px",

            fullStar:true,
            onSet:function(rating,reteYoInstance){
            $("#rating").val(rating);
             }
         });
 

    });
 });

 if( $("[name='error']").attr("value")){
     console.log("if aprobado");
    var k = $("[name='dialog']");
    console.log(k);
    
if($("[name='error']")){
    var idDialog = $("[name='error']").parents("dialog").attr("id"); 
    console.log(idDialog);
    openModal(idDialog);

}
 }

  </script>
