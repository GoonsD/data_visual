<?php
include'config.php';
if (!empty($_POST['rdate']) && !empty($_POST['venue']) && !empty($_POST['raceno'])) {
    $tablequery = mysqli_query($con, "SELECT * from wl_pretty_api_datatables_admin where rdate='" . $_POST['rdate'] . "' AND venue='" . $_POST['venue'] . "'");
    $tableresult = mysqli_fetch_array($tablequery);
    $datatable = json_decode($tableresult['docdata'], true);
    ?>
    <table id="example1" class="display nowrap stripe row-border order-column" style="width:100%">
        <thead>
            <tr>
                <?php
                for ($i = 3; $i < count($datatable['cols']); $i++) {
                    ?>
                    <th><?php echo $datatable['cols'][$i]; ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($datatable['rows']); $i++) {
                if ($datatable['rows'][$i]['2'] == $_POST['raceno']) {
                    ?>
                    <tr>
                        <?php
                        if ($datatable['rows'][$i]['3'] == true || $datatable['rows'][$i]['4'] == true) {
                            ?>
                            <td style="white-space: nowrap"><input type="checkbox" name="condition" value="condition1"></td>
                            <td style="white-space: nowrap"><input type="checkbox" name="condition" value="condition2"></td>
                            <?php
                        }

                        for ($j = 5; $j < count($datatable['rows'][$i]); $j++) {
                            ?>
                            <td style="white-space: nowrap">
                                <?php echo $datatable['rows'][$i][$j]; ?></td>
                                <?php
                            }
                            ?>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <script>
        jQuery(document).ready(function ($) {
            $('#example1').DataTable({
                dom: 'Bfrtip',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                info: false,
                fixedColumns: {
                    left: 5
                },
                stateSave: true,
                buttons: [
                    'colvis'
                ]
            });
        }
        );
        $(document).ready(function () {
            $('input[type="checkbox"]').click(function () {
                if ($(this).prop("checked") == true) {
                    $('input[type="checkbox"]').not(this).prop('checked', false);
                }
            });
        });

    </script>
    <script>
        var test = <?php echo [$datatable]['cols']; ?>;
        console.log(test);
    </script>
    <?php
}
?>