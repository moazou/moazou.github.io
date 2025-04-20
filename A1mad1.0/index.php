<?php
session_start();

// بيانات الأعضاء
$members = [
    ['username' => 'Ahmed M', 'rank' => 'KING 👑', 'points' => 100],
    ['username' => 'ahmedadel', 'rank' => 'FM1 🎗️', 'points' => 50],
    ['username' => 'Mo3az', 'rank' => 'BDE 🚀', 'points' => 30],
    ['username' => 'omar', 'rank' => 'BDE 🚀', 'points' => 30],
    ['username' => 'Aboud', 'rank' => 'BDE 🚀', 'points' => 30],
    ['username' => 'عبدالروؤف', 'rank' => 'LM ☠️', 'points' => 20],
    ['username' => 'bensohaib', 'rank' => 'LM ☠️', 'points' => 20],
    ['username' => 'frank', 'rank' => 'WL 🛡️', 'points' => 40]
];

// إذا كان المستخدم قد قام بتسجيل الدخول
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// إذا تم إرسال نموذج تسجيل الدخول
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // تحقق من صحة البيانات (استبدل هذا الكود بتحقق حقيقي)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['username'] = $username;
        // إرسال إشعار عبر البريد الإلكتروني
        sendEmail($username);  // دالة لإرسال بريد إلكتروني

        header("Location: index.php");
        exit();
    } else {
        $error_message = "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
}

// دالة إرسال البريد الإلكتروني
function sendEmail($username) {
    $to = "moazxx50@gmail.com"; // البريد الإلكتروني الخاص بك
    $subject = "إشعار تسجيل الدخول";
    $message = "تم تسجيل دخول المستخدم: " . $username;
    $headers = "From: no-reply@yourdomain.com";

    // إرسال البريد الإلكتروني
    mail($to, $subject, $message, $headers);
}

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع العصابة - تسجيل الدخول</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        h1, h2 {
            color: #f39c12;
        }
        .form-container {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #222;
            color: white;
        }
        button {
            padding: 10px 20px;
            background-color: #f39c12;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #e67e22;
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>تسجيل الدخول</h2>
            <?php if (isset($error_message)) { echo "<p class='error-message'>{$error_message}</p>"; } ?>
            <form method="POST">
                <input type="text" name="username" placeholder="الاسم" required />
                <input type="password" name="password" placeholder="كلمة المرور" required />
                <button type="submit" name="login">تسجيل الدخول</button>
            </form>
        </div>

        <!-- لوحة القيادة بعد تسجيل الدخول -->
        <?php if (isset($_SESSION['username'])): ?>
        <div class="content-container">
            <h2>لوحة القيادة</h2>
            <h3>إحصائيات الأعضاء</h3>
            <table>
                <tr>
                    <th>الاسم</th>
                    <th>الرتبة</th>
                    <th>النقاط</th>
                    <th>تعديل النقاط</th>
                </tr>
                <?php
                foreach ($members as $member) {
                    echo "<tr>
                            <td>{$member['username']}</td>
                            <td>{$member['rank']}</td>
                            <td>{$member['points']}</td>
                            <td><button class='button' onclick='editPoints(\"{$member['username']}\")'>تعديل النقاط</button></td>
                          </tr>";
                }
                ?>
            </table>
        </div>
        <?php endif; ?>
    </div>

    <script>
        // دالة تعديل النقاط
        function editPoints(username) {
            var newPoints = prompt("أدخل النقاط الجديدة لـ " + username);
            if (newPoints) {
                alert(username + " تم تحديث النقاط إلى: " + newPoints);
            }
        }
    </script>

</body>
</html>
