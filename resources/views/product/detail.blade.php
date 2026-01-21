<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết sản phẩm</title>
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
            margin-bottom: 12px;
        }
        p {
            color: #4a6a85;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Chi tiết sản phẩm</h1>
        <p>ID: {{ $id }}</p>
    </div>
</body>
</html>