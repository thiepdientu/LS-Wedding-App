
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($response) ? 'Chỉnh Sửa' : 'Thêm' }} Phản hồi</title>
</head>
<body>
    <h2>{{ isset($response) ? 'Chỉnh Sửa' : 'Nhập' }} Thông Tin Phản Hồi</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Form -->
    <form action="{{ isset($response) ? route('response.update', $response->id) : route('response.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Username</label>
        <input type="text" name="username" value="{{ old('username', $response->username ?? '') }}" required><br>

        <label>Message</label>
        <input type="text" name="message" value="{{ old('message', $response->message ?? '') }}" required><br>

        <label>Join</label>
        <input type="text" name="join" value="{{ old('join', $response->join ?? '') }}" required><br>

        <label>WeddingId</label>
        <input type="text" name="weddingId" value="{{ old('weddingId', $response->weddingId ?? '') }}" required><br>


        <label>Email</label>
        <input type="text" name="email" value="{{ old('email', $response->email ?? '') }}" required><br>

        <button type="submit">{{ isset($response) ? 'Cập Nhật' : 'Lưu' }} Tài Khoản</button>
    </form>
</body>
</html>