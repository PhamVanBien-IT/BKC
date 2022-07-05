<?php 
    include "header.php";
    include "slider.php";
    include "class/order_class.php";
?>
<?php 
    $order = new order;

    $show_order_detail = $order -> show_order_detail();
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory-list">
        <h1>Danh sách danh mục</h1><hr>
        <table>
            <tr>
                <th>STT</th>
                <th>Order_id</th>
                <th>Product_id</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thời gian</th>
            </tr>
            <?php
            if ($show_order_detail) {
                $i = 0;
                while ($result = $show_order_detail->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['order_id'] ?></td>
                        <td><?php echo $result['product_id'] ?></td>
                        <td><?php echo $result['order_detail_quantity'] ?></td>
                        <td><?php echo $result['order_detail_price'] ?></td>
                        <td><?php echo $result['create_at'] ?></td>
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