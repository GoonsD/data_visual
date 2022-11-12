<?php
include'config.php';
if (!empty($_POST['rdate'])) {
    $rdate = $_POST['rdate'];
    $event = mysqli_query($con, "SELECT * from wl_pretty_api_dateschedules where rdate='" . $rdate . "'");
    while ($row1 = mysql_fetch_array($event)) {
        ?>
        <button type = "button" class = "btn btn-outline-dark btn-sm" data-toggle = "button"><?php echo $row1['raceno']; ?></button>
        <?php
    }
}


