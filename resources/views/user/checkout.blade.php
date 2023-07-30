<x-guest-layout>
    <x-common-header />

    <section>
        <div class="flex flex-wrap mx-[-1rem]">
            @foreach ($checkoutReservations as $reservation)
                <div class="md:w-1/4 px-[1rem] py-3">
                    <div
                        class=" bg-white shadow-2 border-opacity-60 rounded-lg overflow-hidden">
                        @if (empty($reservation->shop->image->filename))
                            <img class="w-full h-full overflow-hidden object-cover"
                                src="{{ asset('images/no_image.jpg') }}">
                        @else
                            <img class="w-full h-full overflow-hidden object-cover"
                                src="{{ asset('storage/shops/' . $reservation->shop->image->filename) }}">
                        @endif
                        <div class="p-2">
                            <h1 class="title-font text-lg font-medium text-gray-900">{{ $reservation->shop->name }}</h1>
                            <div class="p-1 md:p-2">
                                <div class="flex">
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
                                {{-- 金額入力フォーム --}}
                                <div class="my-4">
                                    <form method="POST"
                                        action="{{ route('user.mypage.processCheckout', ['id' => $reservation->id]) }}" required>
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <div class="mb-2">
                                            <label for="price">支払い金額</label>
                                            <div class="flex">
                                                <input type="number" id="price" name="price" min="0"
                                                    class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                                                <span class="ml-2 text-sm">円</span>
                                            </div>
                                        </div>
                                </div>
                                <div class="flex items-center justify-between pt-2">
                                    <button type="submit"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        支払う
                                    </button>
                                    </form>
                                    <button class="favorite-button w-6 h-6 p-0" data-shop-id="{{ $reservation->shop->id }}">
                                        @if (Auth::user() && Auth::user()->favorites->contains($reservation->shop->id))
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
