<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">予約一覧</h1>
            </div>
            <div class="w-full mx-auto overflow-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 ">
                                ユーザー名</th>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                予約日</th>
                            <th
                                class="w-1/8 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                予約時間</th>
                            <th
                                class="w-1/4 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                人数</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="w-1/8 px-2 py-1">{{ $reservation->user->name }}</td>
                                <td class="w-1/8 px-2 py-1">{{ $reservation->date }}</td>
                                <td class="w-1/8 px-2 py-1">{{ $reservation->time }}</td>
                                <td class="w-1/8 px-2 py-1">{{ $reservation->number }}</td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center pl-4 mt-10 w-full mx-auto">
                <a href='/owner/shops' class=" text-blue-700 border-b-2 border-blue-700">戻る</a>
            </div>
        </div>
    </section>

</x-guest-layout>
