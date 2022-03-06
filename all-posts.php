<?php

include("includes/header.php");
include("includes/db.php");

if (isset($conn)) {
    $select = "SELECT * FROM `posts` ORDER BY id DESC";
    $query = mysqli_query($conn, $select);
}

include("includes/sidebar.php");

?>

<div class="cat-table mt-3 mr-3">

    <table class="table table-bordered table-hover ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان المقال</th>
                <th scope="col">تاريخ الإضافة</th>
                <th scope="col">تصنيف المقال</th>
                <th scope="col">صورة المقال </th>
                <th scope="col">محتوي المقال </th>
                <th scope="col">كاتب المقال </th>
                <th scope="col"> حذف أو تعديل </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                $count++;
            ?>
                <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td>
                        <?php
                        $title = substr($row['post_title'], 0, 25);
                        echo $title . "...";
                        ?>
                    </td>
                    <td><?php echo  $row['post_date'];  ?></td>
                    <td><?php echo  $row['post_name'];  ?></td>
                    <td><img src="images/<?php echo  $row['post_image'];  ?>" alt="Image 1" width="70" height="50"></td>
                    <td>
                        <?php
                        $details = substr($row['post_details'], 0, 50);
                        echo $details . "...";
                        ?>
                    </td>
                    <td><?php echo  $row['post_author'];  ?></td>
                    <td>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </td>
                <?php
            }
                ?>
                </tr>
        </tbody>
    </table>
</div>

<?php
include("includes/footer.php");
?>