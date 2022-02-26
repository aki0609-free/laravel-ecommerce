<x-tests.app>
  <x-slot name="header">
    Super Component
  </x-slot>
  Component1
  <x-tests.card title="Title" content="Content" :message="$message" />
  <x-tests.card title="Title" />
  <x-tests.card title="I wanna change css" class="bg-red-300" />

  <x-test-class-base classBaseMessage="test" />
</x-tests.app>