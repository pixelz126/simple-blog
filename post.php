<?php
include("home/header.php");
include("home/nav.php");

?>
<div class="content">
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php
            $id = $_GET['id'];
            $select = "SELECT * FROM `posts` WHERE id = '$id' ";
            $query = mysqli_query($conn, $select);
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

            </div>
            <!-- End categories -->
        </div>

    </div>
</div>
</div>
<!-- End content -->

include("home/footer.php");

