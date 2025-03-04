<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ảnh</title>
</head>
<body>
    <h2>Upload Ảnh</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        <img src="{{ asset('storage/' . session('image')) }}" width="200" alt="Uploaded Image">
    @endif
    <form action="{{ route('wedding.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image[]" multiple required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>