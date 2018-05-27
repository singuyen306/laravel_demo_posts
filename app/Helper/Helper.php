<?php

namespace App\Helper;

use Carbon\Carbon;

class Helper {

    public static function convertTimeToDisplay($time){
         return Carbon::parse($time)->format('Y/m/d');
    }

    public static function diffForHumans($time){
        return $time->diffForHumans(Carbon::now());
    }

    public static function getImage($name, $uploadPath, $request) {
        if ($request->hasFile($name)) {
            $image = $request->file($name);
            // Upload file
            $image = self::uploadFile($image, $uploadPath);
            return $image;
        }
        return '';
    }

    public static function uploadFile($image, $uploadPath) {
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        $image->move($uploadPath, $imageName);
        return '/' . $uploadPath . '/' . $imageName;
    }

}
