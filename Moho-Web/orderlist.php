<?php 
    include "header.php";
    include "slider.php";
    include "class/order_class.php";
?>
<?php 
    $order = new order;

    $show_order = $order -> show_order();
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory-list">
        <h1>Danh sách danh mục</h1><hr>
        <table>
            <tr>
                <th>STT</th>
                <th>Order_id</th>
                <th>User_id</th>
                <th>Order_address</th>
                <th>Order_phone</th>
                <!-- <th>Tùy biến</th> -->
            </tr>
            <?php
            if ($show_order) {
                $i = 0;
                while ($result = $show_order->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['order_id'] ?></td>
                        <td><?php echo $result['user_id'] ?></td>
                        <td><?php echo $result['order_address'] ?></td>
                        <td><?php echo $result['order_phone'] ?></td>
                        <!-- <td>
                            <a class="btn btn-success" href="orderedit.php?order_id=<?php echo $result['order_id']?>">Sửa</a> |
                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa');" href="orderdelete.php?order_id=<?php echo $result['order_id']?>">Xóa</a>
                        </td> -->
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