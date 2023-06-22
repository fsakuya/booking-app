<x-guest-layout>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">店舗代表者一覧</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th
                                class="w-1/5 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                店舗ID</th>
                            <th
                                class="w-2/5 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                名前</th>
                            <th
                                class="w-2/5 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                メールアドレス</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($owners as $owner)
                            <tr>
                                <td class="px-4 py-3">{{ $owner->id }}</td>
                                <td class="px-4 py-3">{{ $owner->name }}</td>
                                <td class="px-4 py-3">{{ $owner->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center pl-4 mt-10 lg:w-2/3 w-full mx-auto">
                <button
                    class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規作成
                </button>
            </div>
        </div>
    </section>

</x-guest-layout>
