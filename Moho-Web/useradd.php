<?php
include "header.php";
include "slider.php";
include "class/user_class.php";
?>
<?php
$user = new user;
if($_SERVER['REQUEST_METHOD']  === 'POST'){
    $insert_user = $user->insert_user($_POST,$_FILES);
    echo '<script>alert("Thêm thành công")</script>';
    echo '<script>location.href = "userlist.php"</script>';
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
                <h1>Thêm tài khoản</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên đăng nhập <span style="color: red;">*</span></label>
                    <input required type="text" name="user_name" id="" />
                    <label for="">Nhập mật khẩu<span style="color: red;">*</span></label>
                    <input required type="text" name="user_password" />
                    <label for="">Nhập quyền truy cập <span class="text-danger">("0": người dùng , "1": quản trị viên)</span><span style="color: red;">*</span></label>
                    <input required type="text" name="user_level" />
                    <label for="">Nhập số điện thoại<span style="color: red;">*</span></label>
                    <input required type="text" name="user_phone" />
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>