@php
if ($type === 'shops') {
$path = 'storage/shops/';
}
if ($type === 'products') {
$path = 'storage/products/';
}
@endphp

<div>
  @if(empty($filename))
  <img src="{{ asset('images/no_image.jpg') }}" alt="No Image">
  @else
  <img src="{{ asset($path.$filename) }}" alt="image">
  @endif
</div>