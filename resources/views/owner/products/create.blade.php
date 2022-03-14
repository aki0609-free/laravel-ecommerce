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
          <form method="post" action="{{ route('owner.products.store') }}">
            @csrf
            <div class="-m-2">
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Product Name</label>
                  <input required type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="info" class="leading-7 text-sm text-gray-600">Product Information</label>
                  <textarea required rows="10" type="text" id="info" name="info" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  {{ old('information') }}
                  </textarea>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                  <input required type="number" id="price" name="price" value="{{ old('price') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="sort_order" class="leading-7 text-sm text-gray-600">Sort Order</label>
                  <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="quantity" class="leading-7 text-sm text-gray-600">Initial Stock</label>
                  <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <span>Input: 0 ~ 99</span>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <select name="shop_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($shops as $shop)
                    <option value="{{ $shop->id }}">
                      {{ $shop->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <select name="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach($categories as $category)
                    <optgroup label="{{$category->name}}">
                      @foreach($category->secondary as $secondary)
                      <option value="{{$secondary->id}}">
                        {{ $secondary->name }}
                      </option>
                      @endforeach
                      @endforeach
                  </select>
                </div>
              </div>
              <x-select-image name="image1" :images="$images" />
              <x-select-image name="image2" :images="$images" />
              <x-select-image name="image3" :images="$images" />
              <x-select-image name="image4" :images="$images" />
              <x-select-image name="image5" :images="$images" />
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative flex justify-around">
                  <div>
                    <input type="radio" name="is_selling" class=mr-2" value="1" checked>On Sell
                  </div>
                  <div>
                    <input type="radio" name="is_selling" class="mr-2" value="0">On Stop
                  </div>
                </div>
              </div>
              <div class="p-2 w-full flex justify-around">
                <button type="submit" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">REGISTER</button>
                <button type="button" onClick="location.href='{{ route('owner.products.index') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">BACK</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    'use strict'
    const images = document.querySelectorAll('.image')
    images.forEach(image => {
      image.addEventListener('click', function(e) {
        const imageName = e.target.dataset.id.substr(0, 6);
        const imageId = e.target.dataset.replace(imageName + '_', "");
        const imageFile = e.target.dataset.file;
        const imagePath = e.target.dataset.path;
        const modal = e.target.dataset.modal;

        document.getElementById(imageFile + '_thumbnail').src = imagePath + '/' + imageFile;
        document.getElementById(imageName + '_hidden').value = imageId;
        MicroModal.close(modal);
      })
    })
  </script>
</x-app-layout>