<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع تسويقي أونلاين</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-container">
        <h1>موقع تسويقي اونلاين</h1>
        <img src="logo.png" alt="Logo" class="logo">
        
        <form action="instre.php" method="POST" class="product-form" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="اسم المنتج" required>
    <input type="text" name="Price" placeholder="سعر المنتج" required>
    <div class="buttons">
        <label for="uploadImage" class="upload-btn">اختر صورة المنتج</label>
        <input type="file" id="uploadImage" name="productImage" hidden>
        <button type="submit" name="unload" class="submit-btn">رفع المنتج</button>
    </div>
</form>

        
        <a href="products.php" class="view-all">عرض كل المنتجات</a>
    </div>
    <div><p class="footer-title">Copyrights @ <span>Saif al-lslam</span></p></div>
</body>
</html>