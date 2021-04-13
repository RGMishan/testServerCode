<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
} else {
?>

<?php
    if (isset($_GET['delete_box'])) {
        $delete_id = $_GET['delete_box'];
        $delete_box = "DELETE FROM boxes_section WHERE box_id = '$delete_id'";
        $run_query = mysqli_query($con, $delete_box);

        if ($run_query) {
            echo "<script>alert('One Box has Been Deleted Successfully') </script>";
            echo "<script>window.open('index.php?view_box', '_self')</script>";
        }
    }
?>
<?php } ?>