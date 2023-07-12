@extends('user.layout.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi thành công</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            text-align: center;
            
        }

        .abc {
            margin-bottom: 20px;
        }

        .abcd {
            color: #00bb00;
            font-size: 64px;
            margin-bottom: 20px;
        }

        .button {
            padding: 10px 20px;
            background-color: #0088cc;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #006699;
        }
    </style>
</head>
<body>
    <div class="abc">
        <h1 class="abcd">&#10004;</h1>
        <h2>Gửi thành công!</h2>
        <p>Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi lại bạn sớm nhất có thể.</p>
    </div>
    <a class="button" href="/">Quay về trang chủ</a>
    <br><br><br>
</body>
</html>
@endsection
