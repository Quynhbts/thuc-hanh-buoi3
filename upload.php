<?php
// Thư mục lưu trữ video đã upload
$targetDir = "uploads/";

// Đường dẫn đầy đủ của video sau khi upload
$targetFile = $targetDir . basename($_FILES["videoFile"]["name"]);

// Kiểm tra nếu người dùng đã submit form
if(isset($_POST["submit"])) {
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Kiểm tra xem file đã tồn tại chưa
    if (file_exists($targetFile)) {
        echo "Xin lỗi, file đã tồn tại.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước file
    if ($_FILES["videoFile"]["size"] > 50000000) { // 50MB
        echo "Xin lỗi, file quá lớn.";
        $uploadOk = 0;
    }

    // Chỉ chấp nhận các định dạng video phổ biến như mp4, avi, mov, ...
    if($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov"
    && $videoFileType != "wmv" && $videoFileType != "flv" && $videoFileType != "webm") {
        echo "Xin lỗi, chỉ chấp nhận các định dạng video MP4, AVI, MOV, WMV, FLV, WEBM.";
        $uploadOk = 0;
    }

    // Kiểm tra nếu $uploadOk không bị lỗi
    if ($uploadOk == 0) {
        echo "Xin lỗi, file của bạn không được tải lên.";
    } else {
        // Nếu mọi thứ đều ổn, thử tải lên file
        if (move_uploaded_file($_FILES["videoFile"]["tmp_name"], $targetFile)) {
            echo "File ". basename( $_FILES["videoFile"]["name"]). " đã được tải lên thành công.";
        } else {
            echo "Xảy ra lỗi khi tải lên file.";
        }
    }
}
?>
