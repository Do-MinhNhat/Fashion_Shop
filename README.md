đây là mã nguồn website đồ án Fashion Shop sử dụng Laravel Framework. <br />
Để chạy được dự án, hay chỉnh sửa env.example cho phù hợp với database sẽ sử dụng và đổi tên file lại thành .env <br />
Yêu cầu PHP 8.2+ <br />
sau khi tải xuống hãy chạy các lệnh sau: <br />
npm install <br />
npm run build <br />
php artisan migrate <br />
php artisan db:seed <br />
php artisan storage:link <br />
Link Video Demo các chức năng chính: https://youtu.be/ZagPBU76KFY <br />

LƯU Ý!!!: do hệ thống không sử lý chi tiết việc xóa sản phẩm nên dù cho có là xóa mềm thì cũng sẽ gây ra NULL ở các sản phẩm có eager loading!!! vd: Order chứa thông tin Admin duyệt, Admin bị xóa -> Order gọi Admin (đã xóa mềm) gây ra NUll. <br />
