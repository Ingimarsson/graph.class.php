<?php

class graph {
 
   /*
   |--------------------------------------------------------------------------
   | Column graph drawer class
   |--------------------------------------------------------------------------
   |
   | Author: Brynjar Ingimarsson
   | Date: 25. August 2013
   |
   */

   public function draw($text, $stats, $start = 1, $colors = array(30, 90, 230)){
        $standards = array(8, 40, 80, 400, 800, 4000, 8000, 12000, 16000, 40000, 80000);
        
        $font = __DIR__.'/arial.ttf';
        
        $count = 0;
        while(max($stats) >= $standards[$count]){
            $count++;
        }

        $max = $standards[$count];

        $image = imagecreate(750, 250);

        $white = imagecolorallocate($image, 255, 255, 255);
        $gray = imagecolorallocate($image, 120, 120, 120);
        $blue = imagecolorallocate($image, $colors[0], $colors[1], $colors[2]);

        imagettftext($image, 10, 0, 10, 20, $gray, $font, 'MB');
        imagettftext($image, 10, 0, 10, 240, $gray, $font, $text);

        $width = sizeof($stats) * 20 + 70;

        imageline($image, 65, 20, 65, 205, $gray);
        imageline($image, 65, 205, $width, 205, $gray);

        imagettftext($image, 10, 0, (60 - strlen($max * 0.875) * 7), 35, $gray, $font, $max * 0.875);
        imagettftext($image, 10, 0, (60 - strlen($max * 0.75) * 7), 60, $gray, $font, $max * 0.75);
        imagettftext($image, 10, 0, (60 - strlen($max * 0.625) * 7), 85, $gray, $font, $max * 0.625);
        imagettftext($image, 10, 0, (60 - strlen($max * 0.5) * 7), 110, $gray, $font, $max * 0.5);
        imagettftext($image, 10, 0, (60 - strlen($max * 0.375) * 7), 135, $gray, $font, $max * 0.375);
        imagettftext($image, 10, 0, (60 - strlen($max * 0.25) * 7), 160, $gray, $font, $max * 0.25);
        imagettftext($image, 10, 0, (60 - strlen($max * 0.125) * 7), 185, $gray, $font, $max * 0.125);
        imagettftext($image, 10, 0, 53, 210, $gray, $font, 0);

        $count = 1;
        foreach($stats as $stat){
            if($count >= 10){
                imagettftext($image, 10, 0, ($count * 20 + 51), 220, $gray, $font, $start);
            } else {
                imagettftext($image, 10, 0, ($count * 20 + 55), 220, $gray, $font, $start);
            }
            imagefilledrectangle($image, ($count * 20 + 48), (205 - $stat / $max * 195), ($count * 20 + 65), 204, $blue);
            $count++;
            $start++;
        }

        return imagepng($image);
    }
}
