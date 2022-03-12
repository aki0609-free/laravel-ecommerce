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
          <form method="post" action="{{ route('owner.images.update', ['image' => $image->id]) }}">
            @csrf
            @method('put')
            <div class="-m-2">
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                  <input type="text" value="{{$image->title}}" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="w-32">
                  <x-thumbnail :filename="$image->filename" type="products" />
                </div>
              </div>
            </div>
            <div class="p-2 w-full flex justify-around">
              <button type="submit" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Register</button>
              <button type="button" onClick="location.href='{{ route('owner.images.index') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">BACK</button>
            </div>
          </form>
          <form id="delete_{{$image->id}}" method="post" action="{{ route('owner.images.destroy', ['image' => $image->id]) }}">
            @csrf
            @method('delete')
            <div class="md:px-4 py-3">
              <a href="#" data-id="{{ $image->id }}" onClick="deleteImage(this)" class="bg-red-200 border-0 py-2 px-4 focus:outline-none hover:bg-red-400 rounded">DELETE</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function deleteImage(e) {
      'use strict';
      if (confirm('Are you sure to delete this ?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
      }
    }
  </script>
</x-app-layout>