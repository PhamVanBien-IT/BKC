<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";
?>
<?php
    $cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == NULL){
        echo "<script>window.location = 'cartegorylist.php'</script>";
    }
    else{
        $cartegory_id = $_GET['cartegory_id'];
    }

    $get_cartegory = $cartegory->get_cartegory($cartegory_id);
    if($get_cartegory){
        $result = $get_cartegory->fetch_assoc();
    }
?>
<?php
if($_SERVER['REQUEST_METHOD']  === 'POST'){
    $cartegory_name = $_POST['cartegory_name'];
    $update_cartegory = $cartegory->update_cartegory($cartegory_name,$cartegory_id);
    echo '<script>alert("Cập nhật thành công thành công")</script>';
    echo '<script>location.href = "cartegorylist.php"</script>';
}
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Cập nhật danh mục</h1><hr>
        <form action="" method="POST">
            <input required type="text" name="cartegory_name" placeholder="Nhập tên danh mục" value="<?php echo $result['cartegory_name'] ?>">
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</div>
</section>
</body>

</html>