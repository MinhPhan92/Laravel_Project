<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bàn cờ</title>
    <style>
        :root { --bg: #fafaf9; --card: #fff; --text: #1c1917; --muted: #78716c; --accent: #dc2626; --border: #e7e5e4; --radius: 0.5rem; --shadow: 0 1px 3px rgba(0,0,0,.08); }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--text); margin: 0; min-height: 100vh; padding: 2rem 1rem; line-height: 1.5; }
        .wrap { max-width: 42rem; margin: 0 auto; }
        .card { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem; }
        h1 { font-size: 1.5rem; font-weight: 700; margin: 0 0 1rem; }
        table { border-collapse: collapse; }
        table td { width: 30px; height: 30px; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h1>Bàn cờ kích thước {{ $n }} x {{ $n }}</h1>
            <table border="1" cellspacing="0" cellpadding="0">
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    @if (($i + $j) % 2 == 0)
                        <td style="width: 30px; height: 30px; background-color: white;"></td>
                    @else
                        <td style="width: 30px; height: 30px; background-color: black;"></td>
                    @endif
                @endfor
            </tr>
        @endfor
            </table>
        </div>
    </div>
</body>
</html>
