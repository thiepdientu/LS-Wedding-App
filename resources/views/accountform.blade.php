
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($account) ? 'Chỉnh Sửa' : 'Thêm' }} Tài Khoản</title>
</head>
<body>
    <h2>{{ isset($account) ? 'Chỉnh Sửa' : 'Nhập' }} Thông Tin Tài Khoản</h2>

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
    <form action="{{ isset($account) ? route('account.update', $account->id) : route('account.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Username</label>
        <input type="text" name="username" value="{{ old('username', $account->username ?? '') }}" required><br>

        <label>Email</label>
        <input type="text" name="email" value="{{ old('email', $account->email ?? '') }}" required><br>

        <label>Password</label>
        <input type="text" name="password" value="{{ old('password', $account->password ?? '') }}" required><br>

        <label>Role</label>
        <input type="text" name="role" value="{{ old('role', $account->role ?? '') }}" required><br>

        <label>Status</label>
        <input type="text" name="status" value="{{ old('status', $account->status ?? '') }}" required><br>

        <label>Avatar</label>
        <input type="text" name="avatar" value="{{ old('avatar', $account->avatar ?? '') }}" required><br>

        <button type="submit">{{ isset($account) ? 'Cập Nhật' : 'Lưu' }} Tài Khoản</button>
    </form>
</body>
</html>