<?php

include("includes/header.php");
include("includes/db.php");
$msg = '';
if (isset($_POST['add'])) {
    $cat = $_POST['category'];
    if (empty($_POST['category'])) {
        $msg = "هذا الحقل لا يمكن ان يكون فارغ";
        $msg_class = "alert-danger";
    } elseif (strlen($_POST['category']) < 5) {
        $msg = "هذا الحقل قصير جداً";
        $msg_class = "alert-danger";
    } else {
        $insert = "INSERT INTO `categories`(`cat_name`) VALUES ('$cat')";
        $query = mysqli_query($conn, $insert);

        if ($query == true) {
            $msg = "تمت إضافة النصنيف";
            $msg_class = "alert-success";
        } else {
            $msg = "خطأ في الاتصال";
            $msg_class = "alert-danger";
        }
    }
}

if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];
     $delete = "DELETE FROM `categories` WHERE id = $cat_id";
     $query = mysqli_query($conn, $delete);

    if ($query == true) {
        $msg = "تم حذف التصنيف";
        $msg_class = "alert-danger";
    } else {
        $msg = "خطأ في الاتصال";
        $msg_class = "alert-danger";
    }
    echo $_GET['id'];
} 

include("includes/sidebar.php");
?>

<div class="col-md-10" id="main-area">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page"> أضف تصنيف</li>
        </ol>
    </nav>
    <div class="add-category">
        <?php if (isset($_POST['add']) || isset($_GET['id'])) {
        ?>
            <div class="alert <?php echo $msg_class; ?>" role="alert">
                <?php echo $msg; ?>
            </div>
        <?php
        } ?>

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="category">أضف تصنيف</label>
                <input type="text" name="category" id="category" class="form-control">
            </div>
            <button class="btn btn-primary btn-custom" name="add">أضافة</button>
        </form>
    </div>

    <div class="cat-table mt-3">

        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم التصنيف</th>
                    <th scope="col">تاريخ الإضافة</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from categories ORDER BY id DESC LIMIT 5";
                $result = mysqli_query($conn, $select);
                $count = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    $count++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $count;?></th>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['cat_date']; ?></td>
                        <td>
                            <a href="categories.php?id=<?php echo $row['id']; ?>">
                                <button class="btn btn-danger" name="trash"><i class="fa-solid fa-trash-can"></i></button>
                            </a>

                            <a href="edit-cat.php?id=<?php echo $row['id']; ?>">
                            <button class="btn btn-primary" name="edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            </a>

                        </td>
                    <?php
                }
                    ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
<!-- End content -->
<!-- JS -->
<?php
include("includes/footer.php");
?>