<?php
include "header.php";
include "slider.php";
include "class/banner_class.php";
?>
<?php
$banner = new banner;
$show_banner = $banner->show_banner();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory-list">
        <h1>Danh sách loại sản phẩm</h1>
        <hr>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tùy biến</th>
            </tr>
            <?php
            if ($show_banner) {
                $i = 0;
                while ($result = $show_banner->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['banner_id'] ?></td>
                        <td><img src="./uploads/<?php echo $result['banner_img'] ?>" alt="<?php echo $result['banner_id'] ?>" height="100px" width="100px"></td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa');" href="bannerdelete.php?banner_id=<?php echo $result['banner_id']?>">Xóa</a>
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