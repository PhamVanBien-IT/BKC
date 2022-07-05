<?php
include "navbar.php";
?>
            <div class="list-product container">
                <?php
                if ($show_search) {
                ?>
                    <div class="title-list row mt-2 fs-5">
                        <p class="col-10"><a href="#" class="text-decoration-none fw-bold text-success">Danh sách tìm kiếm</a></p>
                    </div>
                    <div class="row">
                        <?php
                        while ($resultSearch = $show_search->fetch_assoc()) {
                        ?>
                            <div class="col-lg-3 col-6 mt-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <a href="#"><img src="<?php echo "./uploads/" . $resultSearch['product_img'] ?>" class="card-img-top" alt="Anh"></a>
                                        <a href="productdetail.php?product_id=<?php echo $resultSearch['product_id'] ?>" class="card-title text-decoration-none text-dark fw-bold"><?php echo $resultSearch['product_name'] ?></a>
                                        <p class="card-text mt-3 text-danger"><?php echo number_format($resultSearch['product_price']) ?> VNĐ</a>
                                        <p class="card-text">Đã bán 1k+</a><br><br>
                                            <a href="cart.php?product_id=<?php echo $resultSearch['product_id'] ?>&action=add" class="btn btn-success">Mua hàng</a>
                                            <a href="cart.php?product_id=<?php echo $resultSearch['product_id'] ?>&action=add"" class=" btn btn-danger">Thêm vào giỏ</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <div class="title-list row mt-2 fs-5">
                            <p class="col-10"><a href="#" class="text-decoration-none fw-bold text-success">Sản phẩm bán chạy</a></p>
                            <p class="col-2"><a href="#" class="text-decoration-none fw-bold text-success">Xem thêm</a></p>
                        </div>
                        <div class="row">
                            <?php
                            if ($show_product) {
                                while ($resultProduct = $show_product->fetch_assoc()) {
                            ?>
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <a href="#"><img src="<?php echo "./uploads/" . $resultProduct['product_img'] ?>" class="card-img-top" alt="Anh"></a>
                                                <a href="productdetail.php?product_id=<?php echo $resultProduct['product_id'] ?>" class="card-title text-decoration-none text-dark fw-bold"><?php echo $resultProduct['product_name'] ?></a>
                                                <p class="card-text mt-3 text-danger"><?php echo number_format($resultProduct['product_price']) ?> VNĐ</a>
                                                <p class="card-text">Đã bán 1k+</a><br><br>
                                                    <a href="cart.php?product_id=<?php echo $resultProduct['product_id'] ?>&action=add" class="btn btn-success">Mua hàng</a>
                                                    <a href="cart.php?product_id=<?php echo $resultProduct['product_id'] ?>&action=add" class=" btn btn-danger">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                        <div class="col">
                            <div class="card h-100">
                                <img src="../public/assets/image/background_banner_1.webp" alt="Banner1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../public/assets/image/background_banner_2.webp" alt="Banner2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../public/assets/image/background_banner_3.webp" alt="Banner3">
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($show_search) {
                    ?>
                        <?php
                        while ($resultSearch = $show_search->fetch_assoc()) {
                        ?>
                            <div class="col-lg-3 col-6 mt-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <a href="#"><img src="<?php echo "./uploads/" . $resultSearch['product_img'] ?>" class="card-img-top" alt="Anh"></a>
                                        <a href="productdetail.php?product_id=<?php echo $resultSearch['product_id'] ?>" class="card-title text-decoration-none text-dark fw-bold"><?php echo $resultSearch['product_name'] ?></a>
                                        <p class="card-text mt-3 text-danger"><?php echo number_format($resultSearch['product_price']) ?> VNĐ</a>
                                        <p class="card-text">Đã bán 1k+</a><br><br>
                                                    <a href="cart.php?product_id=<?php echo $resultProduct['product_id'] ?>&action=add" class="btn btn-success">Mua hàng</a>
                                                    <a href="cart.php?product_id=<?php echo $resultProduct['product_id'] ?>&action=add" class=" btn btn-danger">Thêm vào giỏ</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="title-list row mt-2 fs-5">
                            <p class="col-10"><a href="#" class="text-decoration-none fw-bold text-success">Sản phẩm mới nhất</a></p>
                            <p class="col-2"><a href="#" class="text-decoration-none fw-bold text-success">Xem thêm</a></p>
                        </div>
                        <div class="row">
                            <?php
                            if ($show_product_new) {
                                while ($resultProductNew = $show_product_new->fetch_assoc()) {
                            ?>
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <a href="#"><img src="./uploads/<?php echo $resultProductNew['product_img'] ?>" class="card-img-top" alt="Anh"></a>
                                                <a href="#" class="card-title text-decoration-none text-dark fw-bold"><?php echo $resultProductNew['product_name'] ?></a>
                                                <p class="card-text mt-3 text-danger"><?php echo number_format($resultProductNew['product_price']) ?> VNĐ</a>
                                                <p class="card-text">Đã bán 1k+</a><br><br>
                                                    <a href="cart.php?product_id=<?php echo $resultProductNew['product_id'] ?>&action=add" class="btn btn-success">Mua hàng</a>
                                                    <a href="cart.php?product_id=<?php echo $resultProductNew['product_id'] ?>&action=add" class=" btn btn-danger">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
<?php include "footer.php" ?>