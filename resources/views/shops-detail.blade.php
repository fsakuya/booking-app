<x-guest-layout>
    <div class="container m-auto grid grid-cols-2 gap-10">
        <div class="row-start-1">
            <x-common-header />
        </div>
        <div class="max-w-lg bg-customBlue_2 rounded-md row-start-1 row-end-3 col-span-2 flex flex-col">
            <h2 class="px-6 py-6 text-white text-xl font-extrabold title-font">予約</h2>
            <div class="pl-6 pr-10">
                <form method="POST" action="{{ route('user.reserve.store', ['id' => $shop->id]) }}" novalidate>
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="mb-4">
                        <input type="date" id="date" name="date"
                            class="py-1 px-1 text-xs w-1/3 bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="mb-4 relative">
                        <input type="time" id="time" name="time"
                            class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                        {{-- <img class="w-3 h-3 absolute top-1/2 right-1 transform -translate-y-1/2 pointer-events-none"
                            src="{{ asset('images/icon-arrow.svg') }}"> --}}
                    </div>
                    <div class="mb-4 relative">
                        <select id="number" name="number"
                            class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                            <option value="">人数を選択してください</option>
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                            <option value="7">7人</option>
                            <option value="8">8人</option>
                            <option value="9">9人</option>
                            <option value="10">10人</option>
                        </select>
                        {{-- <img class="w-3 h-3 absolute top-1/2 right-1 transform -translate-y-1/2 pointer-events-none"
                            src="{{ asset('images/icon-arrow.svg') }}"> --}}
                    </div>
            </div>
            <div class="w-5/6 mx-6 bg-customBlue_3 rounded-md flex flex-col text-white text-sm text-left mb-4 p-2">
                <table class="ml-2">
                    <tr>
                        <th class="w-1/5 font-light">Shop</th>
                        <td>{{ $shop->name }}</td>
                    </tr>
                    <tr>
                        <th class="w-1/5 font-light">Date</th>
                        <td id="table-date"></td>
                    </tr>
                    <tr>
                        <th class="w-1/5 font-light">Time</th>
                        <td id="table-time"></td>
                    </tr>
                    <tr>
                        <th class="w-1/5 font-light">Number</th>
                        <td id="table-number"></td>
                    </tr>
                </table>
            </div>
            <x-auth-validation-errors class="p-4 m-4 bg-white items-center" :errors="$errors" />
            <input type="submit" value="予約する"
                class=" bg-customBlue_4 p-4 text-white w-full mt-auto mb-0 text-sm rounded-b-md  active:bg-blue-600 transition duration-150 ease-in-out">
            </form>
        </div>
        <div class="row-start-2 mr-10">
            <div class="">
                <div class="flex items-center mb-4">
                    <button onclick="location.href='{{ route('user.list.index') }}'"
                        class="mr-2 bg-white rounded-sm h-6 w-6 flex items-center justify-center shadow-2">
                        <span class="text-lg">&lt;</span>
                    </button>
                    <p class="text-2xl font-extrabold ">{{ $shop->name }}</p>
                    <div>
                        <form method="get" action="{{ route('user.list.review', $shop->id) }}">
                            @csrf
                            <button type="submit"
                                class="ml-10 text-xs py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                評価を見る
                            </button>
                        </form>
                    </div>
                </div>
                @if (empty($shop->image->filename))
                    <img class="object-cover object-center rounded mb-4" src="{{ asset('images/no_image.jpg') }}">
                @else
                    <img class="object-cover object-center rounded mb-4"
                        src="{{ asset('storage/shops/' . $shop->image->filename) }}">
                @endif
                <div>
                    <div class="flex mb-4">
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
                    <p class="text-sm mb-4">{{ $shop->information }}</p>
                    <form method="get" action="{{ route('user.reviews.create', $shop->id) }}">
                        <button type="submit" class="text-sm underline bg-transparent border-none">口コミを投稿する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
