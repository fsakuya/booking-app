<x-guest-layout>
    <div class="flex items-center justify-between mb-4">
        <x-common-header />
        <x-search-box :areas="$areas" :genres="$genres" />
    </div>
    <section>
        <div class="flex flex-wrap">
            @foreach ($shops as $shop)
                <div class="md:w-1/4 px-2 py-3">
                    <div class="bg-white shadow-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden h-80">
                        <div class="h-1/2 relative">
                            @if (empty($shop->image->filename))
                                <img class="w-full h-full overflow-hidden object-cover"
                                    src="{{ asset('images/no_image.jpg') }}">
                            @else
                                <img class="w-full h-full overflow-hidden object-cover"
                                    src="{{ asset('storage/shops/' . $shop->image->filename) }}">
                            @endif
                        </div>
                        <div class="p-4">
                            <h1 class="title-font text-lg font-bold text-gray-900">{{ $shop->name }}</h1>
                            <div class="flex mt-1">
                                <div class="text-xs badge badge-outline font-bold"><span>#</span>
                                    @if ($shop->area_id == 1)
                                        東京都
                                    @elseif ($shop->area_id == 2)
                                        大阪府
                                    @elseif ($shop->area_id == 3)
                                        福岡県
                                    @endif
                                </div>
                                <div class="ml-2 text-xs badge badge-outline font-bold"><span>#</span>
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
                            <div class="flex items-center justify-between pt-6 mb-1">
                                <a href="{{ route('user.list.show', $shop->id) }}"
                                    class="py-1 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent bg-customBlue text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    詳しくみる
                                </a>
                                <button class="favorite-button w-8 h-8 p-0" data-shop-id="{{ $shop->id }}">
                                    @if (Auth::user() && Auth::user()->favorites && Auth::user()->favorites->contains($shop->id))
                                        <img class="w-full h-full" src="{{ asset('images/heart-red.svg') }}">
                                    @else
                                        <img class="w-full h-full" src="{{ asset('images/heart-gray.svg') }}">
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-guest-layout>
