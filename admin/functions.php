<?php
//insert
function insert_categories()
{
    global $connection;
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
}
//findallCategories
function findAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo strtoupper("<td>{$cat_title}</td>");
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}
//delete
function deleteCategories(){
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $result = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}
