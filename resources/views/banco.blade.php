<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bàn cờ vua</title>
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
            max-width: 960px;
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
        table {
            border-collapse: collapse;
            width: fit-content;
            border: 1px solid #d7e4f3;
        }
        td {
            width: 46px;
            height: 46px;
        }
        .white {
            background-color: #ffffff;
        }
        .black {
            background-color: #0b2b4b;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Bàn cờ vua {{ $n }}x{{ $n }}</h1>
        <table>
            @for($i = 0; $i < $n; $i++)
                <tr>
                    @for($j = 0; $j < $n; $j++)
                        <td class="{{ ($i + $j) % 2 === 0 ? 'white' : 'black' }}"></td>
                    @endfor
                </tr>
            @endfor
        </table>
    </div>
</body>
</html>