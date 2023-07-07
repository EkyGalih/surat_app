<?php

namespace App\Helpers;

class Helpers
{

    // Funsgi Umum //

    // FUNGSI UNTUK MENGAMBIL DATA DARI FILE JSON //
    public static function _jsonDecode($param)
    {
        $files = file_get_contents($param);
        $data = json_decode($files, true);
        return $data;
    }

    // FUNGSI UNTUK MERUBAH FORMAT TANGGAL DARI YYYY-DD-MM KE MM/DD/YYYY //
    public static function _formatTanggal($tanggal) {
        $param = explode("-", $tanggal);
        $data = $param[2].'/'.$param[1].'/'.$param[0];

        return $data;
    }

    // FUNGSI UNTUK MERUBAH FORMAT TANGGAL DARI MM/DD/YYYY KE YYYY-DD-MM //
    public static function _resetTanggal($tanggal) {
        dd($tanggal);
        $param = explode("/", $tanggal);
        $data = $param[0].'/'.$param[1].'/'.$param[2];

        return $data;
    }
}
