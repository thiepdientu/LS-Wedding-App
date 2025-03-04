{{-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thiệp Cưới</title>
</head>
<body>
    <h2>Nhập Thông Tin Thiệp Cưới</h2>

    <!-- Hiển thị thông báo lỗi -->
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

    <!-- Form nhập dữ liệu -->
    <form action="{{ route('wedding.store') }}" method="POST">
        @csrf

        <label>Cô Dâu:</label>
        <input type="text" name="bride_name" required><br>

        <label>Chú Rể:</label>
        <input type="text" name="groom_name" required><br>

        <label>Ngày Cưới:</label>
        <input type="date" name="wedding_date" required><br>

        <label>Địa Chỉ Tổ Chức:</label>
        <input type="text" name="address_wedding" required><br>

        <label>Bản Đồ Địa Chỉ Tổ Chức:</label>
        <input type="text" name="address_wedding_map"><br>

        <label>Ngày Sinh Cô Dâu:</label>
        <input type="date" name="bride_birthday" required><br>

        <label>Ngày Sinh Chú Rể:</label>
        <input type="date" name="groom_birday" required><br>

        <label>Avatar Cô Dâu:</label>
        <input type="text" name="bride_avatar" ><br>

        <label>Avatar Chú Rể:</label>
        <input type="text" name="groom_avatar"><br>

        <label>Banner Top:</label>
        <input type="text" name="banner_top" ><br>

        <label>Banner Countdown:</label>
        <input type="text" name="banner_coundown" ><br>

        <label>Album Ảnh:</label>
        <input type="text" name="album"><br>

        <label>Ngày Countdown:</label>
        <input type="text" name="date_coundown"><br>

        <label>Địa Chỉ Chú Rể:</label>
        <input type="text" name="address_groom"><br>

        <label>Địa Chỉ Cô Dâu:</label>
        <input type="text" name="address_bride"><br>

        <label>Thời Gian Mời Cỗ Chú Rể (Dương lịch):</label>
        <input type="text" name="time_groom"><br>

        <label>Thời Gian Mời Cỗ Chú Rể (Âm lịch):</label>
        <input type="text" name="time_groom_al"><br>

        <label>Thời Gian Mời Cỗ Cô Dâu (Dương lịch):</label>
        <input type="text" name="time_bride"><br>

        <label>Thời Gian Mời Cỗ Cô Dâu (Âm lịch):</label>
        <input type="text" name="time_bride_al"><br>

        <label>SĐT Cô Dâu:</label>
        <input type="text" name="bride_phone" required><br>

        <label>SĐT Chú Rể:</label>
        <input type="text" name="groom_phone" required><br>

        <label>QR Chú Rể:</label>
        <input type="text" name="groom_qr" ><br>

        <label>QR Cô Dâu:</label>
        <input type="text" name="bride_qr"><br>

        <label>Map Chú Rể:</label>
        <input type="text" name="groom_map"><br>

        <label>Map Cô Dâu:</label>
        <input type="text" name="bride_map"><br>

        <button type="submit">Lưu Thiệp Cưới</button>
    </form>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($weddingCard) ? 'Chỉnh Sửa' : 'Thêm' }} Thiệp Cưới</title>
</head>
<body>
    <h2>{{ isset($weddingCard) ? 'Chỉnh Sửa' : 'Nhập' }} Thông Tin Thiệp Cưới</h2>

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
    <form action="{{ isset($weddingCard) ? route('wedding.update', $weddingCard->id) : route('wedding.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Cô Dâu:</label>
        <input type="text" name="bride_name" value="{{ old('bride_name', $weddingCard->bride_name ?? '') }}" required><br>

        <label>Chú Rể:</label>
        <input type="text" name="groom_name" value="{{ old('groom_name', $weddingCard->groom_name ?? '') }}" required><br>

        <label>Ngày Cưới:</label>
        <input type="date" name="wedding_date" value="{{ old('wedding_date', $weddingCard->wedding_date ?? '') }}" required><br>

        <label>Địa Chỉ Tổ Chức:</label>
        <input type="text" name="address_wedding" value="{{ old('address_wedding', $weddingCard->address_wedding ?? '') }}" required><br>

        <label>Bản Đồ Địa Chỉ Tổ Chức:</label>
        <input type="text" name="address_wedding_map" value="{{ old('address_wedding_map', $weddingCard->address_wedding_map ?? '') }}"><br>

        <label>Ngày Sinh Cô Dâu:</label>
        <input type="date" name="bride_birthday" value="{{ old('bride_birthday', $weddingCard->bride_birthday ?? '') }}" required><br>

        <label>Ngày Sinh Chú Rể:</label>
        <input type="date" name="groom_birday" value="{{ old('groom_birday', $weddingCard->groom_birday ?? '') }}" required><br>

        <label>Avatar Cô Dâu:</label>
        <input type="text" name="bride_avatar" value="{{ old('bride_avatar', $weddingCard->bride_avatar ?? '') }}"><br>

        <label>Avatar Chú Rể:</label>
        <input type="text" name="groom_avatar" value="{{ old('groom_avatar', $weddingCard->groom_avatar ?? '') }}"><br>

        <label>Banner Top:</label>
        <input type="text" name="banner_top" value="{{ old('banner_top', $weddingCard->banner_top ?? '') }}"><br>

        <label>Banner Countdown:</label>
        <input type="text" name="banner_coundown" value="{{ old('banner_coundown', $weddingCard->banner_coundown ?? '') }}"><br>

        <label>Album Ảnh:</label>
        <input type="text" name="album" value="{{ old('album', $weddingCard->album ?? '') }}"><br>

        <label>Ngày Countdown:</label>
        <input type="text" name="date_coundown" value="{{ old('date_coundown', $weddingCard->date_coundown ?? '') }}"><br>

        <label>Địa Chỉ Chú Rể:</label>
        <input type="text" name="address_groom" value="{{ old('address_groom', $weddingCard->address_groom ?? '') }}"><br>

        <label>Địa Chỉ Cô Dâu:</label>
        <input type="text" name="address_bride" value="{{ old('address_bride', $weddingCard->address_bride ?? '') }}"><br>

        <label>Thời Gian Mời Cỗ Chú Rể (Dương lịch):</label>
        <input type="text" name="time_groom" value="{{ old('time_groom', $weddingCard->time_groom ?? '') }}"><br>

        <label>Thời Gian Mời Cỗ Chú Rể (Âm lịch):</label>
        <input type="text" name="time_groom_al" value="{{ old('time_groom_al', $weddingCard->time_groom_al ?? '') }}"><br>

        <label>Thời Gian Mời Cỗ Cô Dâu (Dương lịch):</label>
        <input type="text" name="time_bride" value="{{ old('time_bride', $weddingCard->time_bride ?? '') }}"><br>

        <label>Thời Gian Mời Cỗ Cô Dâu (Âm lịch):</label>
        <input type="text" name="time_bride_al" value="{{ old('time_bride_al', $weddingCard->time_bride_al ?? '') }}"><br>

        <label>SĐT Cô Dâu:</label>
        <input type="text" name="bride_phone" value="{{ old('bride_phone', $weddingCard->bride_phone ?? '') }}" required><br>

        <label>SĐT Chú Rể:</label>
        <input type="text" name="groom_phone" value="{{ old('groom_phone', $weddingCard->groom_phone ?? '') }}" required><br>

        <label>QR Chú Rể:</label>
        <input type="text" name="groom_qr" value="{{ old('groom_qr', $weddingCard->groom_qr ?? '') }}"><br>

        <label>QR Cô Dâu:</label>
        <input type="text" name="bride_qr" value="{{ old('bride_qr', $weddingCard->bride_qr ?? '') }}"><br>

        <label>Map Chú Rể:</label>
        <input type="text" name="groom_map" value="{{ old('groom_map', $weddingCard->groom_map ?? '') }}"><br>

        <label>Map Cô Dâu:</label>
        <input type="text" name="bride_map" value="{{ old('bride_map', $weddingCard->bride_map ?? '') }}"><br>
        <label>Chọn ảnh</label>
        <input type="file" name="image[]" multiple required>
    
        <button type="submit">{{ isset($weddingCard) ? 'Cập Nhật' : 'Lưu' }} Thiệp Cưới</button>
    </form>
</body>
</html>