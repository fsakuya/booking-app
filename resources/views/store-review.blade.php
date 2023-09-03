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
            <form action="{{ route('user.reviews.store', ['id' => $shop->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <div class="mb-6">
                        <p>体験を評価してください</p>
                        <div class="rate-form">
                            <input id="star5" type="radio" name="rate" value="5">
                            <label for="star5">★</label>
                            <input id="star4" type="radio" name="rate" value="4">
                            <label for="star4">★</label>
                            <input id="star3" type="radio" name="rate" value="3">
                            <label for="star3">★</label>
                            <input id="star2" type="radio" name="rate" value="2">
                            <label for="star2">★</label>
                            <input id="star1" type="radio" name="rate" value="1">
                            <label for="star1">★</label>
                        </div>
                    </div>
                    <div class="mb-6">
                        <p>口コミを投稿</p>
                        <textarea id="text" name="text" rows="4"
                            class="mt-3 block p-2.5 w-full text-xs text-gray-900 bg-gray-100 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="カジュアルな夜のお出かけにおすすめのスポット"></textarea>
                        <p class="text-2xs text-right">0/400 (最高文字数)</p>
                    </div>
                    <div class="mb-6">
                        <p>画像の追加</p>
                        <div id="image-upload" class="dropzone border-none mt-3">
                            <div class="dz-default dz-message">
                                <span class="dz-button text-sm">クリックして写真を追加<br>またはドラッグアンドドロップ</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row-start-4 col-span-2 mx-auto">
            <button type="submit"
                class="text-xs bg-white hover:bg-blue-700 hover:text-white text-black  py-2 px-60 rounded-full ">
                口コミを投稿
            </button>
        </div>
        </form>
        <script type="text/javascript">
            Dropzone.autoDiscover = false;
            new Dropzone("#image-upload", {
                thumnailWidth: 200,
                maxFilesize: 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
            });
        </script>
</x-guest-layout>
