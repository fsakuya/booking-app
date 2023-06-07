<x-guest-layout>
<x-common-header />
  <section class="text-gray-600 body-font">
    <div class="container px-0 py-8 mx-auto">
      <div class="flex flex-wrap -m-4">
        @foreach ($shops as $shop)
        <div class="p-2 md:w-1/4">
          <div class="border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            @if(empty($shop->image->filename))
            <img class="lg:h-48 md:h-36 w-full h-full object-contain" src="{{asset('images/no_image.jpg')}}">
            @else
            <img class="lg:h-48 md:h-36 w-full h-full object-contain" src="{{asset('storage/shops/' . $shop->image->filename)}}">
            @endif          
            <div class="p-2">
              <h1 class="title-font text-lg font-medium text-gray-900">{{ $shop->name }}</h1>
              <div class="p-1 md:p-2">
                <div class="flex">
                  <div class="text-sm badge badge-outline"><span>#</span>
                    @if ($shop->area_id == 1)
                    東京
                    @elseif ($shop->area_id == 2) 
                    大阪
                    @elseif ($shop->area_id == 3)
                    福岡
                    @endif
                  </div> 
                  <div class="text-sm badge badge-outline"><span>#</span>
                    @if ($shop->genre_id == 1)
                    イタリアン
                    @elseif ($shop->genre_id == 2) 
                    ラーメン
                    @elseif ($shop->genre_id == 3) 
                    寿司
                    @elseif ($shop->genre_id == 4) 
                    焼肉
                    @elseif ($shop->genre_id == 5) 
                    居酒屋
                    @endif
                  </div>
                </div>
                <div class="flex items-center justify-between pt-2">
                  <a href="#" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
                    詳しく見る
                  </a>
                  <button onclick="location.href='#'" class="w-6 h-6 p-0">
                    <img class="w-full h-full" src="{{ asset('images/heart-black.svg') }}">
                  </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>
</x-guest-layout>




