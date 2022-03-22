<p class="mb-4">{{ $uesr->name }}</p>

<p class="mb-4">Thank you for buying</p>

<h1>Content</h1>
@foreach($products as $product)
<ul class="mb-4">
  <li>Product Name: {{ $product['name'] }}</li>
  <li>Product Price: ${{ number_format($product['price']) }}</li>
  <li>Product Quantity: {{ $product['quantity'] }}</li>
  <li>Total Price: {{ number_format($product['price'] * $product['quantity']) }}</li>
</ul>
@endforeach