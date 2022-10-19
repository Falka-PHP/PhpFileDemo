<?php

function display_arr($arr){
    foreach ($arr as $value) {
        echo "$value <br>";
    }
}

function sortNumbersIntoFiles($fileName){
    $numbers = preg_split("/\s+/",file($fileName)[0]);
    $positiveNums = fopen("positiveNums.txt","w");
    $negativeNums = fopen("negativeNums.txt","w");
    $posArr = [];
    $negArr = [];
    display_arr($numbers);
    foreach ($numbers as $key => $value){
        $tmp = $value." ";
        if(((int)$value) >=0)
            array_push($posArr,$tmp);
        else
            array_push($negArr,$tmp);
    }
    foreach ($posArr as $key => $value)
        fwrite($positiveNums, $value." ");

    foreach ($negArr as $key => $value)
        fwrite($negativeNums, $value." ");

    fclose($negativeNums);
    fclose($positiveNums);
    echo "Sorted!";
}