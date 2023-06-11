<x-guest-layout>
    <x-common-header />

    <div class="max-w-sm mx-auto">
        <div
            class="border-none shadow-1 flex flex-col bg-white border rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div
                class="bg-customBlue border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
                <p class="mt-1 text-lg text-white">
                    Registration
                </p>
            </div>
            <div class="p-4 md:p-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('user.register') }}">
                    @csrf
                    <div>
                        <div class="flex">
                            <div class="inset-y-0 left-0 flex items-center pointer-events-none">
                                <img src="/images/person-icon.svg" alt="my-icon"
                                    class="mr-3 mt-5 h-5 w-5 text-gray-400" />
                            </div>
                            <input id="name"
                                class="border-x-0 border-t-0 focus:ring-0 pb-1 pl-0 mt-5 block w-full text-sm"
                                placeholder="Username" type="text" name="name" :value="old('name')" required
                                autofocus />
                        </div>
                    </div>
                    <div>
                        <div class="flex">
                            <div class="inset-y-0 left-0 flex items-center pointer-events-none">
                                <img src="/images/mail-icon.svg" alt="my-icon"
                                    class="mr-3 mt-5 h-5 w-5 text-gray-400" />
                            </div>
                            <input id="email"
                                class="border-x-0 border-t-0 focus:ring-0 pb-1 pl-0 mt-5 block w-full text-sm"
                                placeholder="Email" type="email" name="email" :value="old('email')" required />
                        </div>
                    </div>
                    <div>
                        <div class="flex">
                            <div class="inset-y-0 left-0 flex items-center pointer-events-none z-20">
                                <img src="/images/password-icon.svg" alt="my-icon"
                                    class="mr-3 mt-5 h-5 w-5 text-gray-400" />
                            </div>
                            <input id="password"
                                class="border-x-0 border-t-0 focus:ring-0 pb-1 pl-0 mt-5 block w-full text-sm"
                                placeholder="Password" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 !bg-customBlue">
                            {{ __('登録') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
