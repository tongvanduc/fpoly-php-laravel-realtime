<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat Realtime</title>

    @vite('resources/css/app.css') <!-- Gắn file CSS -->
</head>

<body>
    <div id="app">
        <div class="chat-container">
            <h2>Chat với người dùng: <span id="chat-with"></span></h2>

            <!-- Hiển thị trạng thái người dùng -->
            <div class="status">
                Trạng thái: <span id="user-status">Đang kiểm tra...</span>
            </div>

            <!-- Khung hiển thị tin nhắn -->
            <div id="message-box" class="message-box">
                <!-- Tin nhắn sẽ được đẩy vào đây -->
            </div>

            <!-- Form gửi tin nhắn -->
            <div class="input-box">
                <textarea id="message-input" placeholder="Nhập tin nhắn..." rows="3"></textarea>
                <button id="send-message-btn">Gửi</button>
            </div>
        </div>
    </div>

    <script>
        let userId = {{ auth()->id() }};
        let receiverId = {{ $receiverId }};
        let roomId = {{ $roomId }};
    </script>

    @vite('resources/js/present.js') <!-- Gắn file JavaScript -->
</body>

</html>
