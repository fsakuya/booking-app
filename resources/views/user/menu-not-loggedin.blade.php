<x-guest-layout>
    <x-menu-header />
    <div class="text-center mt-24 text-3xl text-customBlue items-center">
        <a href="/" class="mb-4 block font-medium">Home</a>
        <a href="{{ route('user.register') }}" class="mb-4 block font-medium">Registration</a>
        <a href="{{ route('user.login') }}" class="mb-4 block font-medium">Login</a>
    </div>
    </div>
</x-guest-layout>
