  <x-guest-layout>
      <x-common-header />

      <div class="flex">
          <div class="w-2/5">
          </div>
          <div class="w-2/5 pl-4 mb-6 font-extrabold text-2xl">
              <p>{{ $user->name }}さん</p>
          </div>
      </div>
      <div class="flex">
          <div class="w-2/5 pl-4">
              <p class="mb-4 font-extrabold text-xs">予約状況</p>
              @foreach ($reservedShops as $reservation)
                  <div class="w-4/5 bg-customBlue rounded-md p-6 text-white mb-4 text-xs">
                      <div class="flex mb-4">
                          <div class="w-1/5">
                              <img class="h-4 w-4 text-white" src="{{ asset('images/clock-icon.svg') }}">
                          </div>
                          <div class="w-3/5">予約{{ $loop->iteration }}</div>
                          <div class="w-1/5 text-right">
                              <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <circle cx="12" cy="12" r="10" />
                                  <line x1="15" y1="9" x2="9" y2="15" />
                                  <line x1="9" y1="9" x2="15" y2="15" />
                              </svg>
                          </div>
                      </div>
                      <table>
                          <tr>
                              <th class="w-1/5 py-2 text-left font-mono">Shop</th>
                              <td>{{ $reservation['shop']->name }}</td>
                          </tr>
                          <tr>
                              <th class="w-1/5 py-2 text-left font-mono">Date</th>
                              <td id="table-date">{{ $reservation['date'] }}</td>
                          </tr>
                          <tr>
                              <th class="w-1/5 py-2 text-left font-mono">Time</th>
                              <td id="table-time">{{ $reservation['time'] }}</td>
                          </tr>
                          <tr>
                              <th class="w-1/5 py-2 text-left font-mono">Number</th>
                              <td id="table-number">{{ $reservation['number'] }}</td>
                          </tr>
                      </table>
                  </div>
              @endforeach
          </div>

          <div class="w-3/5 pl-4">
              <p class="mb-4 font-extrabold text-md">お気に入り店舗</p>
              <div class="flex flex-wrap">
                  @foreach ($favorites as $favorite)
                      <div
                          class="md:w-2/5 mr-4 mb-4 bg-white shadow-2 border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                          @if (empty($favorite->image->filename))
                              <img class="lg:h-48 md:h-36 w-full h-full object-contain"
                                  src="{{ asset('images/no_image.jpg') }}">
                          @else
                              <img class="lg:h-48 md:h-36 w-full h-full object-contain"
                                  src="{{ asset('storage/shops/' . $favorite->image->filename) }}">
                          @endif
                          <div class="p-2">
                              <h1 class="title-font text-lg font-medium text-gray-900">{{ $favorite->name }}
                              </h1>
                              <div class="p-1 md:p-2">
                                  <div class="flex">
                                      <div class="text-sm badge badge-outline"><span>#</span>
                                          @if ($favorite->area_id == 1)
                                              東京
                                          @elseif ($favorite->area_id == 2)
                                              大阪
                                          @elseif ($favorite->area_id == 3)
                                              福岡
                                          @endif
                                      </div>
                                      <div class="text-sm badge badge-outline"><span>#</span>
                                          @if ($favorite->genre_id == 1)
                                              イタリアン
                                          @elseif ($favorite->genre_id == 2)
                                              ラーメン
                                          @elseif ($favorite->genre_id == 3)
                                              寿司
                                          @elseif ($favorite->genre_id == 4)
                                              焼肉
                                          @elseif ($favorite->genre_id == 5)
                                              居酒屋
                                          @endif
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-between pt-2">
                                      <a href="{{ route('user.list.show', $favorite->id) }}"
                                          class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                          詳しく見る
                                      </a>
                                      <button class="favorite-button w-6 h-6 p-0" data-shop-id="{{ $favorite->id }}">
                                          @if (Auth::user() && Auth::user()->favorites->contains($favorite->id))
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
          </div>

      </div>

  </x-guest-layout>
