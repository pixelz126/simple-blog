<?php

include("includes/header.php");
include("includes/db.php");
$msg = '';


    $id = $_GET['id'];
    $select = "select cat_name from categories WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

if (isset($_POST['edit'])) {
    $cat = $_POST['category'];
    if (empty($_POST['category'])) {
        $msg = "هذا الحقل لا يمكن ان يكون فارغ";
        $msg_class = "alert-danger";
    } elseif (strlen($_POST['category']) < 5) {
        $msg = "هذا الحقل قصير جداً";
        $msg_class = "alert-danger";
    } else {
        $update = "UPDATE `categories` SET `cat_name`='$cat' WHERE `id` = '$id' ";
        $query = mysqli_query($conn, $update);

        if ($query == true) {
            $msg = "تم تعديل النصنيف";
            $msg_class = "alert-success";
            header( "refresh:3;url=categories.php" );
            die;
        } else {
            $msg = "خطأ في الاتصال";
            $msg_class = "alert-danger";
        }
    }
}

include("includes/sidebar.php");
?>

<div class="col-md-10" id="main-area">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page">تعديل التصنيف</li>
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
                <?php 
                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                        ?>
                        <input type="text" value="<?php echo $row['cat_name']; ?>"  name="category" id="category" class="form-control">
                        <?php 
                    }
                ?>
                
            </div>
            <button class="btn btn-primary btn-custom" name="edit">تعديل</button>
        </form>
    </div>

</div>