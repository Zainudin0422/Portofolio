<?php
include_once '../../../app/database/app_database.php';
include_once '../../../app/function/app_function.php';

$Number = 1;
$Search = $_GET['Search'];
$DateMaintenanceNow = Month(date('M'));

if ($Search == '') {
    $Search_Maintenance = query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.date_maintenance lIKE '%" . $DateMaintenanceNow . "%'");
} else {
    $Search_Maintenance = query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE devices.device_name lIKE '%" . $Search . "%' OR maintenances.date_maintenance lIKE '%" . $Search . "%'");
}

foreach ($Search_Maintenance as $ShowMaintenance) {
?>
    <tr>
        <td class="text-center text-bold"><?= $Number; ?></td>
        <td class=" text-center text-muted text-bold"><?= $ShowMaintenance['device_name']; ?></td>
        <td><?= $ShowMaintenance['activity']; ?></td>
        <td><?= $ShowMaintenance['action_activity']; ?></td>
        <td><?= $ShowMaintenance['replacement_parts']; ?></td>
        <td class="text-bold"><span class="text-left">Rp.</span> <span class="float-right"><?= IndoRupiah($ShowMaintenance['cost']); ?></span></td>
        <td class="text-center text-bold"><?= $ShowMaintenance['date_maintenance']; ?></td>
        <td>

        </td>
    </tr>
<?php
    $Number++;
}
?>

<script tyle="text/javascript">
    $(document).ready(function() {
        $("#Checked_Maintenance_Master").change(function() {
            $(".Checked_Maintenance").prop("checked", $(this).prop("checked"))
        });

        $(".Checked_Maintenance").change(function() {
            if ($(this).prop("checked") == false) {
                $("#Checked_Maintenance_Master").prop("checked", false)
            }
            if ($(".Checked_Maintenance:checked").length == $(".Checked_Maintenance").length) {
                $("#Checked_Maintenance_Master").prop("checked", true)
            }
        });
    });
</script>