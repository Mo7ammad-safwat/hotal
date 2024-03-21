<?php
// تحقق من وجود طلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // تحقق من صحة البيانات المدخلة
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // تعيين رسالة خطأ أو إعادة توجيه المستخدم
        echo "حدث خطأ في البيانات المدخلة!";
        exit;
    }

    // حيث يتم إرسال الرسالة
    $recipient = "your_email@example.com"; // استبدل ببريدك الإلكتروني

    // موضوع الرسالة
    $subject = "رسالة جديدة من $name";

    // بناء الرسالة
    $email_content = "الاسم: $name\n";
    $email_content .= "البريد الإلكتروني: $email\n\n";
    $email_content .= "الرسالة:\n$message\n";

    // رأس الرسالة
    $email_headers = "From: $name <$email>";

    // إرسال الرسالة
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // رسالة نجاح
        echo "شكرًا لك، تم إرسال رسالتك بنجاح.";
    } else {
        // رسالة فشل
        echo "عذرًا، لم يتم إرسال رسالتك. الرجاء المحاولة مرة أخرى لاحقًا.";
    }
} else {
    // ليس طلب POST
    echo "هذا النموذج يتطلب طلب POST.";
}
?>
