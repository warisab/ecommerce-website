<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('backend/login-style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="background">
            
            <div class="box">
                <form class="form" method="post" action="{{ route('admin.check') }}">
                    @if(Session::get('fail'))
                    {{ session::get('fail') }}
                    @endif
                    @csrf
                    <input type="text" class="username" placeholder="Username" required  name="Username" value="{{ old('Username') }}">
                    
                    <input type="password" class="password" placeholder="Password" required name="Password" value="{{ old('Password') }}">
                    @error('password')
                  
                @enderror
                    <input type="submit" class="button" value="Login">
                </form>
            </div>
        </div>
    </main>
</body>
</html>