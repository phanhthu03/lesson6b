<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lesson6";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}
echo "Kết nối thành công";
?>

<?php
// Tạo bảng danh sách sinh viên
$sql = "CREATE TABLE student_list (
    student_id INT(11) PRIMARY KEY,
    full_name VARCHAR(50),
    birthday DATE,
    class VARCHAR(20),
    avg_score FLOAT(2,1)
)";

if (mysqli_query($conn, $sql)) {
  echo "Tạo bảng thành công";
} else {
  echo "Tạo bảng thất bại: " . mysqli_error($conn);
}

// Thêm 5 sinh viên mới vào bảng danh sách
$sql = "INSERT INTO student_list (student_id, full_name, birthday, class, avg_score)
VALUES
(1, 'Nguyen Van A', '2000-01-01', 'K60', 8.5),
(2, 'Tran Thi B', '2000-02-02', 'K60', 7.5),
(3, 'Le Van C', '2000-03-03', 'K61', 9.0),
(4, 'Pham Thi D', '2000-04-04', 'K61', 6.5),
(5, 'Hoang Van E', '2000-05-05', 'K62', 8.0)";

if (mysqli_query($conn, $sql)) {
  echo "Thêm sinh viên thành công";
} else {
  echo "Thêm sinh viên thất bại: " . mysqli_error($conn);
}

// Cập nhật điểm trung bình của sinh viên có mã "SV001" thành 8.5
$sql = "UPDATE student_list
SET avg_score = 8.5
WHERE student_id = 1";

if (mysqli_query($conn, $sql)) {
  echo "Cập nhật điểm trung bình thành công";
} else {
  echo "Cập nhật điểm trung bình thất bại: " . mysqli_error($conn);
}

// Xoá thông tin của sinh viên có mã "SV003" khỏi bảng danh sách
$sql = "DELETE FROM student_list
WHERE student_id = 3";

if (mysqli_query($conn, $sql)) {
  echo "Xoá sinh viên thành công";
} else {
  echo "Xoá sinh viên thất bại: " . mysqli_error($conn);
}

// Đóng kết nối với cơ sở dữ liệu
mysqli_close($conn);
