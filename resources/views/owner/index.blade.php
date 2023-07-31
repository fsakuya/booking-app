<x-guest-layout>

    <div class="flex flex-col items-center justify-center min-h-screen text-3xl text-blue-700 font-bold">
        <a href={{ route('owner.shops') }} class="block mb-4">
            <p>店舗情報</p>
        </a>
        <a href={{ route('owner.showCode') }} class="block mb-4">
            <p>QRコード照会</p>
        </a>
        <div>
            <form method="POST" action="{{ route('owner.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

</x-guest-layout>
