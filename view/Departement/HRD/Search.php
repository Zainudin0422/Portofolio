<?php
include_once '../../../app/database/app_database.php';
include_once '../../../app/function/app_function.php';
$Number = 1;
$Search = $_GET['Search'];
$DateSalaryNow = Month(date('M'));

if ($Search == '') {
    $Value_Search = query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.create_time LIKE '%" . $DateSalaryNow . "%' ORDER BY full_name ASC");
} else {
    $Value_Search = query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.create_time LIKE '%" . $Search . "%' OR profiles.full_name LIKE '%" . $Search . "%' ORDER BY full_name ASC");
}

foreach ($Value_Search as $Employee_Salary) {
?>
    <tr>
        <td class="text-center"><?= $Number; ?></td>
        <td class="text-bold"><?= $Employee_Salary['full_name']; ?></td>
        <td><?= $Employee_Salary['departement']; ?></td>
        <td class="text-center"><?= $Employee_Salary['position']; ?></td>
        <td class="text-center text-bold"><?= $Employee_Salary['create_time']; ?></td>
        <td>
            <div class="input-group">
                <div class="custom-control custom-checkbox">
                    <input name="Checked_Salary[]" value="<?= $Employee_Salary['id_salary']; ?>" class="custom-control-input Checked_Salary" type="checkbox" id="Checked_Salary<?= $Number; ?>">
                    <label for="Checked_Salary<?= $Number; ?>" class="custom-control-label"></label>
                </div>
                <a href="document/Report_Salary.php?Convert_PDF&<?= md5('Salary_ID') . "=" . $Employee_Salary['id_salary']; ?>" target="_blank" class="ml-2 text-warning"><i class="far fa-file-pdf"></i></a>
                <a href="document/Report_Salary.php?Download_PDF&<?= md5('Salary_ID') . "=" . $Employee_Salary['id_salary']; ?>" class="ml-2 text-success"><i class="fas fa-download"></i></a>
                <a href="document/Report_Salary.php?Share_PDF&<?= md5('Salary_ID') . "=" . $Employee_Salary['id_salary']; ?>" class="ml-2 text-primary"><i class="fas fa-share"></i></a>
                <a href="" class="ml-2 text-info"><i class="fas fa-pencil-alt"></i></a>
                <a href="" class="ml-2 text-danger"><i class="far fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
<?php
    $Number++;
}
?>

<script tyle="text/javascript">
    $(document).ready(function() {
        $("#Checked_Salary_Master").change(function() {
            $(".Checked_Salary").prop("checked", $(this).prop("checked"))
        });

        $(".Checked_Salary").change(function() {
            if ($(this).prop("checked") == false) {
                $("#Checked_Salary_Master").prop("checked", false)
            }
            if ($(".Checked_Salary:checked").length == $(".Checked_Salary").length) {
                $("#Checked_Salary_Master").prop("checked", true)
            }
        });
    });
</script>