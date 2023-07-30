<x-guest-layout>
    <div class="mb-20">
        <x-common-header />
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="max-w-sm mx-auto">
        <div
            class="border-none shadow-1 flex flex-col bg-white border rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div
                class="bg-customBlue border-b rounded-t-md py-3 px-4 md:py-3 md:px-5 dark:bg-gray-800 dark:border-gray-700">
                <p class="mt-1 text-lg text-white">
                    Login
                </p>
            </div>
            <div class="p-4 md:p-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('user.login') }}" novalidate>
                    @csrf
                    <div>
                        <div class="flex">
                            <div class="inset-y-0 left-0 flex items-end pointer-events-none">
                                <img src="/images/mail-icon.svg" alt="my-icon" class="mr-3 h-6 w-6 text-gray-400" />
                            </div>
                            <input id="email"
                                class="border-x-0 border-t-0 focus:ring-0 pb-0 pl-0 block w-full text-sm"
                                placeholder="Email" type="email" name="email" value="{{ old('email') }}"
                                required />
                        </div>
                    </div>
                    <div>
                        <div class="flex">
                            <div class="inset-y-0 left-0 flex items-end pointer-events-none z-20">
                                <img src="/images/password-icon.svg" alt="my-icon"
                                    class="mr-3 mt-4 h-6 w-6 text-gray-400" />
                            </div>
                            <input id="password"
                                class="border-x-0 border-t-0 focus:ring-0 pb-0 pl-0 mt-4 block w-full text-sm"
                                placeholder="Password" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 !bg-customBlue !font-normal">
                            {{ __('ログイン') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
