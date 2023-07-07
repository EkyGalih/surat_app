<?php

namespace App\Helpers;

class Helpers
{

    // Funsgi Umum

    public static function _jsonDecode($param)
    {
        $files = file_get_contents($param);
        $data = json_decode($files, true);
        return $data;
    }
}
