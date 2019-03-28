<?php

//grab csv data;
$csv_file = file_get_contents('array.csv');
$lines = explode(PHP_EOL, $csv_file);

//parse into array of lines as arrays
$parsed_csv = array();
foreach ($lines as $line) {
    $parsed_csv[] = str_getcsv($line);
}

//init for recursion stuff
$reduced_parsed_csv = array();

//we start at 1 as $parsed_csv[0] is headers...
prettyPrintR(
    json_encode(
        buildTree($parsed_csv, $reduced_parsed_csv, 1)
    )
);

/*** */

function buildTree(array $array, array $reduced_array, $num)
{

    $parent_id = $array[$num][1];
    $id = $array[$num][0];
    $date = $array[$num][2];

    if ($parent_id == "0") {
        $initLv1 = $array[$num + 1][1];
        $reduced_array[$initLv1]["date"] = $date;
        $num = $num + 1;
        return buildTree($array, $reduced_array, $num);
    }

    if (!array_key_exists("dates", $reduced_array[$parent_id])) {
        $reduced_array[$parent_id]["dates"] = array();
    }
    $reduced_array[$parent_id]["dates"][$id] = $date;

    if ($num < (count($array) - 1)) {
        $num = $num + 1;
        return buildTree($array, $reduced_array, $num);
    }
    return $reduced_array;
}

/** */
function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}
