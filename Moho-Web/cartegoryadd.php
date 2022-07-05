<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;
if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $cartegory_name = $_POST['cartegory_name'];
    $insert_cartegory = $cartegory->insert_cartegory($cartegory_name);
    echo '<script>alert("Thêm thành công")</script>';
    echo '<script>location.href = "cartegorylist.php"</script>';
}
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm danh mục</h1>
        <hr>
        <form action="" method="POST">
            <input required type="text" name="cartegory_name" placeholder="Nhập tên danh mục">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>

</html>