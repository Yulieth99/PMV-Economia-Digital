<x-app-layout>

    @foreach ($ad as $ads)
        
   <div class="relative">
        <a href='{{route('advert.show', $ads->id)}}'>
            <div class="h-48 bg-cover bg-no-repeat bg-center"
              style="background-image: url({{ asset($ads->photo_path) }})">
            </div>
        </a>
      <div style="background-color: rgba(0,0,0,0.6)"
        class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">$ {{ $ads->price }}</div>
      <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
        <a href="{{ $ads->name }}"></a>
      </div>
    </div>
    <div class="p-3">
      <h3 class="mr-10 h-16 text-md truncate-2nd">
          @if(isset($ads->title))
              <a class="hover:text-blue-500" href="{{$ads->title}}"></a>
          @endif
      </h3>
      <div class="flex items-start justify-between">
       
      </div>
    </div>
    @endforeach
  </x-app-layout>
