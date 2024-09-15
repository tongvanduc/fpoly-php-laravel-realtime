import './bootstrap';

window.Echo.private('tasks.' + userId)
    .listen('TaskAssigned', (event) => {
        console.log(event);
        alert(`Bạn vừa được giao một task mới: ${event.title}`);
    });

// Xử lý khi người dùng bấm nút "Tạo Task"
document.getElementById('task-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn trình duyệt refresh

    // Lấy dữ liệu từ form
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const assignedTo = document.getElementById('assigned_to').value;

    // Gửi yêu cầu POST đến API để tạo Task
    axios.post('/tasks', {
        title: title,
        description: description,
        assigned_to: assignedTo
    })
    .then((response) => {
        // Thông báo khi Task tạo thành công
        document.getElementById('response-message').textContent = 'Task đã được tạo và thông báo đã được gửi!';
        document.getElementById('task-form').reset(); // Xóa nội dung trong form
    })
    .catch((error) => {
        console.error('Lỗi khi tạo Task:', error);
        document.getElementById('response-message').textContent = 'Có lỗi xảy ra, vui lòng thử lại.';
    });
});