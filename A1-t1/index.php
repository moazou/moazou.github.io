<?php
// Email عند تسجيل الدخول
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = htmlspecialchars($_POST['username']);
  $userid = htmlspecialchars($_POST['userid']);
  $to = "moazxx50@gmail.com";
  $subject = "عضو جديد دخل الموقع";
  $message = "العضو: $username\nالأيدي: $userid\nدخل إلى موقع عصابة A1.";
  $headers = "From: notifier@a1gang.com";

  mail($to, $subject, $message, $headers);
  $loggedIn = true;
} else {
  $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>عصابة A1</title>
  <style>
    body { background: #0d0d0d; color: #fff; font-family: 'Cairo', sans-serif; text-align: center; margin: 0; padding: 0; }
    .box { margin: 50px auto; width: 80%; max-width: 600px; background: #1a1a1a; padding: 30px; border-radius: 10px; }
    input, button, a.button {
      padding: 10px 20px; margin: 10px 0;
      width: 80%; border: none; border-radius: 5px;
    }
    button, a.button { background: #6a0dad; color: #fff; cursor: pointer; text-decoration: none; display: inline-block; }
    .hidden { display: none; }
    h1, h2 { color: #c299ff; }
    .section { margin-top: 40px; }
  </style>
</head>
<body>

<?php if (!$loggedIn): ?>
  <div class="box">
    <h2>تسجيل الدخول إلى عصابة A1</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="اسم العضو" required><br>
      <input type="text" name="userid" placeholder="الأيدي" required><br>
      <button type="submit">دخول</button>
    </form>
  </div>
<?php else: ?>
  <div class="box">
    <h1>أهلاً بك، <?php echo $username; ?>!</h1>
    <p>مرحباً بك في لوحة تحكم عصابة A1</p>
    <a href="#competitions" class="button">المسابقات</a>
    <a href="#links" class="button">روابط مهمة</a>
    <a href="#enemies" class="button">أعداء العصابة</a>
    <a href="#members" class="button">قائمة الأعضاء</a>
  </div>

  <div class="section" id="competitions">
    <h2>المسابقات الشهرية</h2>
    <div class="box">
      <p>مسابقة القنص السريع - أظهر مهاراتك خلال 5 دقائق</p>
      <p>تحدي التخفي - لا يتم اكتشافك</p>
      <p>سباق السيارات - من الأسرع؟</p>
      <!-- يمكن إضافة المزيد -->
    </div>
  </div>

  <div class="section" id="links">
    <h2>روابط مهمة</h2>
    <div class="box">
      <p><a href="https://www.tiktok.com/@_9___00?_t=ZS-8vX2WuN1Psm&_r=1" target="_blank" class="button">تيك توك VENOM</a></p>
      <p><a href="https://chat.whatsapp.com/EXbGAP5xqwUIso4wkDPbKV" target="_blank" class="button">جروب واتساب العصابة</a></p>
    </div>
  </div>

  <div class="section" id="enemies">
    <h2>أعداء العصابة</h2>
    <div class="box">
      <?php
        $enemies = ['BS', 'JO', 'WKR', 'HR', 'IRQ', 'MTK', 'V1', 'GNG', 'VGN', 'M7', 'MF'];
        foreach ($enemies as $enemy) {
          echo "<p>$enemy ❌</p>";
        }
      ?>
    </div>
  </div>

  <div class="section" id="members">
    <h2>أعضاء العصابة</h2>
    <div class="box">
      <p>القائد: A1 | Moaz</p>
      <p>النائب: A1 | Shadow</p>
      <p>القناص: A1 | SnipeX</p>
      <p>الذكاء الاصطناعي: A1 | Bot</p>
      <!-- أضف القائمة الكاملة لاحقًا -->
    </div>
  </div>
<?php endif; ?>

</body>
</html>
