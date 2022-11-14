<?php
include'config.php';
if (!empty($_POST['rdate'])) {

    $Timerquery = mysqli_query($con, "SELECT * from wl_pretty_api_dateschedules where rdate='" . $_POST['rdate'] . "' AND venue='" . $_POST['venue'] . "' AND raceno='" . $_POST['raceno'] . "'");
    $Timerresult = mysqli_fetch_array($Timerquery);
    ?>
    <div class="col-sm-auto offset-sm-2 btn btn-success align-center" disabled><?php echo $Timerresult['starttime']; ?></div>
    <div class="col-sm-6 progress offset-sm-2">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>        
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>        
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>                              
    </div>

<?php } ?>

