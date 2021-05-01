<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORTUNA</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/show.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css">
    
    

</head>
<body class="bg-blue-50">
  @livewire('navigation-menu')
    <main>
    <div class=" flex   space-x-16  w-auto items-center m-16 z-0">
      <div class= "w-3/5 bg-white  ">            
            <!--<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 ">
                <div class="col-span-2 bg-white  overflow-hidden shadow-xl sm:rounded-lg">-->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 border-b border-gray-200">
                      <div class="col-span-2 m-2">
                        <h1  class="font-sans text-2xl font-bold text-green-700">{{$advert->title}}</h1>
                        <h1 class="font-sans text-sm text-gray-500">{{$advert->creation_date}}</h1>
                      </div>
                      <div class="text-right m-2">
                        <h1 class="font-sans text-lg  text-green-700">{{$adProduct->product_status}}</h1>
                       <h1 class="font-sans text-xl text-red-600">{{$adProduct->price}} {{$currency}}</h1>
                      </div>
                    </div>
                    <!--photos-->
                    <div class="py-4 flex flex-col z-0 items-center">
                      <div id="sync1" class="max-w-md block owl-carousel owl-theme">
                          @foreach ($photos as $photo)
                            <div class=" bg-cover bg-no-repeat bg-center  ">
                            <img src="{{$photo->photo_path}}" class="background-image  " alt=""></div>
                          @endforeach     
                        
                      </div>
                      <div id="sync2" class=" block w-auto px-16 owl-carousel owl-theme">
                        @foreach ($photos as $photo)
                          <div class="item w-24 relative ">
                          <img src="{{$photo->photo_path}}" class="   h-14" alt="">
                        </div>
                        @endforeach
                      </div>
                    </div>
                    <!--end photos-->    
				
      </div>
       <!--card-->
       <div class="justify-items-end w-64 h-auto sm:max-w-sm sm:max-h-80 sm:w-auto sm:h-auto sm:rounded-2xl font-sans text-sm p-2 bg-none sm:bg-white sm:text-base sm:p-4  sm:border-2 sm:border-gray-500">
        <div class="flex  space-x-6  items-center border-b border-green-200 pb-2">
          <a class="hover:text-blue-600 " href="{{route('perfiles.show', $user->id)}}"><img src="{{$user->profile_photo_url}}" class="rounded-full " alt="Imagen"></a>
           
          <div class="w-64">
            <h3 id="user" class=" font-bold  sm:text-lg	 " data-value="{{$user->id}}"> <a class="hover:text-blue-600 " href="{{route('perfiles.show', $user->id)}}">{{$user->name}}</a> </h3>
            <h4 class=" text-gray-500 text-xs">En Lucem.com desde {{$userDt[0]}} del {{$userDt[1]}}</h4>
            
         <div class="">
           <div class="star-rating" title="{{$val}}% de 100%">
            <div class="back-stars">
                <i class="fa fa-star " aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                               <div class="front-stars" id="val" style="width:{{$val}}%">
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
        </div >
        <div class=" items-center flex flex-wrap space-x-4 border-b border-green-200 py-4 ">   
            <i class="fas fa-map-marker-alt text-green-700"></i>						
            <p class="  ">{{$townshipUser}}, {{$departmentUser}}</p>
        </div>
        @if ($userAuth)          
          <div  class="   border-b border-green-200 py-4">
            <div class=" items-center  space-x-4 flex flex-wrap ">
              <i class="fas fa-phone-alt text-green-700" ></i>							
              <p class="  ">{{$user->number}}</p>
            </div>
            <div class="items-center   space-x-4 flex flex-wrap ">
                <i class="fas fa-envelope text-green-700"></i>	
                <p class="  ">{{$user->email}} </p> 
            </div>
          </div>
        @endif
        <div  class=" hidden sm:flex  sm:items-center sm:pt-2">
          <div class="flex-1 border-r border-green-200 text-center pr-4">
              <h3 class="py-2     text-red-600  font-bold	">{{$AlladdsUser}} </h3>
              <p class="  text-xs">Anuncios Publicados </p>
          </div>
          <div  class="flex-1 text-center pl-4">
            <h3 class="py-2    text-red-600  font-bold">{{$adsActive}} </h3>
            <p class="text-xs ">Anuncios Activos </p>
          </div>
        </div>
      </div>
      </div>
       <!--card-->

    </div>
        <div class="container mx-auto py-4 w-3/5">
            <div class=" gap-3">
                <div class="bg">
                
                    
                    <div class="bg-white p-3 border-t border-blue-400">
                      
                      <h1 class="text-gray-900 font-bold text-xl  ">Detalles</h1>
                    
                      <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mx-8 mt-3 divide-y rounded shadow-sm">
                          <li class="flex items-center py-3">
                              <span class="font-bold">Estado</span>
                              <span class="ml-auto"><span class="bg-blue-500 py-1 px-2 rounded text-white text-sm">{{$adProduct->product_status}}</span></span>
                          </li>
                          
                          <li class="flex items-center py-3">
                            <span class="font-bold">Precio</span>
                            <span class="ml-auto">{{$adProduct->price}} {{$currency}}</span>
                        </li>
                        <li class="flex items-center  py-3">
                          <span class="font-bold">Categoría</span>
                          <div class="ml-auto">
                              <span >{{$category}}</span>
                              
                          </div>
                      </li>
                      <li class="flex items-center  py-3">
                        <span class="font-bold ">Este libro es</span>
                        <div class="ml-auto">
                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{$advert->cadAdvert}}</span>
                            
                        </div>
                    </li>
                          <li class="flex items-center  py-3">
                            <span class="font-bold">Ubicación</span>
                            <div class="ml-auto">
                                <span >{{$township}}, {{$department}}</span>
                                
                            </div>
                        </li>
                        
                      <li class="flex items-center  py-3">
                        <span class="font-bold">Publicado el</span>
                        <div class="ml-auto">
                            <span >{{$advertDt[0]}} de {{$advertDt[1]}} del {{$advertDt[2]}} </span>
                            
                        </div>
                    </li>
                    
                      </ul>
                      <h1 class="font-bold ">Descripcion:</h1>
                    <p class="text-gray-800 text-justify break-words  ">{{$advert->description}}</p>
                    
                  </div>

                </div>




                
                    
                        
             </div>
         </div>

       </div>
        

    </main>
    
    <div style="background-color: orange;">
      <div style="margin-left: auto;margin-right: auto;width: 25%; text-align: center;">
          <p style="margin-top: 10px; color:white;"> <b>Siguenos en nuestras redes sociales y mantente pendiente de nuestras promociones y eventos.</b> </p>
          <a class ="icono" href="#" style="color: blue;"><i class="fab fa-facebook-f"></i></a>
          <a class ="icono" href="#" style="color: rgb(0, 174, 255);"><i class="fab fa-twitter"></i></a>
          <a class ="icono" href="#" style="color: red;"><i class="fab fa-instagram"></i></a>
          <a class ="icono" href="#" style="color: green;"><i class="fab fa-whatsapp-square"></i></a>
          <label style="margin-top: 10px; color:white;"> Copyright © 2021 Lucem. Todos los derechos reservados. </label>
      </div>
</div>
</body>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>


<script src="{{asset('js/show.js')}}"></script>




</html>