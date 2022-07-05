<?php
include "header.php";
include "slider.php";
include "class/dashboard.php";
?>
<?php
$dashboard = new dashboard;

$show_quantity_product = $dashboard->show_quantity_product();

if ($show_quantity_product) {
    $result_quantity_product = $show_quantity_product->fetch_assoc();
}

$show_quantity_order = $dashboard->show_quantity_order();

if ($show_quantity_order) {
    $result_quantity_order = $show_quantity_order->fetch_assoc();
}

$show_quantity_user = $dashboard->show_quantity_user();

if ($show_quantity_user) {
    $result_quantity_user = $show_quantity_user->fetch_assoc();
}
$show_quantity_money = $dashboard->show_quantity_money();

if ($show_quantity_money) {
    $result_quantity_money = $show_quantity_money->fetch_assoc();
}

$show_quantity_product_ton = $dashboard-> show_quantity_product_ton();

?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1 style="color: brown;">Dashboard</h1>
        <hr>
            <div class="row ms-1">
            <div class="col-6 col-sm-3 card bg-primary mb-3">
                <div class="text-white card-header">Số lượng sản phẩm <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></div>
                <div class="card-body">
                    <h5 class="text-white card-title"><?php echo $result_quantity_product['COUNT(product_id)'] ?> </h5>
                </div>
            </div>
            <div class="col-6 col-sm-3 card bg-secondary mb-3">
                <div class="text-white card-header">Số đơn hàng <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg></div>
                <div class="card-body">
                    <h5 class=" text-white card-title"><?php echo $result_quantity_order['COUNT(order_id)'] ?></h5>
                </div>
            </div>
            <div class="col-6 col-sm-3 card bg-success mb-3">
                <div class="text-white card-header">Số người dùng <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div>
                <div class="card-body">
                    <h5 class=" text-white card-title"><?php echo $result_quantity_user['COUNT(user_id)'] ?></h5>
                </div>
            </div>
            <div class="col-6 col-sm-3 card bg-danger mb-3">
                <div class="text-white card-header">Doanh số <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></div>
                <div class="card-body">
                    <h5 class=" text-white card-title"><?php echo number_format($result_quantity_money['SUM(order_detail_price)']) ?></h5>
                </div>
            </div>
            </div>
            <h2>Danh sách sản phẩm tồn kho</h2>
            <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
            <?php
            if ($show_quantity_product_ton) {
                $i = 0;
                while ($result_quantity_product_ton = $show_quantity_product_ton->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result_quantity_product_ton['product_id'] ?></td>
                        <td><?php echo $result_quantity_product_ton['product_name'] ?></td>
                        <td><?php echo number_format($result_quantity_product_ton['product_price']) ?></td>
                        <td><?php echo number_format($result_quantity_product_ton['product_quantity']) ?></td>
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