<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhập tuổi</title>
</head>
<body>
    <h2>Nhập tuổi</h2>
    <form method="POST" action="/age">
        @csrf
        <input type='text' name='age'>
        <button type="submit">Gửi</button>
    </form> 
</body>
</html>