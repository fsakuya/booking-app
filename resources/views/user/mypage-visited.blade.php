@foreach ($visitedShops as $shop)
    <p>{{ $shop->shop->name }}</p>
@endforeach
