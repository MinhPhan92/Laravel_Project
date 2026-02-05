<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <form action='/products/{{ $product->id }}' method='post'>
        @method('PUT')
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}"><br><br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="{{ $product->price }}"><br><br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="{{ $product->stock }}"><br><br>
        <button type='submit'>Update Product</button>
    </form>
</body>
</html>