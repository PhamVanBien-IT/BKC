<?php
include "header.php";
include "slider.php";
include "class/user_class.php";
?>
<?php
$user = new user;
$show_user = $user->show_user();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory-list">
        <h1>Danh sách người dùng</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Phân loại người dùng</th>
                <th>Số điện thoại</th>
                
            </tr>
            <?php
            if ($show_user) {
                $i = 0;
                while ($result = $show_user->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['user_id'] ?></td>
                        <td><?php echo $result['user_name'] ?></td>
                        <td><?php echo $result['user_password'] ?></td>
                        <td><?php echo $result['user_level'] ?></td>
                        <td><?php echo $result['user_phone'] ?></td>
                        <td>
                            <a class="btn btn-success" href="useredit.php?user_id=<?php echo $result['user_id']?>">Sửa</a> |
                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa');" href="userdelete.php?user_id=<?php echo $result['user_id']?>">Xóa</a>
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