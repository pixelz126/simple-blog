<?php

include("includes/header.php");
include("includes/db.php");
$msg = '';
if(isset($_POST['post'])){
    if( empty($_POST['title'])|| empty($_POST['desc']) ){
        $msg =  "الرجاء ملء الحقل أدناه";
        $msg_class = "alert-danger";
    }else{
         $post_title =  $_POST['title'];
         $post_name =  $_POST['cat'];
        //  $post_image =  $_POST['image'];
         $post_details =  $_POST['desc'];
         $post_author = 'محمد عادل';
        
         $filename = $_FILES["image"]["name"];
         $tempname = $_FILES["image"]["tmp_name"];    
         $folder = "images/".$filename;
         move_uploaded_file($tempname, $folder);

        //Insert into DB
        $insert = "INSERT INTO `posts`(`post_title`, `post_name`, `post_image`, `post_details`, `post_author`) 
                             VALUES ('$post_title ','$post_name','$filename','$post_details','$post_author')";
        $query = mysqli_query($conn, $insert);
        if ($query == true) {
            $msg = "تم نشر المقال";
            $msg_class = "alert-success";
        } else {
            $msg = "خطأ ما حدث";
            $msg_class = "alert-danger";
        }
        //echo ($query == true) ? 'تمت إضافة النصنيف' : 'خطأ في الاتصال';
    }
}

include("includes/sidebar.php");

?>

<div class="col-md-10" id="main-area" style="margin-top: 20px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page"> اضف مقال</li>
        </ol>
    </nav>

    <div class="add-category">
    <?php if (isset($_POST['post'])) {
        ?>
            <div class="alert <?php echo $msg_class; ?>" role="alert">
                <?php echo $msg;?>
            </div>
        <?php
        } ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">عنوان المقال</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="cat">التصنيف</label>
                <select name="cat" id="cat" class="form-control">
                    <?php
                    $select = "select * from categories ORDER BY id DESC";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    ?>
                        <option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?> </option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <div class="image">
                    <label for="image">أضف صورة</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="desc">
                    <label for="desc">تفاصيل المقال</label>
                    <textarea name="desc" id="desc" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <button class="btn btn-primary btn-custom" name="post">نشر المقال</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
<!-- End content -->
<?php
include("includes/footer.php");
?>