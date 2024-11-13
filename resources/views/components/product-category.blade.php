@foreach ($list_product as $product_row)
<div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
    <x-product-card :productitem="$product_row"/>
</div>
@endforeach

