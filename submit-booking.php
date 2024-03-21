<?php
// بداية، تعيين متغيرات الاتصال بقاعدة البيانات
$host = "localhost"; // أو عنوان IP لخادم قاعدة البيانات
$dbname = "hotel_db"; // اسم قاعدة البيانات
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة مرور قاعدة البيانات

// إنشاء اتصال PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // تعيين وضع الخطأ PDO إلى Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // جمع البيانات من النموذج
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $guests = $_POST['guests'];
    $room_type = $_POST['room_type'];

    // إنشاء الاستعلام SQL لإدخال البيانات
    $sql = "INSERT INTO bookings (checkin_date, checkout_date, guests, room_type) VALUES (?, ?, ?, ?)";
    
    // إعداد استعلام SQL للتنفيذ
    $stmt = $conn->prepare($sql);
    
    // تنفيذ الاستعلام
    $stmt->execute([$checkin_date, $checkout_date, $guests, $room_type]);

    echo "تم حجز الغرفة بنجاح!";
} catch(PDOException $e) {
    echo "حدث خطأ: " . $e->getMessage();
}

// إغلاق الاتصال
$conn = null;
?>
