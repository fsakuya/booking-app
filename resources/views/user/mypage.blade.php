<div>
    <h2>お気に入りの店舗</h2>
    @foreach ($favorites as $favorite)
        <div>
            <h3>{{ $favorite->name }}</h3>
            <!-- 他の店舗情報を表示 -->
        </div>
    @endforeach
</div>

<div>
    <h2>予約した店舗</h2>
    @foreach ($reservedShops as $reservation)
        <div>
          <h3>{{ $reservation['shop']->name }}</h3>
          <p>予約日：{{ $reservation['date'] }}</p>
          <p>予約時間：{{ $reservation['time'] }}</p>
          <p>人数：{{ $reservation['number'] }}</p>
            <!-- 他の店舗情報を表示 -->
        </div>
    @endforeach
</div>
