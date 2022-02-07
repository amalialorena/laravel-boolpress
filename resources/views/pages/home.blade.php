<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('/js/app/js')}}"></script>
    <title>Login</title>
</head>
<body id="app">
hello from home

@auth
<h1>{{ Auth::user() -> name }}</h1>
<a class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a>
@else

<h1>login/register</h1>


    <h2>Register:</h2>
    <form action="{{ route('register') }}" method="POST">
        @method('POST')
        @csrf

        <label for="name">name</label>
        <input type="text" name="name" value="abc"><br>
        <label for="email">email</label>
        <input type="text" name="email" value="abc@mail.com"><br>
        <label for="password">Password</label>
        <input type="password" name="password" value="password"><br>
        <label for="password-confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" value="password"><br>
        <input type="submit" value="REGISTER">
    </form>

    <h2>Login:</h2>
    <form action="{{ route('login') }}" method="POST">
        @method('POST')
        @csrf

        <label for="email">email</label>
        <input type="text" name="email"><br>
        <label for="password">Password</label>
        <input type="password" name="password"><br>
        <input type="submit" value="LOGIN">
    </form>
    @endauth
</body>
</html>
