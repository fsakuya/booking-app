<x-guest-layout>
  <x-common-header />

  <section class="text-gray-600 body-font">
      <div class="container px-5 py-10 mx-auto">
          <div class="flex flex-wrap w-full mb-6 flex-col items-center text-center">
              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{$shop->name}}　評価一覧</h1>
          </div>
          @foreach ($reviews as $reviews)
              <div class="flex justify-center">
                  <div class="xl:w-1/2 md:w-1/1 p-4">
                      <div class="border border-gray-200 p-6 rounded-lg bg-white overflow-auto">
                          <h2 class="text-lg text-gray-900 font-medium title-font mb-2">評価：{{ $reviews->rating }}</h2>
                          <p class="leading-relaxed text-base break-words">コメント：{{ $reviews->comment }}</p>
                          <p class="leading-relaxed text-base">投稿日：{{ $reviews->created_at->format('Y-m-d') }}</p>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
  </section>
</x-guest-layout>
