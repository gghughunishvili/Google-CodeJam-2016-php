<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$ENVIRONMENT_SMALL = true;

if ($ENVIRONMENT_SMALL) {
    $input_path = 'inputs/small_input.txt';
    $output_path = 'outputs/small_output.txt';
}else{
    $input_path = 'inputs/large_input.txt';
    $output_path = 'outputs/large_output.txt';
}

function writeInFile($out_str){
    global $output_path;
    $file = fopen($output_path,"w");
    fwrite($file, $out_str);
    fclose($file);
}

function printJustArray($array){
    echo "<pre>";
    print_r($array);
    die;
}