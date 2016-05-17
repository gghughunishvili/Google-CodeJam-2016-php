<?php
include_once "helpers.php";

function makeAFlip(array $pancakes, $end){
    $pan_len = count($pancakes);
    $sub_array = array_slice($pancakes, 0, $end+1);
    $tmp = 0;
    for ($i=0; $i <= $end; $i++) {
        $pancakes[$i] = ($sub_array[$end-$tmp] + 1)%2;
        $tmp++;
    }
    return $pancakes;
}

function giveMeAnArray($str){
    $legnth = strlen($str);
    for($i=0; $i<$legnth; $i++){
        if ($str[$i] == "+") {
            $pancakes[] = 1;
        }else{
            $pancakes[] = 0;
        }
    }
    return $pancakes;
}

function giveMeANumber($str){
    $pancakes = giveMeAnArray($str);
    $pan_len = count($pancakes);
    $steps = 0;
    $person_of_interest = 1;
    for ($i=$pan_len-1; $i >= 0; $i--) { 
        if ($person_of_interest == $pancakes[$i]) {
            continue;
        }

        if ($pancakes[0] == 0 && $pancakes[$i] == 0) {
            $pancakes = makeAFlip($pancakes, $i);
            $steps++;
            continue;
        }

        if ($person_of_interest == $pancakes[0]) {
            $pancakes = makeAFlip($pancakes, $i);
            $step++;
            continue;
        }

        if ($pancakes[$i] == 0 && $pancakes[0] == 1) {
            $person_of_interest = 0;
        }
    }
}



$f = fopen($input_path, 'r' );
$number_of_tests = fgets($f);
$out_str = "";

for ($i=0; $i < $number_of_tests; $i++) {
    $str_line = "";
    $str = fgets($f);
    $result = giveMeANumber($str);
    $str_line = "Case #".($i+1).": ".$result;
    if ($i!=0) {
        $out_str .="\n";
    }
    $out_str .=$str_line;
}

die;

writeInFile($out_str);

echo "Done Successfully";