<x-guest-layout>
    <x-common-header />
    <div class="max-w-md mx-auto mt-16">
        <div
            class="py-20 px-10 border-none shadow-2 flex flex-col bg-white border rounded-sm dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-center">
                <p class="text-2xl">お支払いが完了しました。</p>
            </div>
            <div class="flex items-center mt-10 mb-10">
                <button onclick="location.href='/mypage'"
                    class="mx-auto bg-customBlue items-center px-4 py-2 border border-transparent rounded-md text-xs text-white hover:bg-gray-700 active:bg-gray-900 disabled:opacity-25 transition ease-in-out duration-150">
                    戻る
                </button>
            </div>
        </div>
    </div>
</x-guest-layout>
