<x-guest-layout>
    <section class="text-gray-600 body-font">
        @if (session('message'))
            <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">店舗一覧</h1>
            </div>
            <div class="w-full mx-auto overflow-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 ">
                                店舗名</th>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                エリア</th>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                ジャンル</th>
                            <th
                                class="w-1/4 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                詳細</th>
                            <th
                                class="w-1/4 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                画像</th>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $shop)
                            <tr>
                                <td class="w-1/8 px-2 py-1">{{ $shop->name }}</td>
                                <td class="w-1/8 px-2 py-1">{{ $shop->area_id }}</td>
                                <td class="w-1/8 px-2 py-1">{{ $shop->genre_id }}</td>
                                <td class="w-1/4 px-2 py-1 overflow-hidden overflow-ellipsis">
                                    {{ $shop->information }}
                                </td>
                                <td class="w-1/4 px-2 py-1">
                                    @if (empty($shop->image->filename))
                                        <img class="lg:h-48 md:h-36 w-full h-full object-contain"
                                            src="{{ asset('images/no_image.jpg') }}">
                                    @else
                                        <img class="lg:h-48 md:h-36 w-full h-full object-contain"
                                            src="{{ asset('storage/shops/' . $shop->image->filename) }}">
                                    @endif
                                </td>
                                <td class="w-1/8 px-2 py-1"><a href='{{ route('owner.edit') }}'
                                        class=" text-blue-700 border-b-2 border-blue-700">編集</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center pl-4 mt-10 w-full mx-auto">
                <button onclick="location.href='{{ route('owner.create') }}'"
                    class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規作成
                </button>
            </div>
        </div>
    </section>

</x-guest-layout>
