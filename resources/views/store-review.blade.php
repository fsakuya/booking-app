<x-guest-layout>
    <div class="container m-auto grid grid-cols-2  gap-10">
        <div class="row-start-1">
            <x-common-header />
        </div>
        <div class="row-start-2 row-end-4">
            <div class="flex flex-col">
                <div class="w-2/3 m-auto">
                    <p class="mb-6 p-6 text-4xl whitespace-normal">今回のご利用はいかがでしたか？</p>
                </div>
                <div class="px-2 py-3 w-1/2 m-auto">
                    <div class="bg-white shadow-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden h-70">
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
                            <div class="flex items-center justify-between pt-4 mb-1">
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
            </div>
        </div>
        <div class="row-start-2 row-end-4">
            <div class="flex flex-col">
                <div>
                    <p>体験を評価してください</p>
                    <!-- Star -->
                    <div class="flex-shrink-0 flex justify-center space-x-1 mt-3">
                        <svg class="h-4 w-4 text-blue-500" width="51" height="51" viewBox="0 0 51 51"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor" />
                        </svg>
                        <svg class="h-4 w-4 text-blue-500" width="51" height="51" viewBox="0 0 51 51"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor" />
                        </svg>
                        <svg class="h-4 w-4 text-blue-500" width="51" height="51" viewBox="0 0 51 51"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor" />
                        </svg>
                        <svg class="h-4 w-4 text-blue-500" width="51" height="51" viewBox="0 0 51 51"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor" />
                        </svg>
                        <svg class="h-4 w-4 text-blue-500" width="51" height="51" viewBox="0 0 51 51"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <!-- End Star -->
                </div>
                <div>
                    <p>口コミを投稿</p>
                </div>
                <div>
                    <p>画像の追加</p>
                </div>
            </div>
        </div>
        <div class="row-start-4">
            <button class="bg-white hover:bg-blue-700 text-white font-bold py-2 px-20 rounded-full">
                口コミを投稿
            </button>
        </div>
    </div>
</x-guest-layout>
