<?php
include "header.php";
include "slider.php";
include "class/banner_class.php";
?>
<?php
$banner = new banner;
if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $insert_banner = $banner->insert_banner($_POST, $_FILES);
    echo '<script>alert("Thêm thành công")</script>';
    echo '<script>location.href = "bannerlist.php"</script>';
}
?>

<style>
    .admin-content-right-product_add input,
    select {
        display: block;
        height: 30px;
        width: 200px;
        padding-left: 12px;
        margin-bottom: 20px;
        margin-top: 5px;
    }

    .admin-content-right-product_add textarea {
        display: block;
        height: 200px;
        width: 500px;
        margin-bottom: 12px;
        padding: 12px;
    }

    .admin-content-right-product_add button {
        display: block;
        margin-top: 10px;
        height: 30px;
        width: 100px;
        cursor: pointer;
        background-color: brown;
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .admin-content-right-product_add button:hover {
        background-color: transparent;
        border: 1px solid brown;
        color: brown;
    }
</style>
<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Thêm banner</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Ảnh banner <span style="color: red;">*</span></label>
            <input required type="file" name="banner_img" />
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>

</html>