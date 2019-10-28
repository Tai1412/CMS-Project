<?php include "include/admin_header.php"; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/admin_navigation.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        WELCOME TO ADMIN SITE
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                        <!-- insert categories to db from admin -->
                        <?php insert_categories(); ?>
                        <!-- add category form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php //Update and include query
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "include/update_categories_.php";
                        }
                        ?>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- display categories for admin cms by id and title -->
                                <?php
                                findAllCategories();
                                ?>
                                <?php
                                deleteCategories();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "include/admin_footer.php" ?>