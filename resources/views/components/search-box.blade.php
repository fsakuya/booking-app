<form method="POST" action="{{ route('user.list.search') }}"
    class="md:w-1/2 ms:w-full flex p-4 bg-white rounded border-solid border-gray-500 shadow-2">
    @csrf
    <select id="area" name="area" class=" font-semibold p-0 text-xs w-1/5 select border-0 max-w-xs">
        <option value="0">All area</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
    </select>
    <div class="border-r border-solid border-gray-300"></div>
    <select id="genre" name="genre" class=" font-semibold p-0 pl-2 text-xs w-1/5 select border-0 max-w-xs">
        <option value="0">All genre</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    <div class="flex  items-center border-r border-solid border-gray-300"></div>
    <svg class="h-4 w-4 ml-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
    <input id="shop_name" name="shop_name" type="text" placeholder="Search ..."
        class=" pl-2 border-0 p-0 text-xs w-3/5 input input-bordered max-w-xs" />
</form>
