<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký</h2>
    <form method="POST" action="{{ route('checksignin') }}">
        @csrf
        <label>Tên đăng nhập:</label>
        <input type="text" name="username"><br><br>

        <label>Mật khẩu:</label>
        <input type="password" name="password"><br><br>

        <label>Nhập lại mật khẩu:</label>
        <input type="password" name="repass"><br><br>

        <label>MSSV:</label>
        <input type="text" name="mssv"><br><br>

        <label>Lớp môn học:</label>
        <input type="text" name="lopmonhoc"><br><br>

        <label>Giới tính:</label>
        <select name="gioitinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>

        <button type="submit">Đăng ký</button>
</body>
</html>