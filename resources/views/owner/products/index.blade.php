<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <button onClick="location.href='{{ route('owner.products.create') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">REGISTER</button>
          <div class="flex flex-wrap">
            @foreach($ownerInfo as $owner)
            @foreach($owner->shop->product as $product)
            <div class="w-1/4 p-2 md:p-4">
              <a href="{{ route('owner.products.edit', ['product' => $product->id]) }}">
                <x-thumbnail filename="{{$product->imageFirst->filename ?? ''}}" type="products" />
                <div class="text-gray-700 text-xl text-center">{{ $product->name }}</div>
              </a>
            </div>
            @endforeach
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>