<section class="admin-content">
    <div class="admin-content-left">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a class="cartegory" href="#">Quản lý danh mục <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="cartegory_list">
                    <li><a href="cartegoryadd.php">Thêm danh mục</a></li>
                    <li><a href="cartegorylist.php">Danh sách danh mục</a></li>
                </ul>
            </li>
            <li><a class="brand" href="#">Quản lý loại sản phẩm <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="brand_list">
                    <li><a href="brandadd.php">Thêm loại sản phẩm</a></li>
                    <li><a href="brandlist.php">Danh sách loại sản phẩm</a></li>
                </ul>
            </li>
            <li><a class="product" href="#">Quản lý sản phẩm <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="product_list">
                    <li><a href="productadd.php">Thêm sản phẩm</a></li>
                    <li><a href="productlist.php">Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li><a class="user" href="#">Quản lý tài khoản <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="user_list">
                    <li><a href="useradd.php">Thêm tài khoản</a></li>
                    <li><a href="userlist.php">Danh sách tài khoản</a></li>
                </ul>
            </li>
            <li>
                <a class="order" href="#">Quản lý đơn hàng <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="order_list">
                    <li><a href="orderlist.php">Danh sách đơn hàng</a></li>
                </ul>
            </li>
            <li>
                <a class="order_detail" href="#">Quản lý hóa đơn <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="order_detail_list">
                    <li><a href="orderdetaillist.php">Danh sách hóa đơn</a></li>
                </ul>
            </li>
            <li>
                <a class="banner" href="#">Quản lý banner <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="banner_list">
                    <li><a href="banneradd.php">Thêm banner</a></li>
                    <li><a href="bannerlist.php">Danh sách banner</a></li>
                </ul>
            </li>
            <li>
                <a class="feedback" href="#">Quản lý phản hồi <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                <ul class="feedback_list">
                    <li><a href="feedbacklist.php">Danh sách phản hồi</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <script>
        var cartegory = document.querySelector('.cartegory');
        var brand = document.querySelector('.brand');
        var product = document.querySelector('.product');
        var user = document.querySelector('.user');
        var order = document.querySelector('.order');
        var order_detail = document.querySelector('.order_detail');
        var banner = document.querySelector('.banner');
        var feedback = document.querySelector('.feedback');


        var cartegorys = document.querySelector('.cartegory_list');
        var brands = document.querySelector('.brand_list');
        var products = document.querySelector('.product_list');
        var users = document.querySelector('.user_list');
        var orders = document.querySelector('.order_list');
        var order_details = document.querySelector('.order_detail_list');
        var banners = document.querySelector('.banner_list');
        var feedbacks = document.querySelector('.feedback_list');


        cartegory.addEventListener("click", function() {
            cartegorys.classList.toggle('hide');
        })

        brand.addEventListener("click", function() {
            brands.classList.toggle('hide');
        })

        product.addEventListener("click", function() {
            products.classList.toggle('hide');
        })

        user.addEventListener("click", function() {
            users.classList.toggle('hide');
        })

        order.addEventListener("click", function() {
            orders.classList.toggle('hide');
        })

        order_detail.addEventListener("click", function() {
            order_details.classList.toggle('hide');
        })

        banner.addEventListener("click", function() {
            banners.classList.toggle('hide');
        })

        feedback.addEventListener("click", function() {
            feedbacks.classList.toggle('hide');
        })

    </script>