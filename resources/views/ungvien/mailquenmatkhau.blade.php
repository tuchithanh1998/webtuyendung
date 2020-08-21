<!DOCTYPE html>
<html>
<head>
	<title>Quên mật khẩu</title>
</head>
<body>
	<p>
		Chào {{ $data['name'] }} vui lòng hãy click vào đường link sau đây để thay đổi mật khẩu
		</br>
	

		<a href="{{ $data['quenmatkhau_link'] }}">{{ $data['quenmatkhau_link'] }}</a>
	</p>
</body>
</html>