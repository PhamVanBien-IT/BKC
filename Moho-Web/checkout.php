<?php include "navbarorder.php" ?>
        <section class="cart">
            <div class="container">
                <div class="cart-content">
                    <div class="cart-content-left">
                        <h3 class="text-center mb-2">Thông tin đơn hàng</h1>
                            <hr>
                            <table>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php if ($show_cart_detail) {
                                    while ($resultCartDetail = $show_cart_detail->fetch_assoc()) {
                                        $tongSanPham += $resultCartDetail["cart_detail_product_quantity"];
                                        $tongTien += $resultCartDetail["cart_detail_product_quantity"] * $resultCartDetail["cart_detail_product_price"];
                                ?>
                                        <tr>
                                            <td><img src="./uploads/<?php echo $resultCartDetail["cart_detail_product_img"] ?>" alt="Hinh1"></td>
                                            <td>
                                                <p><?php echo $resultCartDetail["cart_detail_product_name"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $resultCartDetail["cart_detail_product_quantity"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo number_format(($resultCartDetail["cart_detail_product_price"] * $resultCartDetail["cart_detail_product_quantity"])) ?><sup>đ</sup></p>
                                            </td>
                                        </tr>
                                <?php  }
                                } ?>
                            </table>
                            <table>
                                <tr>
                                    <th colspan="2" style="font-size: 20px;text-align: center;">Tổng tiền giỏ hàng</th>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        TỔNG SẢN PHẨM
                                    </td>
                                    <td style="font-size: 15px;"><?php echo number_format($tongSanPham) ?> </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">TỔNG TIỀN HÀNG</td>
                                    <td>
                                        <p style="color: red;font-weight: bold; font-size: 15px;"><?php echo number_format($tongTien) ?><sup>đ</sup></p>
                                    </td>
                                </tr>
                            </table>
                            <div class="cart-content-right-button mt-3">
                                <a href="home.php" class="btn btn-success">Quay lại</a>
                            </div>
                    </div>
                </div>
        </section>
        <?php include "footer.php" ?>