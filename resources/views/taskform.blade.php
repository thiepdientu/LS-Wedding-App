
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($task) ? 'Chỉnh Sửa' : 'Thêm' }} Task</title>
</head>
<body>
    <h2>{{ isset($task) ? 'Chỉnh Sửa' : 'Nhập' }} Thông Tin công việc</h2>

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
    <form action="{{ isset($task) ? route('task.update',$task->id) : route('task.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name',$task->name ?? '') }}" required><br>

        <label>Describe</label>
        <input type="text" name="describe" value="{{ old('describe',$task->describe ?? '') }}" required><br>

        <label>DONE</label>
        <input type="text" name="done" value="{{ old('done',$task->done ?? '') }}" required><br>

        <label>Date</label>
        <input type="date" name="date" value="{{ old('date',$task->date ?? '') }}" required><br>

        <label>Time</label>
        <input type="text" name="time" value="{{ old('time',$task->time ?? '') }}" required><br>


        <label>Email</label>
        <input type="text" name="email" value="{{ old('email',$task->email ?? '') }}" required><br>

        <button type="submit">{{ isset($task) ? 'Cập Nhật' : 'Lưu' }} Công việc</button>
    </form>
</body>
</html>