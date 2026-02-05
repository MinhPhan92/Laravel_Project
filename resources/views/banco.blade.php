<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bàn cờ</title>
</head>
<body>
    <h1>Bàn cờ kích thước {{ $n }} x {{ $n }}</h1>
    <table border="1" cellspacing="0" cellpadding="5">
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
</body>
</html>