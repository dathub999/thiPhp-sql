<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('user/css/style2.css')}}">
    <title>Sign In</title>
</head>
<body>
    <div class="water-border">
    <form method="post" action="{{url('login/signincheck')}}">
    @csrf
        <div class="container">
            <div class="top-header">
                <span>Have an account?&nbsp;<label><a href="{{url('login/signup')}}">Sign up</a></label> </span>
                <header>Login</header>
            </div>
            <div class="input-field">
                <input type="text" class="input" name="username" placeholder="Username" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" class="input" name="password" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" name="submit" value="Login">
            </div>
    
            <div class="bottom">
                <div class="left">
                    <input type="checkbox" id="check">
                    <label for="check">Remember Me</label>
                </div>
                <div class="right">
                    <label><a href="#">Forgot password !</a></label>
                </div>
            </div>
        </div>
    </form>
        @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <script>
// Ẩn thông báo sau 2 giây
setTimeout(function() {
    document.querySelector('.alert').style.display = 'none';
},2500);
</script>

</body>
</html>