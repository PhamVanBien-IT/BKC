<?php
include "header.php";
include "slider.php";
include "class/feedback_class.php";
?>
<?php
$feedback = new feedback;
$show_feedback = $feedback->show_feedback();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory-list">
        <h1>Danh sách danh mục</h1><hr>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Nội dung</th>
                <th>User_id</th>
                <th>Tùy biến</th>
            </tr>
            <?php
            if ($show_feedback) {
                $i = 0;
                while ($result = $show_feedback->fetch_assoc()) { $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['feedback_id'] ?></td>
                        <td><?php echo $result['feedback_content'] ?></td>
                        <td><?php echo $result['user_id'] ?></td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa');" href="feedbackdelete.php?feedback_id=<?php echo $result['feedback_id']?>">Xóa</a>
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