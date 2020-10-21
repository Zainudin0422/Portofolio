<?php
require_once '../app/database/app_database.php';
require_once '../app/function/app_function.php';
require_once __DIR__ . '../../public/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

if (isset($_GET['Convert_PDF'])) {
    $Device_ID = $_GET[$Device = md5('Device_ID')];

    $Device = '<!DOCTYPE html>
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
                        <body>';

    $Device .= '
                <div style="width: 650px; float: left;">
                    <dt style="font-size: 16px; font-weight: bold;">Perangkat</dt>
                    <table style="font-size: 18px; border: 1px solid #000;">
                        <thead>
                            <tr style="background-color: #ff8000;">
                                <th style="width: 190px; font-size: 14px; text-align: center;">ID PC</th>
                                <th style="width: 270px; font-size: 14px; text-align: center;">Tanggal Pengadaan</th>
                                <th style="width: 170px; font-size: 14px; text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <thbody>';


    foreach (query("SELECT * FROM devices WHERE device_id='$Device_ID'") as $ShowDevice) {
        $Device .= '<tr>
                        <td style=" font-weight: bold; text-align: center; padding:10px;">' . $ShowDevice['device_name'] . '</td>
                        <td style=" font-weight: bold; text-align: center; padding:10px;">' . $ShowDevice['date_device'] . '</td>
                        <td style=" font-weight: bold; text-align: center; padding:10px;">' . $ShowDevice['status'] . '</td>
                    </tr>';
    }

    $Device .= '
                        </thbody>
                    </table>
                </div>
                <div>
                    <dt style="font-size: 16px; font-weight: bold;">Daftar Hardware</dt>
                    <table style="font-size: 12px; border: 1px solid #000;">
                        <thead>
                            <tr style="background-color: #ff8000;">
                                <th style="width:130px; font-size: 14px; text-align: center;">Nama Hardware</th>
                                <th style="width: 150px; font-size: 14px; text-align: center;">Merk Hardware</th>
                                <th style="width: 170px; font-size: 14px; text-align: center;">Spesifikasi Hardware</th>
                            </tr>
                        </thead>
                        <thbody>';

    foreach (query("SELECT * FROM devices JOIN hardwares ON devices.device_id=hardwares.device_id WHERE hardwares.device_id='$Device_ID'") as $DeviceHardware) {
        $Device .= '<tr>
                        <td style=" padding:5px;">' . $DeviceHardware['hardware_name'] . '</td>
                        <td style=" padding:5px;">' . $DeviceHardware['hardware_brand'] . '</td>
                        <td style=" padding:5px;">' . $DeviceHardware['hardware_specification'] . '</td>
                    </tr>';
    }

    $Device .= '
                            
                        </thbody>
                    </table>
                </div>
                <div style="margin-top:10px;">
                    <dt style="font-size: 16px; font-weight: bold;">Daftar Maintenance</dt>
                    <table style="font-size: 12px; border: 1px solid #000;">
                        <thead>
                            <tr style="background-color: #ff8000;">
                                <th style="width:130px; font-size: 14px; text-align: center;">Tanggal</th>
                                <th style="width: 300px; font-size: 14px; text-align: center;">Kegiatan</th>
                                <th style="width: 370px; font-size: 14px; text-align: center;">Tindakan</th>
                                <th style="width: 170px; font-size: 14px; text-align: center;">Pergantian Sperpart</th>
                                <th  colspan="2"  style="width:100px; font-size: 14px; text-align: center;">Biaya</th>
                            </tr>
                        </thead>
                        <thbody>';

    foreach (query("SELECT * FROM devices JOIN maintenances ON devices.device_id=maintenances.device_id WHERE devices.device_id='$Device_ID'") as $DeviceMaintenance) {
        $Device .= '
            <tr>
                <td style="text-align: center;  padding:5px;">' . $DeviceMaintenance['date_maintenance'] . '</td>
                <td style="padding:5px;">' . $DeviceMaintenance['activity'] . '</td>
                <td style="padding:5px;">' . $DeviceMaintenance['action_activity'] . '</td>
                <td style="padding:5px;">' . $DeviceMaintenance['replacement_parts'] . '</td>
                <td style="font-weight: bold; padding:5px;">Rp. </td>
                <td style="text-align: right; padding:5px;">' . IndoRupiah($DeviceMaintenance['cost']) . ',-</td>
            </tr>
        ';
        $Total_Cost += $DeviceMaintenance['cost'];
    }

    $Device .= '                <tr>
                                    <td colspan="4" style="font-size: 14px; font-weight: bold; padding:5px;">Total Maintenance / Bulan</td>
                                    <td style="font-size: 14px; font-weight: bold; padding:5px;">Rp. </td>
                                    <td style="font-size: 14px; font-weight: bold; text-align: right; padding:5px;">' . IndoRupiah($Total_Cost) . ',-</td>
                                </tr>
                                </thbody>
                            </table>
                         </div>
                    </body>
                </html>';


    $mpdf->WriteHTML($Device);
    $mpdf->Output('Report Salary' . date('YMdHis') . '.pdf', 'I');
}
