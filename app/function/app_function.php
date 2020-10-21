<?php

// define('APP_REDIRECT', UrlBase());
// define('APP_URLBASE', UrlBase() . 'public/');

// function UrlBase()
// {

//     // return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
//     return $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'];
//     // return $_SERVER["HTTP_X_FORWARDED_PROTO"] . '://' . $_SERVER['HTTP_HOST'];

// }


class Flasher
{
    public static function SetFlash($Msg, $Act, $Typ)
    {
        $_SESSION['Flash'] = [
            'Pesan' => $Msg,
            'Aksi' => $Act,
            'Type' => $Typ
        ];
    }

    public static function Flash()
    {
        if (isset($_SESSION['Flash'])) {
            echo '<div class="alert alert-' . $_SESSION['Flash']['Type'] . ' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5>' . $_SESSION['Flash']['Aksi'] . '</h5>' . $_SESSION['Flash']['Pesan'] . '</div>';
            unset($_SESSION['Flash']);
        }
    }
}

function SerialGenerate()
{
    $Database = "PC" . substr(date('Y'), 2);
    $Search = mysqli_fetch_array(query("SELECT * FROM devices WHERE device_name like '%" . $Database . "%' ORDER BY device_name DESC"));
    $Serial = explode(".", $Search['device_name']);
    if (substr($Serial[0], 2) === substr(date('Y'), 2)) {
        if (substr($Serial[1], 1) < 10) {
            $Generate = $Serial[1] + 1;
            if ($Generate < 10) {
                $Generate = "PC" . substr($Serial[0], 2) . "." . "0" . $Generate;
            } else {
                $Generate = "PC" . substr($Serial[0], 2) . "." . $Generate;
            }
        }
        return $Generate;
    } else {
        return "PC" . substr(date('Y'), 2) . "." . "01";
    }
}








function IndoRupiah($Number)
{
    if ($Number == 0) {
        return '-';
    } else {
        return  number_format($Number, 0, ',', '.');
    }
}

function Absen($Jumlah)
{
    if ($Jumlah == 0) {
        return '-';
    } else {
        return  $Jumlah . " Hari";
    }
}

function Month($Month)
{
    switch ($Month) {
        case 'Jan':
            return "Januari";
            break;

        case 'Feb':
            return "Februari";
            break;

        case 'Mar':
            return "Maret";
            break;

        case 'Apr':
            return "April";
            break;

        case 'May':
            return "Mei";
            break;

        case 'Jun':
            return "Juni";
            break;

        case 'Jul':
            return "Juli";
            break;

        case 'Aug':
            return "Agustus";
            break;

        case 'Sep':
            return "September";
            break;

        case 'Oct':
            return "Oktober";
            break;

        case 'Nov':
            return "November";
            break;

        case 'Dec':
            return "Desember";
            break;

        default:
            return "Not Found Mount";
            break;
    }
}

function DateCalender($data)
{
    $Day = date("d", strtotime($data));
    $Month = date("M", strtotime($data));
    $Year = date("Y", strtotime($data));

    if ($Month == date("M", strtotime($data))) {
        return $Day . " " . Month($Month) . " " . $Year;
    } else {
        return "Not Found";
    }
}


function DateMonth($data)
{

    $Month = date("M", strtotime($data));

    if ($Month == date("M", strtotime($data))) {
        return Month($Month);
    } else {
        return "Not Found";
    }
}
