{{-- @foreach ($product->productImage1 as $productImage)
<img src='{{ "/public/uploads/".$productImage->productImage1 }}' width="200px" height="200px" >
@endforeach --}}


@foreach (json_decode($product->productImage1) as $images)
     {{-- {{ $images }} --}}
     <img src='{{ "/public/uploads/".$images }}' width="200px" height="200px" >
@endforeach
