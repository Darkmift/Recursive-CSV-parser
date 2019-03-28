<?php

//grab csv data;
$csv_file = file_get_contents('array.csv');
$lines = explode(PHP_EOL, $csv_file);

//parse into array of lines as arrays
$parsed_csv = array();
foreach ($lines as $line) {
    $parsed_csv[] = str_getcsv($line);
}

unset($parsed_csv[0]);
//init for recursion stuff
$reduced_parsed_csv = array();

// prettyPrintR(
//     buildTree($parsed_csv, $reduced_parsed_csv, 0)
// );

buildTree($parsed_csv, $reduced_parsed_csv, 1);

/*** */

function buildTree(array $array, array $reduced_array, $num)
{

    $parent_id = $array[$num][1];
    $id = $array[$num][0];
    $date = $array[$num][2];
    // prettyPrintR(array($num, count($array), $parent_id));
    prettyPrintR($reduced_array);
    if (array_key_exists($parent_id, $reduced_array) == false) {
        $reduced_array[$parent_id] = array();
        if ($parent_id == "0") {
            $reduced_array[$parent_id]["date"] = $date;
        }
    }

    if ($parent_id != "0") {
        if (!array_key_exists("dates", $reduced_array[$parent_id])) {
            $reduced_array[$parent_id]["dates"] = array();
        }
        $reduced_array[$parent_id]["dates"][$id] = $date;
    }

    if ($num < (count($array) - 1)) {
        $num = $num + 1;
        buildTree($array, $reduced_array, $num);
    } else {
        return $reduced_array;
    }

}

/** */
function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}
