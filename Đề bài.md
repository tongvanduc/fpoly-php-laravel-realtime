### **1\. Bài tập với Public Channel (Kênh công khai)**

#### **Mô tả:**

- Yêu cầu: Xây dựng một hệ thống thông báo **Voucher** cho người dùng qua kênh công khai.
- Kịch bản: Khi một voucher mới được thêm vào hệ thống, tất cả người dùng đang kết nối sẽ nhận được thông báo ngay lập tức qua kênh **Public Channel**.

#### **Các bước thực hiện:**

- Cấu hình Broadcast driver với Pusher, Laravel Echo hoặc Websockets.
- Tạo event để gửi thông báo voucher.
- Sử dụng Public channel để truyền tải thông báo.
- Hiển thị thông báo voucher trên frontend khi có sự kiện.

#### **Kết quả mong muốn:**

- Khi thêm mới một voucher vào hệ thống, toàn bộ người dùng sẽ nhận thông báo voucher ngay lập tức mà không cần tải lại trang.

### **2\. Bài tập với Private Channel (Kênh riêng tư)**

#### **Mô tả:**

- Yêu cầu: Xây dựng một hệ thống thông báo **Task** theo thời gian thực cho các thành viên của một dự án qua kênh riêng tư.
- Kịch bản: Khi một thành viên của dự án được giao một task mới, chỉ người đó mới nhận được thông báo qua **Private Channel**.

#### **Các bước thực hiện:**

- Tạo event và broadcast để truyền tải thông báo task.
- Sử dụng **Private Channel** để đảm bảo chỉ người dùng liên quan đến task mới nhận được thông báo.
- Cấu hình việc ủy quyền (Authorization) để đảm bảo chỉ người dùng có quyền mới được nghe kênh này.

#### **Kết quả mong muốn:**

- Khi một task được giao, chỉ thành viên được giao task mới nhận được thông báo, đảm bảo tính bảo mật và riêng tư.

### **3\. Bài tập với Present Channel (Kênh hiện diện)**

#### **Mô tả:**

- Yêu cầu: Xây dựng một tính năng **Chat giữa 2 người** với việc theo dõi trạng thái online của đối phương qua kênh hiện diện.
- Kịch bản: Khi hai người dùng tham gia vào một cuộc trò chuyện, cả hai sẽ có thể thấy trạng thái online hoặc offline của nhau trong thời gian thực thông qua **Presence Channel**.

#### **Các bước thực hiện:**

- Tạo event để theo dõi trạng thái người dùng (online/offline).
- Sử dụng **Presence Channel** để theo dõi trạng thái của người dùng trong phiên chat.
- Hiển thị thông tin trạng thái trực tiếp trong giao diện người dùng.

#### **Kết quả mong muốn:**

- Người dùng có thể thấy trạng thái online/offline của người đang trò chuyện với mình trong thời gian thực.