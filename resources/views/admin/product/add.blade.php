<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
</head>
<body>
    <form action='/product/store' method='post'>
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br><br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price"><br><br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock"><br><br>
        <button type='submit'>Add Product</button>
    </form>
</body>
</html>