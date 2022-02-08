<header>
    <h1>Blog</h1>
    @auth
        <h1>Welcome back {{ Auth::user()->name }}</h1>
        <a class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a> 
    @else

        <h1>login/register</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
</header>
