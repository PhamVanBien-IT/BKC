<?php include "navbarorder.php";

?>
        <?php if (isset($_SESSION['user'])) { ?>
            <section class="cart">
                <div class="container">
                    <div class="cart-content">
                        <div class="cart-content-left">
                            <table>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
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
                                                <form action="cart.php" method="GET">
                                                    <input type="hidden" name="action" id="action" value="update">
                                                    <input type="text" hidden name="product_id" id="product_id" value="<?php echo $resultCartDetail["cart_detail_product_id"] ?>" />
                                                    <input style="width: 100px;" type="number" name="product_quantity" value="<?php echo $resultCartDetail["cart_detail_product_quantity"] ?>" min="1" />
                                                    <button type="submit">Cập nhật</button>
                                                </form>
                                            </td>
                                            <td>
                                                <p><?php echo number_format(($resultCartDetail["cart_detail_product_price"] * $resultCartDetail["cart_detail_product_quantity"])) ?><sup>đ</sup></p>
                                            </td>
                                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa');" href="cart.php?product_id=<?php echo $resultCartDetail["cart_detail_product_id"] ?>&action=delete" class="text-decoration-none btn btn-danger">Hủy</a></td>
                                        </tr>
                                <?php  }
                                } ?>
                            </table>
                        </div>
                        <div class="cart-content-right">
                            <div class="delivery-content-left-input-top-item ">
                                <p class="text-danger fw-bold fs-5 text-center">Vui lòng nhập thông tin</p>
                                <form class="row g-3" method="POST">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Họ và tên <sup class="text-danger">*</sup></label>
                                        <input required type="text" class="form-control" id="name" placeholder="Nhập họ tên " value="<?php echo $user_name["user_name"] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Số điện thoại <sup class="text-danger">*</sup></label>
                                        <input required type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="<?php echo $user_name["user_phone"] ?>" />
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Địa chỉ <sup class="text-danger">*</sup></label>
                                        <input required type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
                                    </div>
                                    <div class="col-12">
                                        <label for="city" class="form-label">Thành phố <sup class="text-danger">*</sup></label>
                                        <input required type="text" class="form-control" id="city" placeholder="Nhập thành phố">
                                    </div>
                                    <hr>
                                    <table class="ms-3">
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
                                    <button type="submit" class="ms-3 btn btn-success">Đặt hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                Vui lòng đăng nhập để xem <a href="login.php" class="alert-link">Đăng nhập</a>
            </div>
        <?php } ?>
<?php include "footer.php" ?>