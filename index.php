<?php
include'config.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>App glory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.2/fc-4.2.1/fh-3.3.1/r-2.4.0/rg-1.3.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/sr-1.2.0/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.css" integrity="sha512-tJYqW5NWrT0JEkWYxrI4IK2jvT7PAiOwElIGTjALSyr8ZrilUQf+gjw2z6woWGSZqeXASyBXUr+WbtqiQgxUYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container" style="padding-top: 5%">
            <div id="scheduler" class="card" style="padding: 1%;width: 80%; margin: 5px auto">
                <div class="row">
                    <div class="col-md-3 offset-md-1">
                        <div id="list">
                            <input type="date" value="2022-09-11" name="scheduler" style="width:80%" onchange="scheduler(this.value);">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="eventpicker" id="event">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center" style="padding-top: 20px" id="timer">

                </div>
            </div>
            <div id="table">
                <?php
                $result = mysqli_query($con, "SELECT * FROM wl_pretty_api_datatables_admin");
                $row = mysqli_fetch_array($result);
                ?>
                <p> <?php echo 'Event date   ' . $row['rdate'] . '</br>Event venue:' . $row['venue'] . '</br>Date created:' . $row['created_at']; ?></p>
                <?php
                $data = $row['docdata'];
                $array = json_decode($data, true);
                $array2 = $array['rows'];
                $array3 = $array['cols'];
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

            </div>

            <!-- Apexchart.js -->
            <div id="chart"></div>
        </div>

    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.2/fc-4.2.1/fh-3.3.1/r-2.4.0/rg-1.3.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/sr-1.2.0/datatables.min.js"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script>
                                jQuery(document).ready(function ($) {
                                    $('#example').DataTable({
                                        scrollX: true,
                                    });
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
            });
        }

    </script>
    <script>
        function timer(raceno, rdate, venue) {
            console.log(raceno, rdate, venue)
            $.ajax({
                type: "POST",
                url: "timer.php",
                data: {rdate: rdate, raceno: raceno, venue: venue},
                success: function (data) {
                    $("#timer").html(data);
                }
            });
            $.ajax({
                type: "POST",
                url: "table.php",
                data: {rdate: rdate, raceno: raceno, venue: venue},
                success: function (data) {
                    $("#table").html(data);
                }
            });
        }
    </script>

</html>
