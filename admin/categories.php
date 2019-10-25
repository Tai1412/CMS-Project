<?php include "include/admin_header.php" ?>

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
                        <?php
                        if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];
                            if ($cat_title == "" || empty($cat_title)) {
                                echo "This Field should not be empty";
                            } else {
                                $query = "INSERT INTO categories(cat_title)";
                                $query .= "VALUE('{$cat_title}')";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <!-- add category form -->
                    </div>

                    <div class="col-xs-6">
                        <?php
                        $query = "SELECT * FROM categories";
                        $result = mysqli_query($connection, $query);
                        ?>
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
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo strtoupper("<td>{$cat_title}</td>");
                                    echo "</tr>";
                                }
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