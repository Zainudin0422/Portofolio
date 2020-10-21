<?php
require_once '../app/database/app_database.php';
require_once '../app/function/app_function.php';
require_once __DIR__ . '../../public/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

$Maintenance_ID = $_GET[$Maintenance = md5('Maintenance_ID')];

if (isset($_POST['Convert_PDF_DateNow'])) {
    $DateNow = Month(date('M'));

    $Maintenance = '<!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Report Maintenance</title>
                            <link href="../public/bootstrap.v5/css/bootstrap.min.css" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap" rel="stylesheet">
                            <style>
                                * {
                                    margin: 0px;
                                    padding: 0px;
                                    margin-bottom: 4cm;
                                    font-family: "Heebo", sans-serif;
                                }
                                @page{
                                    margin-left: 25px;
                                    margin-right: 25px;
                                    margin-top: 25px;
                                    margin-bottom: 25px;
                                }
                                 thead tr{
                                    background-color: #ff8000;
                                }
                                th{
                                    color: #ffffff;
                                }
                                tr:nth-child(odd){
                                    background-color: #e6e6e6;
                                }
                            </style>
                        </head>
                        <body>
                            <table class="table table-bordered" style="font-size: 12px; border: 1px solid #000;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px; font-size: 14px; border: 1px solid #000;">#</th>
                                        <th class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Tanggal</th>
                                        <th class="text-center" style="width: 70px; border: 1px solid #000;">ID PC</th>
                                        <th class="text-center" style="width: 200px; font-size: 14px; border: 1px solid #000;">Kegiatan</th>
                                        <th class="text-center" style="width: 300px; font-size: 14px; border: 1px solid #000;">Tindakan</th>
                                        <th class="text-center" style="width: 170px; font-size: 14px; border: 1px solid #000;">Pergantian Sperpart</th>
                                        <th colspan="2" class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>';


    $Number = 1;
    foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.date_maintenance LIKE '%" . $DateNow . " " . date('Y') . "%'") as $ShowMaintenance) {
        include '../document/Master_Maintenance.php';
        $Total_Cost += $ShowMaintenance['cost'];
    }


    $Maintenance .= '               <tr>
                                        <td colspan="6" style="font-size: 14px; font-weight: bold; padding:5px; border: 1px solid #000;">Total Maintenance / Bulan</td>
                                        <td style="font-size: 14px; font-weight: bold; padding:5px;">Rp. </td>
                                        <td style="font-size: 14px; font-weight: bold; text-align: right; padding:5px;">' . IndoRupiah($Total_Cost) . ',-</td>
                                    </tr>
                                </tbody>
                            </table>';

    $Maintenance .= '<pagebreak>';

    foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.date_maintenance LIKE '%" . $DateNow . " " . date('Y') . "%'") as $ShowMaintenance) {
        $Maintenance .= '
                        <div style="width: 520px; padding: 7px; float: left;">
                            <img src="../public/dist/img/' . $ShowMaintenance['image'] . '" style="width: 520px;">
                        </div>
        ';
    }

    $Maintenance .= '
                        </body>
                    </html>';


    $mpdf->WriteHTML($Maintenance);
    $mpdf->Output('Report Maintenance' . date('YMdHis') . '.pdf', 'I');
} else if (isset($_POST['Download_PDF_DateNow'])) {
    $Maintenance = '<!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Report Maintenance</title>
                            <link href="../public/bootstrap.v5/css/bootstrap.min.css" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap" rel="stylesheet">
                            <style>
                                * {
                                    margin: 0px;
                                    padding: 0px;
                                    margin-bottom: 4cm;
                                    font-family: "Heebo", sans-serif;
                                }
                                @page{
                                    margin-left: 25px;
                                    margin-right: 25px;
                                    margin-top: 25px;
                                    margin-bottom: 25px;
                                }
                                 thead tr{
                                    background-color: #ff8000;
                                }
                                th{
                                    color: #ffffff;
                                }
                                tr:nth-child(odd){
                                    background-color: #e6e6e6;
                                }
                            </style>
                        </head>
                        <body>
                            <table class="table table-bordered" style="font-size: 12px; border: 1px solid #000;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px; font-size: 14px; border: 1px solid #000;">#</th>
                                        <th class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Tanggal</th>
                                        <th class="text-center" style="width: 70px; border: 1px solid #000;">ID PC</th>
                                        <th class="text-center" style="width: 200px; font-size: 14px; border: 1px solid #000;">Kegiatan</th>
                                        <th class="text-center" style="width: 300px; font-size: 14px; border: 1px solid #000;">Tindakan</th>
                                        <th class="text-center" style="width: 170px; font-size: 14px; border: 1px solid #000;">Pergantian Sperpart</th>
                                        <th colspan="2" class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>';


    $Number = 1;
    $DateNow = Month(date('M'));
    foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.date_maintenance LIKE '%" . $DateNow . " " . date('Y') . "%'") as $ShowMaintenance) {
        include '../document/Master_Maintenance.php';
        $Total_Cost += $ShowMaintenance['cost'];
    }

    $Maintenance .= '               <tr>
                                        <td colspan="6" style="font-size: 14px; font-weight: bold; padding:5px; border: 1px solid #000;">Total Maintenance / Bulan</td>
                                        <td style="font-size: 14px; font-weight: bold; padding:5px;">Rp. </td>
                                        <td style="font-size: 14px; font-weight: bold; text-align: right; padding:5px;">' . IndoRupiah($Total_Cost) . ',-</td>
                                    </tr>
                                </tbody>
                            </table>';

    $Maintenance .= '<pagebreak>';

    foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.date_maintenance LIKE '%" . $DateNow . " " . date('Y') . "%'") as $ShowMaintenance) {
        $Maintenance .= '
                        <div style="width: 520px; padding: 7px; float: left;">
                            <img src="../public/dist/img/' . $ShowMaintenance['image'] . '" style="width: 520px;">
                        </div>
        ';
    }

    $Maintenance .= '
                        </body>
                    </html>';

    $mpdf->WriteHTML($Maintenance);
    $mpdf->Output('Report Maintenance' . date('YMdHis') . '.pdf', 'D');
    $mpdf->Output('File/Report Maintenance' . date('YMdHis') . '.pdf', 'F');
} else if (isset($_POST['Convert_PDF_All'])) {

    $Count = count($_POST['Checked_Maintenance']);

    $Maintenance = '<!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Report Maintenance</title>
                            <link href="../public/bootstrap.v5/css/bootstrap.min.css" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap" rel="stylesheet">
                            <style>
                                * {
                                    margin: 0px;
                                    padding: 0px;
                                    margin-bottom: 4cm;
                                    font-family: "Heebo", sans-serif;
                                }
                                @page{
                                    margin-left: 25px;
                                    margin-right: 25px;
                                    margin-top: 25px;
                                    margin-bottom: 25px;
                                }
                                 thead tr{
                                    background-color: #ff8000;
                                }
                                th{
                                    color: #ffffff;
                                }
                                tr:nth-child(odd){
                                    background-color: #e6e6e6;
                                }
                            </style>
                        </head>
                        <body>
                            <table class="table table-bordered" style="font-size: 12px; border: 1px solid #000;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px; font-size: 14px; border: 1px solid #000;">#</th>
                                        <th class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Tanggal</th>
                                        <th class="text-center" style="width: 70px; border: 1px solid #000;">ID PC</th>
                                        <th class="text-center" style="width: 200px; font-size: 14px; border: 1px solid #000;">Kegiatan</th>
                                        <th class="text-center" style="width: 300px; font-size: 14px; border: 1px solid #000;">Tindakan</th>
                                        <th class="text-center" style="width: 170px; font-size: 14px; border: 1px solid #000;">Pergantian Sperpart</th>
                                        <th colspan="2" class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>';

    $Number = 1;
    for ($x = 0; $x < $Count; $x++) {
        $Maintenance_ID = $_POST['Checked_Maintenance'][$x];
        foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.maintenance_id='$Maintenance_ID'") as $ShowMaintenance) {
            include '../document/Master_Maintenance.php';
            $Total_Cost += $ShowMaintenance['cost'];
        }
    }

    $Maintenance .= '               <tr>
                                        <td colspan="6" style="font-size: 14px; font-weight: bold; padding:5px; border: 1px solid #000;">Total Maintenance / Bulan</td>
                                        <td style="font-size: 14px; font-weight: bold; padding:5px;">Rp. </td>
                                        <td style="font-size: 14px; font-weight: bold; text-align: right; padding:5px;">' . IndoRupiah($Total_Cost) . ',-</td>
                                    </tr>
                                </tbody>
                            </table>';

    $Maintenance .= '<pagebreak>';
    for ($x = 0; $x < $Count; $x++) {
        $Maintenance_ID = $_POST['Checked_Maintenance'][$x];
        foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.maintenance_id='$Maintenance_ID'") as $ShowMaintenance) {
            $Maintenance .= '
                        <div style="width: 520px; padding: 7px; float: left;">
                            <img src="../public/dist/img/' . $ShowMaintenance['image'] . '" style="width: 520px;">
                        </div>';
        }
    }


    $Maintenance .= '
                        </body>
                    </html>';


    $mpdf->WriteHTML($Maintenance);
    $mpdf->Output('Report Maintenance' . date('YMdHis') . '.pdf', 'I');
} else if (isset($_POST['Download_PDF_All'])) {

    $Count = count($_POST['Checked_Maintenance']);

    $Maintenance = '<!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Report Maintenance</title>
                            <link href="../public/bootstrap.v5/css/bootstrap.min.css" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap" rel="stylesheet">
                            <style>
                                * {
                                    margin: 0px;
                                    padding: 0px;
                                    margin-bottom: 4cm;
                                    font-family: "Heebo", sans-serif;
                                }
                                @page{
                                    margin-left: 25px;
                                    margin-right: 25px;
                                    margin-top: 25px;
                                    margin-bottom: 25px;
                                }
                                 thead tr{
                                    background-color: #ff8000;
                                }
                                th{
                                    color: #ffffff;
                                }
                                tr:nth-child(odd){
                                    background-color: #e6e6e6;
                                }
                            </style>
                        </head>
                        <body>
                            <table class="table table-bordered" style="font-size: 12px; border: 1px solid #000;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px; font-size: 14px; border: 1px solid #000;">#</th>
                                        <th class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Tanggal</th>
                                        <th class="text-center" style="width: 70px; border: 1px solid #000;">ID PC</th>
                                        <th class="text-center" style="width: 200px; font-size: 14px; border: 1px solid #000;">Kegiatan</th>
                                        <th class="text-center" style="width: 300px; font-size: 14px; border: 1px solid #000;">Tindakan</th>
                                        <th class="text-center" style="width: 170px; font-size: 14px; border: 1px solid #000;">Pergantian Sperpart</th>
                                        <th colspan="2" class="text-center" style="width: 130px; font-size: 14px; border: 1px solid #000;">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>';

    $Number = 1;
    for ($x = 0; $x < $Count; $x++) {
        $Maintenance_ID = $_POST['Checked_Maintenance'][$x];
        foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.maintenance_id='$Maintenance_ID'") as $ShowMaintenance) {
            include '../document/Master_Maintenance.php';
            $Total_Cost += $ShowMaintenance['cost'];
        }
    }

    $Maintenance .= '               <tr>
                                        <td colspan="6" style="font-size: 14px; font-weight: bold; padding:5px; border: 1px solid #000;">Total Maintenance / Bulan</td>
                                        <td style="font-size: 14px; font-weight: bold; padding:5px;">Rp. </td>
                                        <td style="font-size: 14px; font-weight: bold; text-align: right; padding:5px;">' . IndoRupiah($Total_Cost) . ',-</td>
                                    </tr>
                                </tbody>
                            </table>';

    $Maintenance .= '<pagebreak>';

    for ($x = 0; $x < $Count; $x++) {
        $Maintenance_ID = $_POST['Checked_Maintenance'][$x];
        foreach (query("SELECT * FROM maintenances JOIN devices ON maintenances.device_id=devices.device_id WHERE maintenances.maintenance_id='$Maintenance_ID'") as $ShowMaintenance) {
            $Maintenance .= '
                        <div style="width: 520px; padding: 7px; float: left;">
                            <img src="../public/dist/img/' . $ShowMaintenance['image'] . '" style="width: 520px;">
                        </div>
        ';
        }
    }

    $Maintenance .= '
                        </body>
                    </html>';


    $mpdf->WriteHTML($Maintenance);
    $mpdf->Output('Report Maintenance' . date('YMdHis') . '.pdf', 'D');
    $mpdf->Output('File/Report Maintenance' . date('YMdHis') . '.pdf', 'F');
}
