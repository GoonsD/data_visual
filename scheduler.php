<?php
include'config.php';
if (!empty($_POST['rdate'])) {
    $rdate = $_POST['rdate'];
    $venueST = "ST";
    $venueHV = "HV";
    $STevent = mysqli_query($con, "SELECT * from wl_pretty_api_dateschedules where rdate='" . $rdate . "' AND venue='" . $venueST . "' ");
    $STTevent = mysqli_query($con, "SELECT * from wl_pretty_api_dateschedules where rdate='" . $rdate . "' AND venue='" . $venueST . "' ");
    $HVevent = mysqli_query($con, "SELECT * from wl_pretty_api_dateschedules where rdate='" . $rdate . "' AND venue='" . $venueHV . "' ");
    $HVVevent = mysqli_query($con, "SELECT * from wl_pretty_api_dateschedules where rdate='" . $rdate . "' AND venue='" . $venueHV . "' ");
    $STTrow = mysqli_fetch_array($STTevent);
    $HVVrow = mysqli_fetch_array($HVVevent);
    ?>
    <?php
    if ($STTrow['venue'] == $venueST || $HVVrow['venue'] == $venueHV) {
        if ($STTrow['venue'] == $venueST) {
            print $venueST;
            while ($STrow = mysqli_fetch_array($STevent)) {
                ?>
                <button type = "button" class = "btn btn-outline-dark btn-sm" data-toggle = "buttons-checkbox" value="<?php echo $STrow['raceno']; ?>"  onclick="timer(this.value, '<?php echo $STrow['rdate']; ?>', '<?php echo $STrow['venue']; ?>')"><?php echo $STrow['raceno']; ?></button>
                <?php
            }
        }
        if ($HVVrow['venue'] == $venueHV) {
            echo 'HV';
            while ($HVrow = mysqli_fetch_array($HVevent)) {
                ?>
                <button type = "button" class = "btn btn-outline-dark btn-sm" data-toggle = "buttons-checkbox" value="<?php echo $HVrow['raceno']; ?>" onclick="timer(this.value, '<?php echo $HVrow['rdate']; ?>', '<?php echo $HVrow['venue']; ?>')"><?php echo $HVrow['raceno']; ?></button>
                <?php
            }
        }
    } else {
        echo 'Venue not available';
    }
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn").each(function () {
            $(this).click(function () {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");
            });
        });
    });
</script>



