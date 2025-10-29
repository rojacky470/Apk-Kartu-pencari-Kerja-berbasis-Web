<?php
function kode_random($length){
    $data = '0987654321';
    $string = 'KK-';

    for ($i=0; $i < $length; $i++) {
        $arr = rand(0, strlen($data)-1);
        $string .= $data[$arr];
    }

    return $string;
}

$kode= kode_random(10);

?>