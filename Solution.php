<?php

/*
 * Complete the 'gridChallenge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function gridChallenge($grid) {
    $res = orderRows($grid);
    $mat = $res['sorted'];
    $rot = $res['rotated'];
    for ($i = 0; $i < count($rot); $i++){
        $temp = $rot[$i];
        sort($temp);
        if($temp !== $rot[$i]){
            return 'NO';
        }
    }
    return 'YES';
}

function orderRows($grid){
    $rot = [];
    for ($i = 0; $i < count($grid); $i++){
        $row = str_split($grid[$i], 1);
        sort($row);
        for($j = 0; $j < count($row); $j++){
            $rot[$j][$i] = $row[$j];
        }
        $grid[$i] = $row;
    }
    return ['sorted' => $grid, 'rotated' => $rot];
}
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
