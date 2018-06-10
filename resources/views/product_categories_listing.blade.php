<html>


<h1>Product Listing Page</h1>


@foreach ($product_categories as $category)
    <p>This is {{ $category->id }}</p>
@endforeach

</html>