<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register Page</h1>
    <form method="POST" action="/register">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="repass">
        </div>

        <button type="submit">Register</button>
    </form>
</body>
</html>