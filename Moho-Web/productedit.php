<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$product_id = $_GET['product_id'];


$get_product = $product->get_product($product_id);
if ($get_product) {
    $resultProduct = $get_product->fetch_assoc();
}

?>
<?php
if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $product_name = $_POST['product_name'];
    $cartegory_id = $_POST['cartegory_id'];
    $brand_id = $_POST['brand_id'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $product_price_new = $_POST['product_price_new'];
    $product_desc = $_POST['product_desc'];
    $product_img = $_FILES['product_img']['name'];

    $update_product = $product->update_product($product_id, $product_name, $cartegory_id, $brand_id, $product_quantity, $product_price, $product_price_new, $product_desc, $product_img);

    echo '<script>alert("Cập nhật thành công")</script>';
    echo '<script>location.href = "productlist.php"</script>';
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
        <h1>Cập nhật sản phẩm</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
            <input required type="text" name="product_name" id="" value="<?php echo $resultProduct['product_name'] ?>" />
            <label for="">Chọn danh mục<span style="color: red;">*</span></label>
            <select required name="cartegory_id" id="">
                <option value="#">--- Chọn---</option>
                <?php
                $i = 0;
                $show_cartegory = $product->show_cartegory();
                if ($show_cartegory) {
                    while ($result = $show_cartegory->fetch_assoc()) {
                        $i++;
                ?>
                        <option <?php if ($resultProduct['cartegory_id'] = $result['cartegory_id']) {
                                    echo "SELECTED";
                                } ?> value=<?php echo $result['cartegory_id'] ?>><?php echo $result['cartegory_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label>
            <select required name="brand_id" id="">
                <option value="#">--- Chọn ---</option>
                <?php
                $show_brand = $product->show_brand();
                if ($show_brand) {
                    while ($result = $show_brand->fetch_assoc()) {
                ?>
                        <option <?php if ($resultProduct['brand_id'] = $result['brand_id']) {
                                    echo "SELECTED";
                                } ?> value=<?php echo $result['brand_id'] ?>><?php echo $result['brand_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <label for="">Nhập giá số lượng<span style="color: red;">*</span></label>
            <input required type="text" name="product_quantity" value="<?php echo $resultProduct['product_quantity'] ?>" />
            <label for="">Nhập giá sản phẩm<span style="color: red;">*</span></label>
            <input required type="text" name="product_price" value="<?php echo $resultProduct['product_price'] ?>" />
            <label for="">Nhập giá khuyến mại<span style="color: red;">*</span></label>
            <input required type="text" name="product_price_new" value="<?php echo $resultProduct['product_price_new'] ?>" />
            <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
            <textarea required name="product_desc" id="product_desc" cols="30" rows="10" aria-valuetext="<?php echo $resultProduct['product_desc'] ?>"></textarea>
            <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
            <input required type="file" name="product_img" />
            <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
            <input required type="file" name="product_img_desc" multiple />
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</div>
</section>
</body>

</html>