@foreach ($shops as $shop)
<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
  @if(empty($shop->filename))
  <img src="{{asset('images/no_image.jpg')}}">
  @else
  <img src="{{asset('storage/shops/' . $shop->filename)}}">
  @endif
  <div class="p-4 md:p-5">
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
      {{ $shop->name }}
    </h3>
    <div class="card-actions justify-end">
      <div class="badge badge-outline"><span>#</span>{{ $shop->area }}</div> 
      <div class="badge badge-outline"><span>#</span>{{ $shop->genre }}</div>
    </div>
    <div class="flex">
      <a href="#" class="mt-3 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
        詳しく見る
      </a>
      <button onclick="location.href='#'" class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
@endforeach
