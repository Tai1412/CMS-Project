<!-- header -->
<?php
include "include/header.php";
?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <?php
            // read all from posts table
            $query = "SELECT * FROM posts";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $post_title = $row["post_title"];
                $post_author= $row["post_author"];
                $post_date= $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];

                echo "<h2> <a href='#'>$post_title </a></h2>";
            ?>



            <!-- First Blog Post -->

            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            
            <!-- end while loop -->
            <?php } ?> 

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>
    <!-- footer -->
    <?php
    include "include/footer.php";
    ?>