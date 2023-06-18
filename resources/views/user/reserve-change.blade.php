<x-guest-layout>
    <x-common-header />
    <section>
        <div class="container py-10 mx-auto flex md:flex-row flex-col">
            <div class="md:w-1/2 w-full">
                <div class="flex items-center mb-4">
                    <button onclick="location.href='{{ route('user.list.index') }}'"
                        class="mr-2 bg-white rounded-sm h-6 w-6 flex items-center justify-center shadow-2">
                        <span class="text-lg">&lt;</span>
                    </button>
                    <p class="text-2xl font-extrabold ">{{ $reservation->shop->name }}</p>
                </div>
                @if (empty($reservation->shop->image->filename))
                    <img class="object-cover object-center rounded mb-4" src="{{ asset('images/no_image.jpg') }}">
                @else
                    <img class="object-cover object-center rounded mb-4"
                        src="{{ asset('storage/shops/' . $reservation->shop->image->filename) }}">
                @endif
                <div>
                    <div class="flex mb-4">
                        <div class="text-sm badge badge-outline"><span>#</span>
                            @if ($reservation->shop->area_id == 1)
                                東京
                            @elseif ($reservation->shop->area_id == 2)
                                大阪
                            @elseif ($reservation->shop->area_id == 3)
                                福岡
                            @endif
                        </div>
                        <div class="text-sm badge badge-outline"><span>#</span>
                            @if ($reservation->shop->genre_id == 1)
                                イタリアン
                            @elseif ($reservation->shop->genre_id == 2)
                                ラーメン
                            @elseif ($reservation->shop->genre_id == 3)
                                寿司
                            @elseif ($reservation->shop->genre_id == 4)
                                焼肉
                            @elseif ($reservation->shop->genre_id == 5)
                                居酒屋
                            @endif
                        </div>
                    </div>
                    <p class="text-sm">{{ $reservation->shop->information }}</p>
                </div>
            </div>
            <div class="md:w-1/2 w-full bg-customBlue_2 rounded-md ml-20 flex flex-col">
                <h2 class="px-4 py-6 text-white text-xl font-extrabold title-font">予約変更</h2>
                <div class="px-4">
                  <form method="POST" action="{{ route('user.reserve.change', $reservation->id) }}">
                        @csrf
                        <div class="mb-2">
                            <input type="date" id="date" name="date" value="{{ $reservation->date }}"
                                class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="mb-2">
                            <input type="time" id="time" name="time" value="{{ $reservation->time }}"
                                class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="mb-2">
                            <input type="number" id="number" name="number" min="1" value="{{ $reservation->number }}"
                                class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700  transition-colors duration-200 ease-in-out">
                        </div>
                </div>
                <div class="mx-4 bg-customBlue rounded-md flex flex-col text-white text-sm text-left mb-4 p-2">
                    <table class="ml-2">
                        <tr>
                            <th class="w-1/5">Shop</th>
                            <td>{{ $reservation->shop->name }}</td>
                        </tr>
                        <tr>
                            <th class="w-1/5">Date</th>
                            <td id="table-date"></td>
                        </tr>
                        <tr>
                            <th class="w-1/5">Time</th>
                            <td id="table-time"></td>
                        </tr>
                        <tr>
                            <th class="w-1/5">Number</th>
                            <td id="table-number"></td>
                        </tr>
                    </table>
                </div>
                <input type="submit" value="予約変更する"
                    class="bg-customBlue_3 p-4 text-white w-full mt-auto mb-0 text-sm rounded-b-md  active:bg-blue-600 transition duration-150 ease-in-out">
            </div>
          </form>
        </div>
    </section>
    </div>
</x-guest-layout>
