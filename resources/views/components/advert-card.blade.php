<!-- component -->
<div {{ $attributes->merge(['class'=>"max-w-sm overflow-hidden rounded border bg-white shadow mb-4 mt-4"]) }}>
    <div class="relative">
        <a href='{{ $AdvertLink }}'>
            <div class="h-48 bg-cover bg-no-repeat bg-center"
              style="background-image: url({{ asset( $imgAdvert ) }})">
            </div>
        </a>
      <div style="background-color: rgba(0,0,0,0.6)"
        class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">$ {{ $price }}</div>
      <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
        <a href="{{ $UserLink }}">
          <img class="rounded-full border-2 border-white" src="@if($imgUser != ""){{ asset('/storage/'.$imgUser) }}@else{{ asset('img/user.png') }}@endif" >
        </a>
      </div>
    </div>
    <div class="p-3">
      <h3 class="mr-10 h-16 text-md truncate-2nd">
          @if(isset($title))
              <a class="hover:text-blue-500" href="{{$AdvertLink}}">{{ substr($title, 0 ,25)  }}</a>
          @endif
      </h3>
      <div class="flex items-start justify-between">
        <p class="text-xs text-gray-500">{{ $location }} </p>
        @if(isset(auth()->user()->id))
          <button class="outline text-xs text-gray-500 hover:text-blue-500" title="Bookmark this ad"><i class="far fa-bookmark"></i></button>
        @endif
      </div>
      <p class="text-xs text-gray-500"><a href="{{ $UserLink }}" class="hover:underline hover:text-blue-500">{{ $UserName }}</a> • {{ $date }} days ago</p>
      <p>{{$slot}}</p>
    </div>
  </div>