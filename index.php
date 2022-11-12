<!DOCTYPE html>
<?php
include'config.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>App glory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.css" integrity="sha512-tJYqW5NWrT0JEkWYxrI4IK2jvT7PAiOwElIGTjALSyr8ZrilUQf+gjw2z6woWGSZqeXASyBXUr+WbtqiQgxUYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container" style="padding-top: 5%">
            <div id="scheduler" class="card" style="padding: 1%;width: 80%; margin: 5px auto">
                <div class="row">
                    <div class="col-md-3 offset-md-1">
                        <div id="list">
                            <input type="date" value="2022-01-31" name="scheduler" style="width:80%" onchange="scheduler(this.value);">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="eventpicker" id="event">
<!--                            <span class="eventgroup">
                                ST
                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="button">1</button>
                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="button">1</button>
                            </span>-->
                            <span class="">
                                HV
                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="button">1</button>
                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="button">1</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 20px">
                    <div class="col-sm-auto offset-sm-2 btn btn-success align-center">12:30</div>
                    <div class="col-sm-6 progress offset-sm-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>        
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>        
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>                              
                    </div>
                </div>
            </div>
            <div id="table">
                <?php
                $result = mysqli_query($con, "SELECT * FROM wl_pretty_api_datatables");
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <p> <?php echo 'Event date   ' . $row['rdate'] . '</br>Event venue:' . $row['venue'] . '</br>Date created:' . $row['created_at']; ?></p>
                    <?php
                    $data = $row['docdata'];
                    $array = json_decode($data, true);
                    $array2 = $array[rows];
                    $array3 = $array[cols];
                    ?>
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <?php
                                foreach ($array3 as $key2 => $value2) {
                                    ?>
                                    <th><?php echo $value2; ?>
                                        <?php
                                    }
                                    ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array2 as $key => $value) {
                                ?>
                                <tr>
                                    <?php
                                    foreach ($value as $key2 => $value2) {
                                        ?>
                                        <td><?php echo $value2; ?>
                                            <?php
                                        }
                                        ?>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>

            <!-- Apexchart.js -->
            <div id="chart"></div>
        </div>

    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="main.js"></script>
    <script>
                                jQuery(document).ready(function ($) {
                                    $('#example').DataTable({
                                        scrollX: true,
                                    });
                                });
                                $('#list2').select2({
                                    placeholder: "Select a date",
                                });
    </script>
    <script>
        function scheduler(val) {            
            $.ajax({
                type: "POST",
                url: "scheduler.php",
                data: 'rdate=' + val,
                success: function (data) {
                    $("#event").html(data);
                }
                        .error: function(data){
                    alert("fail");
                }
            });
        }

    </script>
</html>
