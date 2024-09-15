<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private Realtime</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @vite('resources/css/app.css') <!-- Gắn file CSS -->
</head>

<body>
    <div class="task-container">
        <h2>Private Realtime</h2>
        
        <form id="task-form" method="POST">
            <div class="form-group">
                <label for="title">Tiêu đề Task:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả Task:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="assigned_to">Giao cho người dùng (User ID):</label>
                <select id="assigned_to" name="assigned_to" required>
                    @foreach ($userOthers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" id="create-task-btn">Tạo Task</button>
        </form>

        <div id="response-message"></div>
    </div>

    <script>
        let userId = {{ auth()->id() }}; // ID của người dùng hiện tại
    </script>
    
    @vite('resources/js/private.js') <!-- Gắn file JavaScript -->
</body>

</html>
