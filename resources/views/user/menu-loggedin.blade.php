<x-guest-layout>
    <x-menu-header />
    <div class="text-center mt-24 text-3xl text-customBlue items-center">
        <a href="/" class="mb-4 block">Home</a>
        <div class="mb-4 block">
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
        <a href="" class="mb-4 block">Mypage</a>
    </div>
    </div>
</x-guest-layout>
