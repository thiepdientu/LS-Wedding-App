
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
        <label>Email</label>
        <input type="text" name="email" value="{{ old('email', $weddingCard->email ?? '') }}" required><br>

        <label>Tên thiệp</label>
        <input type="text" name="identifyWedding" value="{{ old('identifyWedding', $weddingCard->identifyWedding ?? '') }}" required><br>

        <label>Mẫu thiệp</label>
        <input type="text" name="template" value="{{ old('template', $weddingCard->template ?? '') }}" required><br>

        <label>Banner Preview:</label>
        <input type="file" name="banner_preview_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="banner_preview" value="{{ old('banner_preview', $weddingCard->banner_preview ?? '') }}"><br>

        <label>Cô Dâu:</label>
        <input type="text" name="bride_name" value="{{ old('bride_name', $weddingCard->bride_name ?? '') }}" required><br>

        <label>Chú Rể:</label>
        <input type="text" name="groom_name" value="{{ old('groom_name', $weddingCard->groom_name ?? '') }}" required><br>

        <label>Nội dung lễ thành hôn</label>
        <input type="text" name="wedding_message" value="{{ old('wedding_message', $weddingCard->wedding_message ?? '') }}" required><br>

        <label>Ngày Thành Hôn:</label>
        <input type="date" name="wedding_date" value="{{ old('wedding_date', $weddingCard->wedding_date ?? '') }}" required><br>

        <label>Giờ lễ thành hôn </label>
        <input type="text" name="wedding_time" value="{{ old('wedding_time', $weddingCard->wedding_time ?? '') }}" required><br>

        <label>Địa Chỉ Tổ Chức:</label>
        <input type="text" name="address_wedding" value="{{ old('address_wedding', $weddingCard->address_wedding ?? '') }}" required><br>

        <label>Tên nơi Tổ Chức:</label>
        <input type="text" name="name_place_wedding" value="{{ old('name_place_wedding', $weddingCard->name_place_wedding ?? '') }}" required><br>

        <label>Bản Đồ Địa Chỉ Tổ Chức:</label>
        <input type="text" name="address_wedding_map" value="{{ old('address_wedding_map', $weddingCard->address_wedding_map ?? '') }}"><br>

        <label>Ngày Sinh Cô Dâu:</label>
        <input type="date" name="bride_birthday" value="{{ old('bride_birthday', $weddingCard->bride_birthday ?? '') }}" required><br>

        <label>Ngày Sinh Chú Rể:</label>
        <input type="date" name="groom_birthday" value="{{ old('groom_birthday', $weddingCard->groom_birthday ?? '') }}" required><br>

        <label>Avatar Cô Dâu:</label>
        <input type="file" name="avatar_bride"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="bride_avatar" value="{{ old('bride_avatar', $weddingCard->bride_avatar ?? '') }}"><br>

        <label>Avatar Chú Rể:</label>
        <input type="file" name="avatar_groom"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="groom_avatar" value="{{ old('groom_avatar', $weddingCard->groom_avatar ?? '') }}"><br>

        <label>Giới thiệu cô dâu:</label>
        <input type="text" name="des_bride" value="{{ old('des_bride', $weddingCard->des_bride ?? '') }}"><br>

        <label>Giới thiệu chú rể:</label>
        <input type="text" name="des_groom" value="{{ old('des_groom', $weddingCard->des_groom ?? '') }}"><br>


        <label>Banner Top:</label>
        <input type="file" name="banner_top_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="banner_top" value="{{ old('banner_top', $weddingCard->banner_top ?? '') }}"><br>


        <label>Banner Countdown:</label>
        <input type="file" name="banner_coundown_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="banner_coundown" value="{{ old('banner_coundown', $weddingCard->banner_coundown ?? '') }}"><br>

        <label>Banner Story:</label>
        <input type="file" name="banner_story_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="banner_love_story" value="{{ old('banner_love_story', $weddingCard->banner_love_story ?? '') }}"><br>

        <label>Nội dung Love Story (Ví dụ: 1/2/2023:Hẹn Hò, 2/2/2024:Tỏ Tình)</label>
        <input type="text" name="love_story" value="{{ old('love_story', $weddingCard->love_story ?? '') }}"><br>

        <label>Album Ảnh:</label>
        <input type="text" name="album" value="{{ old('album', $weddingCard->album ?? '') }}"><br>

        <label>Ngày Countdown:</label>
        <input type="text" name="date_coundown" value="{{ old('date_coundown', $weddingCard->date_coundown ?? '') }}"><br>

        <label>Địa Chỉ Chú Rể:</label>
        <input type="text" name="address_groom" value="{{ old('address_groom', $weddingCard->address_groom ?? '') }}"><br>

        <label>Địa Chỉ Cô Dâu:</label>
        <input type="text" name="address_bride" value="{{ old('address_bride', $weddingCard->address_bride ?? '') }}"><br>

        <label>Lời mời ăn cỗ chung ( Trân trọng ....)</label>
        <input type="text" name="message_invite" value="{{ old('message_invite', $weddingCard->message_invite ?? '') }}"><br>

        <label>Lời mời ăn cỗ nhà trai (Nhà Trai)</label>
        <input type="text" name="groom_eating_title" value="{{ old('groom_eating_title', $weddingCard->groom_eating_title ?? '') }}"><br>

        <label>Giờ ăn cỗ nhà trai:</label>
        <input type="text" name="time_groom" value="{{ old('time_groom', $weddingCard->time_groom ?? '') }}"><br>

        <label>Ngày ăn cỗ nhà trai:</label>
        <input type="date" name="groom_eating_date" value="{{ old('groom_eating_date', $weddingCard->groom_eating_date ?? '') }}" required><br>

        <label>Thời Gian Mời Cỗ Chú Rể (Âm lịch):</label>
        <input type="text" name="time_groom_al" value="{{ old('time_groom_al', $weddingCard->time_groom_al ?? '') }}"><br>

        <label>Lời mời ăn cỗ nhà gái (Nhà Gái)</label>
        <input type="text" name="bride_eating_title" value="{{ old('bride_eating_title', $weddingCard->bride_eating_title ?? '') }}"><br>

        <label>Giờ ăn cỗ nhà gái:</label>
        <input type="text" name="time_bride" value="{{ old('time_bride', $weddingCard->time_bride ?? '') }}"><br>

        <label>Ngày ăn cỗ nhà gái:</label>
        <input type="date" name="bride_eating_date" value="{{ old('bride_eating_date', $weddingCard->bride_eating_date ?? '') }}" required><br>

        <label>Thời Gian Mời Cỗ Cô Dâu (Âm lịch):</label>
        <input type="text" name="time_bride_al" value="{{ old('time_bride_al', $weddingCard->time_bride_al ?? '') }}"><br>

        <label>SĐT Cô Dâu:</label>
        <input type="text" name="bride_phone" value="{{ old('bride_phone', $weddingCard->bride_phone ?? '') }}" required><br>

        <label>SĐT Chú Rể:</label>
        <input type="text" name="groom_phone" value="{{ old('groom_phone', $weddingCard->groom_phone ?? '') }}" required><br>

        <label>Nội dung quà (Mọi yêu ...)</label>
        <input type="text" name="message_gift" value="{{ old('message_gift', $weddingCard->message_gift ?? '') }}"><br>

        <label>Nội dung thanks</label>
        <input type="text" name="message_thanks" value="{{ old('message_thanks', $weddingCard->message_thanks ?? '') }}"><br>

        <label>Banner Thanks:</label>
        <input type="file" name="banner_thanks_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="banner_thanks" value="{{ old('banner_thanks', $weddingCard->banner_thanks ?? '') }}"><br>

        <label>QR Chú Rể:</label>
        <input type="file" name="groom_qr_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="groom_qr" value="{{ old('groom_qr', $weddingCard->groom_qr ?? '') }}"><br>

        <label>QR Cô Dâu:</label>
        <input type="file" name="bride_qr_image"  {{ !isset($weddingCard) ? 'required' : '' }} >
        <input type="text" name="bride_qr" value="{{ old('bride_qr', $weddingCard->bride_qr ?? '') }}"><br>

        <label>Map Chú Rể:</label>
        <input type="text" name="groom_map" value="{{ old('groom_map', $weddingCard->groom_map ?? '') }}"><br>

        <label>Map Cô Dâu:</label>
        <input type="text" name="bride_map" value="{{ old('bride_map', $weddingCard->bride_map ?? '') }}"><br>
        <label>Chọn ảnh</label>
        <input type="file" name="image[]" multiple {{ !isset($weddingCard) ? 'required' : '' }} >
    
        <button type="submit">{{ isset($weddingCard) ? 'Cập Nhật' : 'Lưu' }} Thiệp Cưới</button>
    </form>
</body>
</html>