<?php 

//$con = mysqli_connect('localhost',"root",'123456',"online")

$con = mysqli_connect('localhost', 'root', 'root', 'online');

if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
} else {
    echo "تم الاتصال بقاعدة البيانات بنجاح!";
}
?>
?>