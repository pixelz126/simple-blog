<?php 
    include("home/header.php");
    include("home/nav.php");
?>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                    ?>
                        <div class="post">
                            <div class="post-image">
                                <img src="images/<?php echo  $row['post_image'];  ?>" alt="Image 1">
                            </div>
                            <div class="post-title">
                                <h4><?php echo  $row['post_title'];  ?></h4>
                            </div>
                            <div class="post-details">
                                <p class="post-info">
                                    <span><i class="fas fa-user tags"></i><?php echo  $row['post_author']; ?></span>
                                    <span><i class="fa-solid fa-calendar-days tags"></i><?php echo  $row['post_date']; ?></span>
                                    <span><i class="fa-solid fa-tags tags"></i><?php echo  $row['post_name']; ?></span>
                                </p>
                                <p>
                                    <?php echo  $row['post_details']; ?>
                                </p>
                                <a href="post.php?id=<?php echo $row['id'];  ?>"><button class="btn btn-primary btn-custom">إقرأ المزيد </button></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <!-- Categories -->
                <div class="col-md-3">
                    <div class="categories">
                        <h4>التصنيفات</h4>
                        <ul>
                            <?php
                            $select_cat = "select * from categories ORDER BY id DESC LIMIT 5";
                            $result_cat = mysqli_query($conn, $select_cat);
                            while ($row_cat = mysqli_fetch_array($result_cat, MYSQLI_BOTH)) {
                            ?>
                                <li>
                                    <a href="">
                                        <span><i class="fa-solid fa-tags"></i></span>
                                        <span><?php echo $row_cat['cat_name']; ?></span>
                                    </a>
                                <?php
                            }
                                ?>
                                </li>

                        </ul>
                    </div>
                    <!-- End categories -->
                    <!-- Start latest posts -->
                    <div class="latest-posts">
                        <h4>أحدث المنشورات</h4>
                        <ul>
                            <?php
                            $select_post = "select * from posts ";
                            $result_post = mysqli_query($conn, $select_post);
                            while ($row_post = mysqli_fetch_array($result_post, MYSQLI_BOTH)) {
                            ?>
                                <li>
                                    <a href="#">
                                        <span class="float-left latest-img"><img src="images/<?php  echo $row_post['post_image']; ?>" alt="Image 1" width="90" height="60"></span>
                                        <span>
                                            <?php 
                                            //echo $row_post['post_title'];
                                    
                                             $title = substr($row_post['post_title'], 0, 50);
                                             echo $title ;//. "...";?>
                                        </span>
                                    </a>
                                <?php
                            }
                                ?>
                                </li>
                        </ul>
                    </div>
                    <!-- End latest posts -->
                </div>

            </div>
        </div>
    </div>
    <!-- End content -->

<?php include("home/footer.php");