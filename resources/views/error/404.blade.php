<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page not found</title>
    <style>
        :root { --bg: #fafaf9; --card: #fff; --text: #1c1917; --muted: #78716c; --accent: #dc2626; --border: #e7e5e4; --radius: 0.5rem; --shadow: 0 1px 3px rgba(0,0,0,.08); }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--text); margin: 0; min-height: 100vh; padding: 2rem 1rem; line-height: 1.5; text-align: center; }
        .wrap { max-width: 32rem; margin: 0 auto; }
        .card { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); padding: 2.5rem; }
        .code { font-size: 4rem; font-weight: 700; color: var(--accent); margin: 0; line-height: 1; }
        h1 { font-size: 1.25rem; font-weight: 700; margin: 1rem 0 .5rem; }
        .sub { font-size: .875rem; color: var(--muted); margin-bottom: 1.5rem; }
        .btns { display: flex; flex-wrap: wrap; gap: .75rem; justify-content: center; }
        .btn { display: inline-block; padding: .625rem 1.25rem; font-size: .875rem; font-weight: 500; text-align: center; border-radius: var(--radius); cursor: pointer; text-decoration: none; transition: opacity .15s; }
        .btn-primary { background: #1c1917; color: #fff; border: none; }
        .btn-primary:hover { opacity: .9; }
        .btn-outline { background: transparent; color: var(--text); border: 1px solid var(--border); }
        .btn-outline:hover { background: #f5f5f4; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <p class="code">404</p>
            <h1>Page not found</h1>
            <p class="sub">The page you're looking for doesn't exist or was moved.</p>
            <div class="btns">
                <a href="/" class="btn btn-primary">Go home</a>
                <a href="/product" class="btn btn-outline">Products</a>
            </div>
        </div>
    </div>
</body>
</html>
