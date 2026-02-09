<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nhập tuổi</title>
    <style>
        :root { --bg: #fafaf9; --card: #fff; --text: #1c1917; --muted: #78716c; --accent: #dc2626; --border: #e7e5e4; --input-bg: #fff; --radius: 0.5rem; --shadow: 0 1px 3px rgba(0,0,0,.08); }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--text); margin: 0; min-height: 100vh; padding: 2rem 1rem; line-height: 1.5; }
        .wrap { max-width: 32rem; margin: 0 auto; }
        .card { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem; }
        h1 { font-size: 1.5rem; font-weight: 700; margin: 0 0 .5rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: .875rem; font-weight: 500; margin-bottom: .375rem; color: var(--text); }
        .form-group input { width: 100%; padding: .625rem .875rem; border: 1px solid var(--border); border-radius: var(--radius); background: var(--input-bg); font-size: 1rem; }
        .form-group input:focus { outline: none; border-color: var(--accent); box-shadow: 0 0 0 3px rgba(220,38,38,.2); }
        .btn { display: inline-block; padding: .625rem 1.25rem; font-size: .875rem; font-weight: 500; border-radius: var(--radius); cursor: pointer; border: none; background: #1c1917; color: #fff; transition: opacity .15s; }
        .btn:hover { opacity: .9; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h1>Nhập tuổi của bạn</h1>
            <form action="/age" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="age" placeholder="Nhập tuổi">
                </div>
                <button type="submit" class="btn">Gửi</button>
            </form>
        </div>
    </div>
</body>
</html>
