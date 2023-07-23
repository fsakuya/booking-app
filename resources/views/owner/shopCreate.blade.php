<x-guest-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto">
            <p class="mb-4 text-xl text-center">新規登録</p>
            <div class="p-6 bg-white">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />  
                <form method="post" action="{{ route('owner.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">店名 ※必須</label>
                            <input type="text" id="name" name="name" value="" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="area" class="leading-7 text-sm text-gray-600">エリア ※必須</label>
                            <select id="area" name="area" value="" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="1">東京</option>
                                <option value="2">大阪</option>
                                <option value="3">福岡</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="genre" class="leading-7 text-sm text-gray-600">ジャンル ※必須</label>
                            <select id="genre" name="genre" value="" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="1">イタリアン</option>
                                <option value="2">ラーメン</option>
                                <option value="3">寿司</option>
                                <option value="4">焼肉</option>
                                <option value="5">居酒屋</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="information" class="leading-7 text-sm text-gray-600">店舗詳細 ※必須</label>
                            <textarea id="information" name="information" rows="10" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('information') }}</textarea>
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg">
                        </div>
                    </div>
                    <div class="flex justify-center pl-4 mt-10 w-full mx-auto">
                      <button type="submit"
                          class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規作成
                      </button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
