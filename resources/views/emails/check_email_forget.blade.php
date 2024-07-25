<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Quên mật khẩu</h2>
        <p>Eduvi đã gửi một email để đặt lại mật khẩu của bạn. Vui lòng kiểm tra hộp thư đến của bạn.</p>
        <p>Nếu bạn không nhận được email trong vài phút, hãy kiểm tra thư mục Spam hoặc thử lại.</p>
        <a href="{{ route('reset.password.form',['id'=>$user->Id_User,'token'=>$token]) }}" class="btn btn-primary d-block w-100">Quay lại trang chủ</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
