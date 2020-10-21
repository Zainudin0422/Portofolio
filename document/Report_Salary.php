<?php
require_once '../app/database/app_database.php';
require_once '../app/function/app_function.php';
require_once __DIR__ . '../../public/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

if (isset($_POST['Convert_PDF_All'])) {
    $Salary = ' <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Report Salary</title>
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
                                margin-left: 12px;
                                margin-right: 25px;
                                margin-top: 25px;
                                margin-bottom: 320px;
                            }
                        </style>
                    </head>
                    <body>';

    $Count = count($_POST['Checked_Salary']);
    for ($x = 0; $x < $Count; $x++) {
        $Salary_ID = $_POST['Checked_Salary'][$x];
        foreach (query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'") as $Employees_Salarys) {
            include '../document/Master_Salary.php';
        }
    }
    $Salary .=      '</body>
                </html>';

    $mpdf->WriteHTML($Salary);
    $mpdf->Output('Report Salary' . date('YMdHis') . '.pdf', 'I');
} else if (isset($_POST['Download_PDF_All'])) {

    $Salary = '
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Report Salary</title>
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
                                margin-left: 12px;
                                margin-right: 25px;
                                margin-top: 25px;
                                margin-bottom: 320px;
                            }
                        </style>
                    </head>
                    <body>';

    $Count = count($_POST['Checked_Salary']);
    for ($x = 0; $x < $Count; $x++) {
        $Salary_ID = $_POST['Checked_Salary'][$x];
        foreach (query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'") as $Employees_Salarys) {
            include '../document/Master_Salary.php';
        }
    }
    $Salary .= '    </body>
                </html>';

    $mpdf->WriteHTML($Salary);
    $mpdf->Output('Report Salary' . date('YMdHis') . '.pdf', 'D');
    $mpdf->Output('File/Report Salary' . date('YMdHis') . '.pdf', 'F');
} else if (isset($_POST['Share_PDF_All'])) {
    $Count = count($_POST['Checked_Salary']);
    for ($x = 0; $x < $Count; $x++) {
        $Salary_ID = $_POST['Checked_Salary'][$x];

        $Data_Salary_Out = mysqli_fetch_array(query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'"));

        $Salary = '
                        <!DOCTYPE html>
                        <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Report Salary</title>
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
                                        margin-left: 12px;
                                        margin-right: 25px;
                                        margin-top: 25px;
                                        margin-bottom: 320px;
                                    }
                                </style>
                            </head>
                            <body>';

        foreach (query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'") as $Employees_Salarys) {
            include '../document/Master_Salary.php';
        }

        $Salary .= '    </body>
                        </html>';

        $mpdf->WriteHTML($Salary);
        $Send_File_PDF = $mpdf->Output('', 'S');

        $attachment = new Swift_Attachment($Send_File_PDF, 'Report_Salary_' . date('His') . '.pdf');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername(SEND_FROM_EMAIL)
            ->setPassword(SEND_FROM_PASS);

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Report Salary'))
            ->setFrom([SEND_FROM_EMAIL => 'Head of Finance & HRD'])
            ->setTo([$Data_Salary_Out['email']])
            ->setBody('Document Salary, Salary on progress via ATM')
            ->attach($attachment);

        $result = $mailer->send($message);
        $mpdf->Output('File/Share_to_' . date('His') . "_" . $Employees_Salarys['full_name'] . '_Report_Salary.pdf', 'F');

        if ($result) {
            echo '<meta http-equiv="refresh" content="0; url=../?Welcome=' . md5('Employees') . '">';
            Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'SHARE DATA SUCCESS', 'success');
        } else {
            echo '<meta http-equiv="refresh" content="0; url=../?Welcome=' . md5('Employees') . '">';
            Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'SHARE DATA FAILED', 'danger');
        }
    }
} else if (isset($_GET['Convert_PDF'])) {

    $Salary_ID = $_GET[$Salary = md5('Salary_ID')];
    $Employees_Salarys = mysqli_fetch_array(query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'"));

    $Salary = '
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Report Salary</title>
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
                                margin-left: 12px;
                                margin-right: 25px;
                                margin-top: 25px;
                                margin-bottom: 320px;
                            }
                        </style>
                    </head>
                    <body>';

    include '../document/Master_Salary.php';

    $Salary .= '    </body>
                </html>';

    $mpdf->WriteHTML($Salary);
    $mpdf->Output('Report_Salary_' . $Employees_Salarys['full_name'] . '_' . date('YMdHis') . '.pdf', 'I');
} else if (isset($_GET['Download_PDF'])) {

    $Salary_ID = $_GET[$Salary = md5('Salary_ID')];
    $Employees_Salarys = mysqli_fetch_array(query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'"));

    $Salary = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Report Salary</title>
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
                            margin-left: 12px;
                            margin-right: 25px;
                            margin-top: 25px;
                            margin-bottom: 320px;
                        }
                    </style>
                </head>
                <body>';

    include '../document/Master_Salary.php';

    $Salary .= '
                    </body>
                </html>';

    $mpdf->WriteHTML($Salary);
    $mpdf->Output('Report_Salary_' . $Employees_Salarys['full_name'] . '_' . date('YMdHis') . '.pdf', 'D');
    $mpdf->Output('File/Report_Salary_' . $Employees_Salarys['full_name'] . '_' . date('YMdHis') . '.pdf', 'F');
} else if (isset($_GET['Share_PDF'])) {
    $Salary_ID = $_GET[$Salary = md5('Salary_ID')];
    $Employees_Salarys = mysqli_fetch_array(query("SELECT * FROM salarys JOIN profiles ON salarys.id_profile=profiles.id_profile WHERE salarys.id_salary='$Salary_ID'"));

    $Salary = '
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Report Salary</title>
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
                                margin-left: 12px;
                                margin-right: 25px;
                                margin-top: 25px;
                                margin-bottom: 320px;
                            }
                        </style>
                    </head>
                    <body>';

    include '../document/Master_Salary.php';

    $Salary .= '    </body>
                </html>';

    $mpdf->WriteHTML($Salary);
    $Send_File_PDF = $mpdf->Output('', 'S');

    $attachment = new Swift_Attachment($Send_File_PDF, 'Report_Salary_' . $Employees_Salarys['full_name'] . '.pdf');

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername(SEND_FROM_EMAIL)
        ->setPassword(SEND_FROM_PASS);

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Report Salary'))
        ->setFrom([SEND_FROM_EMAIL => 'Head of Finance & HRD'])
        ->setTo([$Employees_Salarys['email']])
        ->setBody('File')
        ->attach($attachment);

    // Send the message
    if ($result = $mailer->send($message)) {
        $mpdf->Output('File/Share_to_' . date('His') . "_" . $Employees_Salarys['full_name'] . '_Report_Salary.pdf', 'F');
        echo '<meta http-equiv="refresh" content="0; url=../?Welcome=' . md5('Employees') . '">';
        Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>', 'SHARE DATA SUCCESS', 'success');
    } else {
        echo '<meta http-equiv="refresh" content="0; url=../?Welcome=' . md5('Employees') . '">';
        Flasher::SetFlash('<u>Niat kerja sebagai <b>Ibadah</b></u>, Mohon coba kembali!!!', 'SHARE DATA FAILED', 'danger');
    }
}
