<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập tuổi</title>
</head>
<body>
    <h1>Nhập tuổi của bạn</h1>

    <form action="/age" method="POST">
        @csrf
        <input type="text" name="age" placeholder="Nhập tuổi">
        <button type="submit">Gửi</button>
    </form>
</body>
</html>
