<?php
// الاتصال بقاعدة البيانات
$con = mysqli_connect('localhost', 'root', 'root', 'online');

// التحقق من الاتصال
if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// التحقق من أن الطلب يحتوي على البيانات المطلوبة
if (isset($_POST['unload'])) {
    // استلام البيانات من النموذج
    $NAME = $_POST['name']; // الحقل name
    $PRICE = $_POST['Price']; // الحقل price
    $IMAGE = $_FILES['productImage']; // الحقل الخاص بالصورة

    // إعداد مسار الصورة
    $image_location = $_FILES['productImage']['tmp_name'];
    $image_name = $_FILES['productImage']['name'];
    $image_up = "images/" . $image_name;

    // استعلام إدخال البيانات
    $insert = "INSERT INTO prod (name, price, image) VALUES ('$NAME', '$PRICE', '$image_up')";

    // تنفيذ الاستعلام
    if (mysqli_query($con, $insert)) {
        // نقل الصورة إلى المجلد
        if (move_uploaded_file($image_location, $image_up)) {
            echo "<script> alert('تم رفع المنتج بنجاح'); </script>";
        } else {
            echo "<script> alert('فشل رفع الصورة، تحقق من المجلد والصلاحيات'); </script>";
        }
    } else {
        // عرض خطأ الاستعلام
        echo "<script> alert('فشل إدخال البيانات في قاعدة البيانات: " . mysqli_error($con) . "'); </script>";
    }

    // إعادة التوجيه
    header('Location: index.php');
    exit;
    
}
?>
<?php
//$con = mysqli_connect('localhost', 'root', '123456', 'online');

//if (!$con) {
   // die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
//} //else {
    // echo "تم الاتصال بقاعدة البيانات بنجاح!";
 //}
?>