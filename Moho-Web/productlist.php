<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$show_product = $product->show_product();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory-list">
        <h1>Danh sách loại sản phẩm</h1>
        <hr>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Loại sản phẩm</th>
                <th>Giá</th>
                <th>Giá khuyến mại</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Tùy biến</th>
            </tr>
            <?php
            if ($show_product) {
                $i = 0;
                while ($result = $show_product->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_id'] ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><?php echo number_format($result['product_price']) ?></td>
                        <td><?php echo number_format($result['product_price_new']) ?></td>
                        <td><?php echo number_format($result['product_quantity']) ?></td>
                        <td><?php echo $result['product_desc'] ?></td>
                        <td><img src="./uploads/<?php echo $result['product_img'] ?>" alt="<?php echo $result['product_name'] ?>" height="100px" width="100px"></td>
                        <td>
                            <a class="btn btn-success" href="productedit.php?product_id=<?php echo $result['product_id']?>">Sửa</a> |
                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa');" href="productdelete.php?product_id=<?php echo $result['product_id']?>">Xóa</a>
                        </td>
                    </tr>
            <?php
                }
            }

            ?>
        </table>
    </div>
</div>
</section>
</body>

</html>