<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sản phẩm</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }
        body {
            background: #eaf3fb;
            color: #0b2b4b;
            padding: 32px;
        }
        .card {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            padding: 28px 32px;
            box-shadow: 0 16px 32px rgba(0,0,0,0.08);
        }
        h1 {
            font-size: 26px;
            margin-bottom: 16px;
        }
        form {
            display: grid;
            gap: 16px;
        }
        label {
            font-weight: 600;
            margin-bottom: 4px;
            display: block;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d7e4f3;
            border-radius: 12px;
            font-size: 15px;
        }
        button {
            padding: 12px 16px;
            border: 1px solid #ffc933;
            background: #ffc933;
            color: #0b2b4b;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.15s ease;
        }
        button:hover {
            filter: brightness(0.97);
        }
        a {
            color: #0b2b4b;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Thêm sản phẩm mới</h1>
        <form>
            <div>
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="price">Giá sản phẩm:</label>
                <input type="number" id="price" name="price" required>
            </div>
            <button type="submit">Thêm sản phẩm</button>
        </form>
    </div>
</body>
</html>