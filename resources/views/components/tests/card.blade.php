@props([
'title',
'message' => 'initial',
'content' => 'initial'
])

<div {{ $attributes->merge([
    'class' => 'border-2 shadow-md w-1/4 p-2'
  ]) }}>
  <div>{{ $title }}</div>
  <div>Image</div>
  <div>{{ $content }}</div>
  <div>{{ $message }}</div>
</div>