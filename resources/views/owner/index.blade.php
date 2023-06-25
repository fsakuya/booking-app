<x-guest-layout>

  <div class="flex flex-col items-center justify-center min-h-screen text-3xl text-blue-700 font-bold">
      <a href={{ route('owner.shops')}} class="block mb-4">
          <p>店舗情報</p>
      </a>
      <a href={{ route('owner.showReservations')}} class="block mb-4">
          <p>予約一覧</p>
      </a>
      <a href={{ route('owner.showCode')}} class="block mb-4">
          <p>QRコード照会</p>
      </a>
  </div>

</x-guest-layout>
