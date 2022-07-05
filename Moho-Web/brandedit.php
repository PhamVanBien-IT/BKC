<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
    $brand = new brand;
    $brand_id = $_GET['brand_id'];
    

    $get_brand = $brand->get_brand($brand_id);
    if($get_brand){
        $resultBrand = $get_brand->fetch_assoc();
    }

?>
<?php
if($_SERVER['REQUEST_METHOD']  === 'POST'){
    $cartegory_id = $_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand->update_brand($cartegory_id,$brand_name,$brand_id);
    echo '<script>alert("Cập nhật thành công")</script>';
    echo '<script>location.href = "brandlist.php"</script>';
}
?>
<style>
    select{
        width: 200px;
        height: 30px;
    }
</style>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Câp nhật loại sản phẩm</h1><hr>
        <br>
        <form action="" method="POST">
            <select name="cartegory_id" id="">
                <option value="#">-- Chọn danh mục</option>
                <?php 
                $i = 0;
                $show_cartegory = $brand-> show_cartegory();
                if($show_cartegory){while($result = $show_cartegory ->fetch_assoc()){$i++;
                ?>
                <option <?php if($resultBrand['cartegory_id'] == $result['cartegory_id']) { echo "SELECTED"; } ?> value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                <?php 
                }}
                ?>
            </select> <br>
            <input required type="text" name="brand_name" placeholder="Nhập tên loại sản phẩm" value="<?php echo $resultBrand['brand_name'] ?>">
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</div>
</section>
</body>

</html>