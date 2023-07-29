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
      <div class="flex flex-wrap mx-[-1rem] ">
              <div class="md:w-1/3 px-[1rem] py-3 mx-auto">
                  <div class=" bg-white shadow-2 border-opacity-60 rounded-lg overflow-hidden">
                      @if (empty($reviewShop->image->filename))
                          <img class="w-full h-full overflow-hidden object-cover" src="{{ asset('images/no_image.jpg') }}">
                      @else
                          <img class="w-full h-full overflow-hidden object-cover" src="{{ asset('storage/shops/' . $reviewShop->image->filename) }}">
                      @endif
                      <div class="p-2">
                          <h1 class="title-font text-lg font-medium text-gray-900">{{ $reviewShop->name }}</h1>
                          <div class="p-1 md:p-2">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                              {{-- 評価フォーム --}}
                              <div class="my-4">
                                  <form method="POST"
                                      action="{{ route('user.mypage.storeReview', ['id' => $reviewShop->id]) }} " novalidate>
                                      @csrf
                                      <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                      <div class="mb-2">
                                          <label for="number">評価</label>
                                          <input type="number" id="number" name="number" min="1" max="5"
                                              class="py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                                      </div>
                                      <div class="mb-2">
                                          <label for="text">コメント</label>
                                          <textarea type="text" id="text" name="text"
                                              class="text-left py-1 px-1 text-xs w-full bg-white rounded border border-gray-300 outline-none text-gray-700 transition-colors duration-200 ease-in-out">
                                            </textarea>
                                      </div>
                                      <div class="flex items-center justify-between pt-2">
                                          <button type="submit"
                                              class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                              投稿する
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      </div>
  </section>
</x-guest-layout>
