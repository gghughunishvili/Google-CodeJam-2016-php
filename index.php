<?php

/*$myfile = fopen("inputs/small_input.txt", "r") or die("Unable to open file!");
var_dump($myfile);
echo fread($myfile,filesize("inputs/small_input.txt"));
fclose($myfile);*/

/*echo "<pre>";
    print_r($items_array);
    die;*/

include_once "helpers.php";

$f = fopen($input_path, 'r' );
$number_of_tests = fgets($f);
$out_str = "";
for ($i=0; $i < $number_of_tests; $i++) { 
    $C = fgets($f);
    $number_of_items = fgets($f);
    $line = fgets($f);
    $items_array = explode(' ', $line);
    foreach ($items_array as $key => $item_price) {
        $find_val = $C - $item_price;
        $tmp_price = $item_price;
        unset($items_array[$key]);
        $pos = array_search($find_val,$items_array);
        if ($pos) {
            $str_line = "Case #".($i+1).": ".($key+1)." ".($pos + 1);
            if ($i!=0) {
                $out_str .="\n";
            }
            $out_str .=$str_line;
            break;
        }
        $items_array[$key] = $tmp_price;
    }
}

writeInFile($out_str);

echo "DONE SUCCESSFULLY! dude";