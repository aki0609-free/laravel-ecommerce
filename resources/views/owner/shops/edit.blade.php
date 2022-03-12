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
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <form method="post" action="{{ route('owner.shops.update', ['shop' => $shop->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="-m-2">
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Shop Name</label>
                  <input required type="text" id="name" name="name" value="{{ $shop->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="info" class="leading-7 text-sm text-gray-600">Shop Information</label>
                  <textarea required rows="10" type="text" id="info" name="info" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  {{ $shop->information }}
                  </textarea>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="w-32">
                  <x-thumbnail :filename="$shop->filename" type="shops" />
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                  <input type="file" id="image" name="image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative flex justify-around">
                  <div>
                    <input type="radio" name="is_selling" class=mr-2" value="1" @if($shop->is_selling === 1){ checked } @endif >On Sell
                  </div>
                  <div>
                    <input type="radio" name="is_selling" class="mr-2" value="0" @if($shop->is_selling === 0){ checked } @endif >On Stop
                  </div>
                </div>
              </div>
            </div>
            <div class="p-2 w-full flex justify-around">
              <button type="submit" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">UPDATE</button>
              <button type="button" onClick="location.href='{{ route('owner.shops.index') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">BACK</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>