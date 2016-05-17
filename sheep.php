<?php
include_once "helpers.php";

function doSomeMagic($n){
    if ($n == 0) {
        return "INSOMNIA";
    }
    $numbers_array = [];
    for ($i=1; $i < 10000; $i++) { 
        $new_num = $n * $i;
        for($j=0; $j<strlen($new_num); $j++){
            $numbers_array[strval($new_num)[$j]] = 1;
            if (count($numbers_array) == 10) {
                return $new_num;
            }
        }
    }
}
$f = fopen($input_path, 'r' );
$number_of_tests = fgets($f);
$out_str = "";
for ($i=0; $i < $number_of_tests; $i++) {
    $str_line = "";
    $n = fgets($f);
    $result = doSomeMagic($n);
    $str_line = "Case #".($i+1).": ".$result;
    if ($i!=0) {
        $out_str .="\n";
    }
    $out_str .=$str_line;
}


writeInFile($out_str);

echo "Done Successfully";