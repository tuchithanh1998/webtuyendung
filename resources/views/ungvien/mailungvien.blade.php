<!DOCTYPE html>
<html>
<head>
	<title>Xác thực tài khoản</title>
</head>
<body>
	<p>
		Chào mừng {{ $data['name'] }} đã đăng ký thành viên tại ... Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
		</br>
	

		<a href="{{ $data['activation_link'] }}">{{ $data['activation_link'] }}</a>
	</p>
</body>
</html>