<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <style>
        :root { --bg: #fafaf9; --card: #fff; --text: #1c1917; --muted: #78716c; --accent: #dc2626; --border: #e7e5e4; --input-bg: #fff; --radius: 0.5rem; --shadow: 0 1px 3px rgba(0,0,0,.08); }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--text); margin: 0; min-height: 100vh; padding: 2rem 1rem; line-height: 1.5; }
        .wrap { max-width: 32rem; margin: 0 auto; }
        .card { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem; }
        h1 { font-size: 1.5rem; font-weight: 700; margin: 0 0 .25rem; }
        .sub { font-size: .875rem; color: var(--muted); margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: .875rem; font-weight: 500; margin-bottom: .375rem; color: var(--text); }
        .form-group input, .form-group select { width: 100%; padding: .625rem .875rem; border: 1px solid var(--border); border-radius: var(--radius); background: var(--input-bg); font-size: 1rem; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: var(--accent); box-shadow: 0 0 0 3px rgba(220,38,38,.2); }
        .btn { display: inline-block; width: 100%; padding: .625rem 1rem; font-size: .875rem; font-weight: 500; text-align: center; border-radius: var(--radius); cursor: pointer; border: none; transition: opacity .15s; }
        .btn-primary { background: #1c1917; color: #fff; }
        .btn-primary:hover { opacity: .9; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h1>Sign In</h1>
            <p class="sub">Register with your student information.</p>
            <form method="POST" action="{{ route('checksignin') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label for="repass">Confirm Password</label>
                    <input type="password" name="repass" id="repass" required placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label for="mssv">MSSV</label>
                    <input type="text" name="mssv" id="mssv" required placeholder="VD: 0114567">
                </div>
                <div class="form-group">
                    <label for="lopmonhoc">Lớp môn học</label>
                    <input type="text" name="lopmonhoc" id="lopmonhoc" required placeholder="VD: 67pm1">
                </div>
                <div class="form-group">
                    <label for="gioitinh">Giới tính</label>
                    <select name="gioitinh" id="gioitinh" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
