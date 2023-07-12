<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('user/css/style4.css')}}">
    <title>Profile</title>
</head>
<body>
    <form method="post" action="{{url('user/detailsprofile')}}">
    @csrf
    <div class="container">
            <div class="top-header">
                <header>Information</header>
            </div>
            <div class="input-field">
                <input type="text" id="input1" value="{{$name}}" onfocus="handleInputFocus(this)" onblur="handleInputBlur(this)" data-default="{{$name}}">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="text"  id="input2" value="{{$username}}" onfocus="handleInputFocus(this)" onblur="handleInputBlur(this)" data-default="{{$username}}">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" id="input3" value="{{$password}}" onfocus="handleInputFocus(this)" onblur="handleInputBlur(this)" data-default="{{$password}}">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="text" id="input4" value="{{$email}}" onfocus="handleInputFocus(this)" onblur="handleInputBlur(this)" data-default="{{$email}}">
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-field">
                <button type="submit" class="submit" name="update">Update</button>
            </div>
        </div> 
    </form>
</body>
    <script>
      function handleInputFocus(input) {
        if (input.value === input.getAttribute('data-default')) {
          input.value = input.getAttribute('data-default');
        }
      }
    
      function handleInputBlur(input) {
        if (input.value ==='' || input.value ===input.getAttribute('data-default')) {
          input.value = input.getAttribute('data-default');
        }
      }
    </script>
</html>