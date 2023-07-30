{{-- {{ dd($visitedShops) }} --}}

<x-guest-layout>
    <div class="flex justify-between">
        <x-common-header />
    </div>
    {{-- フラッシュメッセージ --}}
    @if (session('success'))
        <div class="alert alert-success text-center bg-red-400 p-4 text-md m-2">
            {{ session('success') }}
        </div>
    @endif
    {{-- フラッシュメッセージ終わり --}}
    <section>
        <div class="flex flex-wrap mx-[-1rem]">
            @foreach ($visitedShops as $shop)
                <div class="md:w-1/4 px-[1rem] py-3">
                    <div
                        class=" bg-white shadow-2 border-opacity-60 rounded-lg overflow-hidden">
                        @if (empty($shop->shop->image->filename))
                            <img class="w-full h-full overflow-hidden object-cover"
                                src="{{ asset('images/no_image.jpg') }}">
                        @else
                            <img class="w-full h-full overflow-hidden object-cover"
                                src="{{ asset('storage/shops/' . $shop->shop->image->filename) }}">
                        @endif
                        <div class="p-2">
                            <h1 class="title-font text-lg font-medium text-gray-900">{{ $shop->shop->name }}</h1>
                            <div class="p-1 md:p-2">
                                <div class="flex">
                                    <div class="text-sm badge badge-outline"><span>#</span>
                                        @if ($shop->shop->area_id == 1)
                                            東京
                                        @elseif ($shop->shop->area_id == 2)
                                            大阪
                                        @elseif ($shop->shop->area_id == 3)
                                            福岡
                                        @endif
                                    </div>
                                    <div class="text-sm badge badge-outline"><span>#</span>
                                        @if ($shop->shop->genre_id == 1)
                                            イタリアン
                                        @elseif ($shop->shop->genre_id == 2)
                                            ラーメン
                                        @elseif ($shop->shop->genre_id == 3)
                                            寿司
                                        @elseif ($shop->shop->genre_id == 4)
                                            焼肉
                                        @elseif ($shop->shop->genre_id == 5)
                                            居酒屋
                                        @endif
                                    </div>
                                </div>
                                {{-- 評価フォーム --}}
                                <div class="my-4">
                                    <form method="get"
                                        action="{{ route('user.mypage.showReviewShops', ['id' => $shop->id]) }}">
                                        @csrf

                                </div>
                                <div class="flex items-center justify-between pt-2">
                                    <button type="submit"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        評価する
                                    </button>
                                    </form>
                                    <button class="favorite-button w-6 h-6 p-0" data-shop-id="{{ $shop->shop->id }}">
                                        @if (Auth::user() && Auth::user()->favorites->contains($shop->shop->id))
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
            @endforeach
        </div>
    </section>
</x-guest-layout>
